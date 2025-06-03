<?php

namespace App\Http\Controllers;

use App\Models\RecordPendapatan;
use App\Models\NamaPendapatan;
use App\Models\RecordPengeluaran;
use App\Models\NamaPengeluaran;
use App\Models\Layanan;
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

        $user_id = Auth::id() ?? 1;
        $layanan_id = $request->input('layanan_id');

         // Jika belum bayar, tampilkan Snap Midtrans
        if (!$request->has('is_paid')) {
            $params = [
                'transaction_details' => [
                    'order_id' => uniqid(),
                    'gross_amount' => 10000,
                ],
                'customer_details' => [
                    'email' => Auth::user()->email,
                ],
            ];
            $snapToken = Snap::getSnapToken($params);

            // Simpan data form ke session
            $request->session()->put('form_usaha', $request->all());

            // Tampilkan view Snap
            return view('user.pay_snap', compact('snapToken'));
        }

        // Jika sudah bayar, ambil data form dari session dan proses download
        $formData = $request->session()->get('form_usaha');
        if ($formData) {
            $request = new Request($formData);
        }
        $layanan_id = $request->input('layanan_id');
        $layanan = Layanan::find($layanan_id);
        $namaUsaha = $layanan ? $layanan->nama_layanan : '';
        $tipeUsaha = $layanan ? $layanan->tipe : '';

        // Ambil array statis dari form
        $pengeluaran_statis = $request->pengeluaran_statis ?? [];
        $pendapatan_statis = $request->pendapatan_statis ?? [];

        // Ambil label statis dari database (hanya yang created_at dan updated_at NULL)
        if ($tipeUsaha === 'campuran') {
            // Ambil semua field dari semua layanan, join ke tabel layanan
            $fieldsPendapatan = \App\Models\NamaPendapatan::whereNull('created_at')
                ->whereNull('updated_at')
                ->with('layanan') // pastikan relasi 'layanan' ada di model NamaPendapatan
                ->orderBy('layanan_id')
                ->get();

            $fieldsPengeluaran = \App\Models\NamaPengeluaran::whereNull('created_at')
                ->whereNull('updated_at')
                ->with('layanan') // pastikan relasi 'layanan' ada di model NamaPengeluaran
                ->orderBy('layanan_id')
                ->get();
        } else {
            // Ambil field sesuai layanan
            $fieldsPendapatan = \App\Models\NamaPendapatan::where('layanan_id', $layanan_id)
                ->whereNull('created_at')
                ->whereNull('updated_at')
                ->with('layanan')
                ->get();
            $fieldsPengeluaran = \App\Models\NamaPengeluaran::where('layanan_id', $layanan_id)
                ->whereNull('created_at')
                ->whereNull('updated_at')
                ->with('layanan')
                ->get();
        }

        // Simpan pendapatan statis ke database
        foreach ($pendapatan_statis as $item) {
            if (!empty($item['label'])) {
                $namaPendapatan = NamaPendapatan::firstOrCreate(
                    ['nama_pendapatan' => $item['label'], 'layanan_id' => $layanan_id]
                );
                RecordPendapatan::create([
                    'user_id' => $user_id,
                    'layanan_id' => $layanan_id,
                    'nama_pendapatan_id' => $namaPendapatan->id,
                    'value' => is_numeric($item['value']) ? $item['value'] : 0,
                ]);
            }
        }

        // Simpan pendapatan tambahan ke database
        if ($request->has('pendapatan_tambahan_label')) {
            foreach ($request->pendapatan_tambahan_label as $idx => $label) {
                $label = trim($label);
                $value = $request->pendapatan_tambahan[$idx] ?? 0;
                if (!empty($label)) {
                    $namaPendapatan = NamaPendapatan::firstOrCreate(
                        ['nama_pendapatan' => $label, 'layanan_id' => $layanan_id]
                    );
                    RecordPendapatan::create([
                        'user_id' => $user_id,
                        'layanan_id' => $layanan_id,
                        'nama_pendapatan_id' => $namaPendapatan->id,
                        'value' => is_numeric($value) ? $value : 0,
                    ]);
                }
            }
        }

        // Simpan pengeluaran statis ke database
        foreach ($pengeluaran_statis as $item) {
            if (!empty($item['label'])) {
                $namaPengeluaran = NamaPengeluaran::firstOrCreate(
                    ['nama_pengeluaran' => $item['label'], 'layanan_id' => $layanan_id]
                );
                RecordPengeluaran::create([
                    'user_id' => $user_id,
                    'layanan_id' => $layanan_id,
                    'nama_pengeluaran_id' => $namaPengeluaran->id,
                    'value' => is_numeric($item['value']) ? $item['value'] : 0,
                ]);
            }
        }

        // Simpan pengeluaran tambahan ke database
        if ($request->has('pengeluaran_tambahan_label')) {
            foreach ($request->pengeluaran_tambahan_label as $idx => $label) {
                $label = trim($label);
                $value = $request->pengeluaran_tambahan[$idx] ?? 0;
                if (!empty($label)) {
                    $namaPengeluaran = NamaPengeluaran::firstOrCreate(
                        ['nama_pengeluaran' => $label, 'layanan_id' => $layanan_id]
                    );
                    RecordPengeluaran::create([
                        'user_id' => $user_id,
                        'layanan_id' => $layanan_id,
                        'nama_pengeluaran_id' => $namaPengeluaran->id,
                        'value' => is_numeric($value) ? $value : 0,
                    ]);
                }
            }
        }

        $spreadsheet = IOFactory::load(storage_path('app/templates/template_analisis.xlsx'));
        $sheet = $spreadsheet->getActiveSheet();
        $rupiahFormat = '"Rp" #,##0;[Red]"Rp" -#,##0';

        // Judul utama di atas tabel
        $sheet->setCellValue('E3', 'Analisis Kelayakan Usaha ' . ($namaUsaha ? "($namaUsaha)" : ''));
        $sheet->mergeCells('E3:F3');
        $sheet->getStyle('E3')->getFont()->setBold(true)->setSize(14);
        $sheet->getStyle('E3')->getAlignment()->setHorizontal(\PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER);

        // Header tabel
        $sheet->setCellValue('E6', 'Modal Belanja');
        $sheet->setCellValue('F6', 'Total Biaya');
        $sheet->getStyle('E6:F6')->getFont()->setBold(true);
        $sheet->getStyle('E6:F6')->getAlignment()->setHorizontal(\PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER);


        // Tulis pendapatan ke Excel
        $startRowPendapatan = 8;
        $total_pendapatan = 0;
        $sheet->setCellValue('E7', 'Pendapatan');
        $sheet->getStyle('E7')->getFont()->setBold(true);

        // Tulis pendapatan statis dari database
        foreach ($fieldsPendapatan as $i => $field) {
            $value = $pendapatan_statis[$i]['value'] ?? 0;
            $namaLayanan = ($tipeUsaha === 'campuran' && $field->layanan) ? '[' . $field->layanan->nama_layanan . '] ' : '';
            $sheet->setCellValue('E' . $startRowPendapatan, $namaLayanan . $field->nama_pendapatan);
            $sheet->setCellValue('F' . $startRowPendapatan, is_numeric($value) ? $value : 0);
            $sheet->getStyle('F' . $startRowPendapatan)->getNumberFormat()->setFormatCode($rupiahFormat);
            $total_pendapatan += is_numeric($value) ? $value : 0;
            $startRowPendapatan++;
        }


        // Tulis pendapatan dinamis (tambahan)
        if ($request->has('pendapatan_tambahan_label')) {
            foreach ($request->pendapatan_tambahan_label as $idx => $label) {
                $label = trim($label);
                $value = $request->pendapatan_tambahan[$idx] ?? 0;
                if (!empty($label)) {
                    $sheet->setCellValue('E' . $startRowPendapatan, $label);
                    $sheet->setCellValue('F' . $startRowPendapatan, is_numeric($value) ? $value : 0);
                    $sheet->getStyle('F' . $startRowPendapatan)->getNumberFormat()->setFormatCode($rupiahFormat);
                    $total_pendapatan += is_numeric($value) ? $value : 0;
                    $startRowPendapatan++;
                }
            }
        }

        // Baris kosong sebelum total pendapatan
        $sheet->setCellValue('E' . $startRowPendapatan, '');
        $sheet->setCellValue('F' . $startRowPendapatan, '');
        $startRowPendapatan++;

        // Total pendapatan
        $sheet->setCellValue('E' . $startRowPendapatan, 'Total Pendapatan');
        $sheet->setCellValue('F' . $startRowPendapatan, $total_pendapatan);
        $sheet->getStyle('F' . $startRowPendapatan)->getNumberFormat()->setFormatCode($rupiahFormat);
        $sheet->getStyle('E' . $startRowPendapatan . ':F' . $startRowPendapatan)->getFont()->setBold(true);
        $rowTotalPendapatan = $startRowPendapatan;
        $startRowPendapatan++;

        // Baris kosong setelah total pendapatan
        $sheet->setCellValue('E' . $startRowPendapatan, '');
        $sheet->setCellValue('F' . $startRowPendapatan, '');
        $startRowPendapatan++;

        // Pengeluaran
        $startRowPengeluaran = $startRowPendapatan;
        $total_pengeluaran = 0;
        $sheet->setCellValue('E' . $startRowPengeluaran, 'Pengeluaran');
        $sheet->getStyle('E' . $startRowPengeluaran)->getFont()->setBold(true);
        $startRowPengeluaran++;

        // Tulis pengeluaran statis dari database
        foreach ($fieldsPengeluaran as $i => $field) {
            $value = $pengeluaran_statis[$i]['value'] ?? 0;
            $namaLayanan = ($tipeUsaha === 'campuran' && $field->layanan) ? '[' . $field->layanan->nama_layanan . '] ' : '';
            $sheet->setCellValue('E' . $startRowPengeluaran, $namaLayanan . $field->nama_pengeluaran);
            $sheet->setCellValue('F' . $startRowPengeluaran, is_numeric($value) ? $value : 0);
            $sheet->getStyle('F' . $startRowPengeluaran)->getNumberFormat()->setFormatCode($rupiahFormat);
            $total_pengeluaran += is_numeric($value) ? $value : 0;
            $startRowPengeluaran++;
        }

        // Tulis pengeluaran dinamis (tambahan)
        if ($request->has('pengeluaran_tambahan_label')) {
            foreach ($request->pengeluaran_tambahan_label as $idx => $label) {
                $label = trim($label);
                $value = $request->pengeluaran_tambahan[$idx] ?? 0;
                if (!empty($label)) {
                    $sheet->setCellValue('E' . $startRowPengeluaran, $label);
                    $sheet->setCellValue('F' . $startRowPengeluaran, is_numeric($value) ? $value : 0);
                    $sheet->getStyle('F' . $startRowPengeluaran)->getNumberFormat()->setFormatCode($rupiahFormat);
                    $total_pengeluaran += is_numeric($value) ? $value : 0;
                    $startRowPengeluaran++;
                }
            }
        }

        // Baris kosong setelah pengeluaran
        $sheet->setCellValue('E' . $startRowPengeluaran, '');
        $sheet->setCellValue('F' . $startRowPengeluaran, '');
        $startRowPengeluaran++;

        // Total pengeluaran
        $sheet->setCellValue('E' . $startRowPengeluaran, 'Total Pengeluaran');
        $sheet->setCellValue('F' . $startRowPengeluaran, $total_pengeluaran);
        $sheet->getStyle('F' . $startRowPengeluaran)->getNumberFormat()->setFormatCode($rupiahFormat);
        $sheet->getStyle('E' . $startRowPengeluaran . ':F' . $startRowPengeluaran)->getFont()->setBold(true);
        $rowTotalPengeluaran = $startRowPengeluaran;
        $startRowPengeluaran++;


        // Baris kosong sebelum laba rugi
        $sheet->setCellValue('E' . $startRowPengeluaran, '');
        $sheet->setCellValue('F' . $startRowPengeluaran, '');
        $startRowPengeluaran++;

        // Rumus Laba Rugi
        $sheet->setCellValue('E' . $startRowPengeluaran, 'Laba/Rugi');
        $sheet->setCellValue('F' . $startRowPengeluaran, '=F' . ($rowTotalPendapatan) . '-F' . ($rowTotalPengeluaran));
        $sheet->getStyle('F' . $startRowPengeluaran)->getNumberFormat()->setFormatCode($rupiahFormat);
        $sheet->getStyle('E' . $startRowPengeluaran . ':F' . $startRowPengeluaran)->getFont()->setBold(true);
        $startRowPengeluaran++;

        // Margin Laba terhadap Omset
        $margin = ($total_pendapatan > 0) ? (($total_pendapatan - $total_pengeluaran) / $total_pendapatan) * 100 : 0;
        $margin = min($margin, 100);
        $sheet->setCellValue('E' . $startRowPengeluaran, 'Margin Laba terhadap Omset (%)');
        $sheet->setCellValue('F' . $startRowPengeluaran, round($margin / 100, 4));
        $sheet->getStyle('E' . $startRowPengeluaran . ':F' . $startRowPengeluaran)->getFont()->setBold(true);
        $sheet->getStyle('F' . $startRowPengeluaran)->getNumberFormat()->setFormatCode('0.00%');


        // Tambahkan border pada area tabel (misal dari E6:F{baris terakhir})
        $lastRow = $startRowPengeluaran; // baris terakhir yang terisi
        $sheet->getStyle('E6:F' . $lastRow)->applyFromArray([
            'borders' => [
                'allBorders' => [
                    'borderStyle' => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN,
                    'color' => ['argb' => 'FF000000'],
                ],
            ],
        ]);

        $filename = 'analisis_usaha_' . $user_id . '_' . $layanan_id . '.xlsx';
        $tempFile = storage_path('app/' . $filename);
        (new Xlsx($spreadsheet))->save($tempFile);

        return response()->download($tempFile);
    }

    public function download($layanan_id)
    {
        $user_id = Auth::id();
        $filename = 'analisis_usaha_' . $user_id . '_' . $layanan_id . '.xlsx';
        $path = storage_path('app/' . $filename);

        if (!file_exists($path)) {
            abort(404, 'File tidak ditemukan');
        }

        return response()->download($path);
    }
}
