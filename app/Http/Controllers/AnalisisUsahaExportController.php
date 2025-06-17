<?php

namespace App\Http\Controllers;

use App\Models\RecordPendapatan;
use App\Models\NamaPendapatan;
use App\Models\RecordPengeluaran;
use App\Models\NamaPengeluaran;
use App\Models\Layanan;
use App\Models\Download;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use PhpOffice\PhpSpreadsheet\IOFactory;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;
use Midtrans\Config;
use Midtrans\Snap;

class AnalisisUsahaExportController extends Controller
{

    public function __construct()
    {
        // Konfigurasi Midtrans
        Config::$serverKey = config('midtrans.server_key');
        Config::$isProduction = config('midtrans.is_production');
        Config::$isSanitized = config('midtrans.is_sanitized');
        Config::$is3ds = config('midtrans.is_3ds');
    }

    public function export(Request $request)
    {
        // dd($request->all()); 
        $user = Auth::user(); // Dapatkan pengguna yang terautentikasi
        $isAdmin = ($user && $user->role === 'admin');

        $user_id = $user ? $user->id : null; // Gunakan ID pengguna yang terautentikasi
        $layanan_id = $request->input('layanan_id');
        // Jika belum bayar dan bukan admin, tampilkan Snap Midtrans
        if (!$request->has('is_paid') && !$isAdmin) {
            $params = [
                'transaction_details' => [
                    'order_id' => uniqid(),
                    'gross_amount' => 10000,
                ],
                'customer_details' => [
                    'email' => $user->email,
                ],
            ];
            $snapToken = Snap::getSnapToken($params);

            // Simpan data form ke session
            $request->session()->put('form_usaha', $request->all());

            // Tampilkan view Snap
            return view('user.pay_snap', compact('snapToken'));
        }

        // Jika user_id null (seharusnya tidak terjadi jika middleware auth diterapkan pada rute)
        if (is_null($user_id)) {
            abort(401, 'Pengguna tidak terautentikasi.');
        }

        // Ambil data form, prioritaskan dari session jika ada (setelah pembayaran)
        $formData = $request->session()->get('form_usaha');
        if ($formData) {
            $request->merge($formData); // Menggabungkan data ke request yang sudah ada
            // Hapus data form dari session setelah digunakan
            $request->session()->forget('form_usaha');
        }

        // Ambil layanan_id utama dari request
        $layanan_id_utama = $request->input('layanan_id');

        // Jika layanan_id utama tidak ada (misal form ID 5 disubmit langsung tanpa hidden input)
        // atau jika form ID 5 disubmit, pastikan layanan_id_utama adalah 5
        // Kita bisa mendeteksinya dengan adanya input 'usaha_tambahan'
        if (is_null($layanan_id_utama) || $request->has('usaha_tambahan')) {
             $layanan_id_utama = 5; // Asumsikan ini adalah form layanan ID 5
        }


        // Jika layanan_id_utama masih null setelah pemeriksaan, berarti ada masalah
        if (is_null($layanan_id_utama)) {
             abort(400, 'Layanan ID tidak valid.');
        }

        $layanan_utama = Layanan::find($layanan_id_utama);
        $namaUsahaUtama = $layanan_utama ? $layanan_utama->nama_layanan : '';
        $tipeUsahaUtama = $layanan_utama ? $layanan_utama->tipe : '';
        

        // Inisialisasi total pendapatan dan pengeluaran untuk Excel
        $total_pendapatan_excel = 0;
        $total_pengeluaran_excel = 0;
        $excel_data = []; // Array untuk menampung data yang akan ditulis ke Excel

        // --- Logika Penyimpanan Data dan Pengumpulan Data Excel ---

        // --- Proses data usaha utama (dari form utama) terlebih dahulu ---

        // Ambil array statis dari form utama
        $pengeluaran_statis_utama = $request->pengeluaran_statis ?? [];
        $pendapatan_statis_utama = $request->pendapatan_statis ?? [];

        // Ambil label statis dari database (hanya yang created_at & updated_at NULL)
        // Ini perlu disesuaikan agar mengambil field sesuai $layanan_id_utama
        $fieldsPendapatanUtama = \App\Models\NamaPendapatan::where('layanan_id', $layanan_id_utama)
            ->whereNull('created_at')
            ->whereNull('updated_at')
            ->with('layanan')
            ->get();
        $fieldsPengeluaranUtama = \App\Models\NamaPengeluaran::where('layanan_id', $layanan_id_utama)
            ->whereNull('created_at')
            ->whereNull('updated_at')
            ->with('layanan')
            ->get();


        // Simpan pendapatan statis usaha utama ke database dan kumpulkan data Excel
        if ($layanan_id_utama != 5) {
            $excel_data[] = ['label' => 'Pendapatan', 'value' => null, 'is_header' => true];
        }

        foreach ($pendapatan_statis_utama as $i => $item) {
            if (!empty($item['label'])) {
                // Gunakan $layanan_id_utama untuk firstOrCreate dan create
                $namaPendapatan = NamaPendapatan::firstOrCreate(
                    ['nama_pendapatan' => $item['label'], 'layanan_id' => $layanan_id_utama]
                );
                $value = is_numeric($item['value']) ? $item['value'] : 0;
                RecordPendapatan::create([
                    'user_id' => $user_id,
                    'layanan_id' => $layanan_id_utama, // Gunakan layanan_id_utama
                    'nama_pendapatan_id' => $namaPendapatan->id,
                    'value' => $value,
                ]);
                if ($layanan_id_utama != 5) {
                    // Tambahkan nama layanan jika tipe campuran dan bukan layanan ID 5
                    $namaLayananPrefix = ($tipeUsahaUtama === 'campuran' && ($fieldsPendapatanUtama[$i]->layanan ?? null)) ? '[' . $fieldsPendapatanUtama[$i]->layanan->nama_layanan . '] ' : '';
                    $excel_data[] = ['label' => $namaLayananPrefix . $item['label'], 'value' => $value];
                }
                $total_pendapatan_excel += $value;
            }
        }

        // Simpan pendapatan tambahan usaha utama ke database dan kumpulkan data Excel
        // Note: Ini adalah field tambahan yang ditambahkan melalui tombol "Tambah Pendapatan" di form utama
        $adaPendapatanTambahanUtama = false;
        if ($request->has('pendapatan_tambahan_label')) {
            foreach ($request->pendapatan_tambahan_label as $idx => $label) {
                $label = trim($label);
                $value = $request->pendapatan_tambahan[$idx] ?? 0;
                if (!empty($label)) {
                    $adaPendapatanTambahanUtama = true;
                     // Gunakan $layanan_id_utama untuk firstOrCreate dan create
                    $namaPendapatan = NamaPendapatan::firstOrCreate(
                        ['nama_pendapatan' => $label, 'layanan_id' => $layanan_id_utama]
                    );
                    $value = is_numeric($value) ? $value : 0;
                    RecordPendapatan::create([
                        'user_id' => $user_id,
                        'layanan_id' => $layanan_id_utama, // Gunakan layanan_id_utama
                        'nama_pendapatan_id' => $namaPendapatan->id,
                        'value' => $value,
                    ]);
                    if ($layanan_id_utama != 5) {
                        $excel_data[] = ['label' => $label, 'value' => $value];
                    }
                    $total_pendapatan_excel += $value;
                }
            }
        }

        if ($layanan_id_utama != 5 && (!empty($pendapatan_statis_utama) || $adaPendapatanTambahanUtama)) {
            $excel_data[] = ['label' => '', 'value' => null]; // Baris kosong
        }

        // Simpan pengeluaran statis usaha utama ke database dan kumpulkan data Excel
        if ($layanan_id_utama != 5) {
            $excel_data[] = ['label' => 'Pengeluaran', 'value' => null, 'is_header' => true];
        }

        foreach ($pengeluaran_statis_utama as $i => $item) {
            if (!empty($item['label'])) {
                 // Gunakan $layanan_id_utama untuk firstOrCreate dan create
                $namaPengeluaran = NamaPengeluaran::firstOrCreate(
                    ['nama_pengeluaran' => $item['label'], 'layanan_id' => $layanan_id_utama]
                );
                $value = is_numeric($item['value']) ? $item['value'] : 0;
                RecordPengeluaran::create([
                    'user_id' => $user_id,
                    'layanan_id' => $layanan_id_utama, // Gunakan layanan_id_utama
                    'nama_pengeluaran_id' => $namaPengeluaran->id,
                    'value' => $value,
                ]);
                 // Tambahkan nama layanan jika tipe campuran dan bukan layanan ID 5
                if ($layanan_id_utama != 5) {
                    // Tambahkan nama layanan jika tipe campuran dan bukan layanan ID 5
                    $namaLayananPrefix = ($tipeUsahaUtama === 'campuran' && ($fieldsPengeluaranUtama[$i]->layanan ?? null)) ? '[' . $fieldsPengeluaranUtama[$i]->layanan->nama_layanan . '] ' : '';
                    $excel_data[] = ['label' => $namaLayananPrefix . $item['label'], 'value' => $value];
                }
                $total_pengeluaran_excel += $value;
            }
        }

        // Simpan pengeluaran tambahan usaha utama ke database dan kumpulkan data Excel
        // Note: Ini adalah field tambahan yang ditambahkan melalui tombol "Tambah Pengeluaran" di form utama
        if ($request->has('pengeluaran_tambahan_label')) {
            $adaPengeluaranTambahanUtama = false;
            foreach ($request->pengeluaran_tambahan_label as $idx => $label) {
                $label = trim($label);
                $value = $request->pengeluaran_tambahan[$idx] ?? 0;
                if (!empty($label)) {
                    $adaPengeluaranTambahanUtama = true;
                     // Gunakan $layanan_id_utama untuk firstOrCreate dan create
                    $namaPengeluaran = NamaPengeluaran::firstOrCreate(
                        ['nama_pengeluaran' => $label, 'layanan_id' => $layanan_id_utama]
                    );
                    $value = is_numeric($value) ? $value : 0;
                    RecordPengeluaran::create([
                        'user_id' => $user_id,
                        'layanan_id' => $layanan_id_utama, // Gunakan layanan_id_utama
                        'nama_pengeluaran_id' => $namaPengeluaran->id,
                        'value' => $value,
                    ]);
                    if ($layanan_id_utama != 5) {
                        $excel_data[] = ['label' => $label, 'value' => $value];
                    }
                    $total_pengeluaran_excel += $value;
                }
            }
        }
        if ($layanan_id_utama != 5 && (!empty($pengeluaran_statis_utama) || $adaPengeluaranTambahanUtama)) {
            $excel_data[] = ['label' => '', 'value' => null]; // Baris kosong
        }

        // --- Proses data usaha tambahan HANYA JIKA layanan utama adalah ID 5 ---
        if ($layanan_id_utama == 5) {
            // $pendapatan_statis_utama = $request->input('usaha_tambahan.0.pendapatan_statis', []);
            // $pengeluaran_statis_utama = $request->input('usaha_tambahan.0.pengeluaran_statis', []);
            
            $usahaTambahan = collect($request->input('usaha_tambahan', []))
                ->reject(fn ($usaha) => isset($usaha['id']) && $usaha['id'] == 5) 
                ->values();

            foreach ($usahaTambahan as $index => $usaha_data) {
                $layanan_id_tambahan = $usaha_data['id'] ?? null;

                // Skip processing if it's the main business (ID 5) or invalid
                if (!$layanan_id_tambahan || $layanan_id_tambahan == 5) {
                    continue;
                }

                $layanan_tambahan = Layanan::find($layanan_id_tambahan);
                $namaUsahaTambahan = $layanan_tambahan ? $layanan_tambahan->nama_layanan : 'Usaha Tambahan';

                // Process income
                $excel_data[] = ['label' => "[$namaUsahaTambahan] Pendapatan", 'value' => null, 'is_header' => true];
                $pendapatan_statis_tambahan = $usaha_data['pendapatan_statis'] ?? [];
                foreach ($pendapatan_statis_tambahan as $item) {
                    if (!empty($item['label'])) {
                        $namaPendapatan = NamaPendapatan::firstOrCreate(
                            ['nama_pendapatan' => $item['label'], 'layanan_id' => $layanan_id_tambahan]
                        );
                        $value = is_numeric($item['value']) ? $item['value'] : 0;
                        RecordPendapatan::create([
                            'user_id' => $user_id,
                            'layanan_id' => $layanan_id_tambahan,
                            'nama_pendapatan_id' => $namaPendapatan->id,
                            'value' => $value,
                        ]);
                        $excel_data[] = ['label' => $item['label'], 'value' => $value];
                        $total_pendapatan_excel += $value;
                    }
                }

                // Process expenses
                $excel_data[] = ['label' => "[$namaUsahaTambahan] Pengeluaran", 'value' => null, 'is_header' => true];
                $pengeluaran_statis_tambahan = $usaha_data['pengeluaran_statis'] ?? [];
                foreach ($pengeluaran_statis_tambahan as $item) {
                    if (!empty($item['label'])) {
                        $namaPengeluaran = NamaPengeluaran::firstOrCreate(
                            ['nama_pengeluaran' => $item['label'], 'layanan_id' => $layanan_id_tambahan]
                        );
                        $value = is_numeric($item['value']) ? $item['value'] : 0;
                        RecordPengeluaran::create([
                            'user_id' => $user_id,
                            'layanan_id' => $layanan_id_tambahan,
                            'nama_pengeluaran_id' => $namaPengeluaran->id,
                            'value' => $value,
                        ]);
                        $excel_data[] = ['label' => $item['label'], 'value' => $value];
                        $total_pengeluaran_excel += $value;
                    }
                }
                
                // Add empty row separator
                $excel_data[] = ['label' => '', 'value' => null];
            }

        }



        // --- Logika Penulisan ke Excel ---

        $spreadsheet = IOFactory::load(public_path('templates/template_analisis.xlsx'));
        $sheet = $spreadsheet->getActiveSheet();
        $rupiahFormat = '"Rp" #,##0;[Red]"Rp" -#,##0';
        $percentageFormat = '0.00%';

        // Judul utama di atas tabel
        // Gunakan nama usaha utama untuk judul
        $sheet->setCellValue('E3', 'Analisis Kelayakan Usaha ' . ($namaUsahaUtama ? "($namaUsahaUtama)" : ''));
        $sheet->mergeCells('E3:F3');
        $sheet->getStyle('E3')->getFont()->setBold(true)->setSize(14);
        $sheet->getStyle('E3')->getAlignment()->setHorizontal(\PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER);

        // Header tabel
        $sheet->setCellValue('E6', 'Deskripsi'); // Ubah header
        $sheet->setCellValue('F6', 'Jumlah');    // Ubah header
        $sheet->getStyle('E6:F6')->getFont()->setBold(true);
        $sheet->getStyle('E6:F6')->getAlignment()->setHorizontal(\PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER);


        // Tulis data yang sudah dikumpulkan ke Excel
        $currentRow = 7; // Mulai dari baris 7 setelah header
        foreach ($excel_data as $data_row) {
            $sheet->setCellValue('E' . $currentRow, $data_row['label']);
            $sheet->setCellValue('F' . $currentRow, $data_row['value']);

            // Terapkan format Rupiah hanya jika bukan header dan ada nilai
            if (!isset($data_row['is_header']) || !$data_row['is_header']) {
                 $sheet->getStyle('F' . $currentRow)->getNumberFormat()->setFormatCode($rupiahFormat);
            } else {
                 // Format header jika perlu, atau biarkan default
                 $sheet->getStyle('E' . $currentRow)->getFont()->setBold(true);
            }

            $currentRow++;
        }

        // Baris kosong sebelum total
        $sheet->setCellValue('E' . $currentRow, '');
        $sheet->setCellValue('F' . $currentRow, '');
        $currentRow++;

        // Total Pendapatan
        $sheet->setCellValue('E' . $currentRow, 'Total Pendapatan');
        $sheet->setCellValue('F' . $currentRow, $total_pendapatan_excel);
        $sheet->getStyle('F' . $currentRow)->getNumberFormat()->setFormatCode($rupiahFormat);
        $sheet->getStyle('E' . $currentRow . ':F' . $currentRow)->getFont()->setBold(true);
        $rowTotalPendapatan = $currentRow;
        $currentRow++;

        // Total Pengeluaran
        $sheet->setCellValue('E' . $currentRow, 'Total Pengeluaran');
        $sheet->setCellValue('F' . $currentRow, $total_pengeluaran_excel);
        $sheet->getStyle('F' . $currentRow)->getNumberFormat()->setFormatCode($rupiahFormat);
        $sheet->getStyle('E' . $currentRow . ':F' . $currentRow)->getFont()->setBold(true);
        $rowTotalPengeluaran = $currentRow;
        $currentRow++;

        // Baris kosong sebelum laba rugi
        $sheet->setCellValue('E' . $currentRow, '');
        $sheet->setCellValue('F' . $currentRow, '');
        $currentRow++;

        // Rumus Laba Rugi
        $sheet->setCellValue('E' . $currentRow, 'Laba/Rugi');
        // Gunakan nilai total yang sudah dihitung di PHP, bukan rumus Excel yang mereferensi baris dinamis
        $laba_rugi = $total_pendapatan_excel - $total_pengeluaran_excel;
        $sheet->setCellValue('F' . $currentRow, $laba_rugi);
        $sheet->getStyle('F' . $currentRow)->getNumberFormat()->setFormatCode($rupiahFormat);
        $sheet->getStyle('E' . $currentRow . ':F' . $currentRow)->getFont()->setBold(true);
        $currentRow++;

        // Margin Laba terhadap Omset
        $margin = ($total_pendapatan_excel > 0) ? ($laba_rugi / $total_pendapatan_excel) : 0;
        $sheet->setCellValue('E' . $currentRow, 'Margin Laba terhadap Omset (%)');
        $sheet->setCellValue('F' . $currentRow, $margin); // Tulis nilai desimal
        $sheet->getStyle('E' . $currentRow . ':F' . $currentRow)->getFont()->setBold(true);
        $sheet->getStyle('F' . $currentRow)->getNumberFormat()->setFormatCode($percentageFormat); // Terapkan format persentase
        $currentRow++;


        // Tambahkan border pada area tabel (misal dari E6:F{baris terakhir})
        $lastRow = $currentRow -1; // baris terakhir yang terisi adalah baris sebelum increment terakhir
        $sheet->getStyle('E6:F' . $lastRow)->applyFromArray([
            'borders' => [
                'allBorders' => [
                    'borderStyle' => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN,
                    'color' => ['argb' => 'FF000000'],
                ],
            ],
        ]);

        // Auto-size columns for better readability
        $sheet->getColumnDimension('E')->setAutoSize(true);
        $sheet->getColumnDimension('F')->setAutoSize(true);


        $filename = 'analisis_usaha_' . $user_id . '_' . $layanan_id_utama . '.xlsx'; // Gunakan layanan_id_utama untuk nama file
        $tempFile = public_path('download/' . $filename);
        (new Xlsx($spreadsheet))->save($tempFile);

        // Catat download
        Download::create([
            'user_id' => $user_id, // Gunakan user_id yang sudah ditentukan
            'layanan_id' => $layanan_id_utama, // Catat layanan_id_utama
            'downloaded_at' => now(),
        ]);

        return response()->download($tempFile);
    }

    public function download($layanan_id)
    {
        $user_id = Auth::id();
        $filename = 'analisis_usaha_' . $user_id . '_' . $layanan_id . '.xlsx';
        $path = public_path('download/' . $filename);

        if (!file_exists($path)) {
            abort(404, 'File tidak ditemukan');
        }

        return response()->download($path);
    }

}