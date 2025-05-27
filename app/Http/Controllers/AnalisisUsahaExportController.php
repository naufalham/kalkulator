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

class AnalisisUsahaExportController extends Controller
{
    public function export(Request $request)
    {
        // Ambil user_id (jika pakai auth)
        $user_id = Auth::id() ?? 1; // fallback ke 1 jika belum login
        $layanan_id = 1; // atau ambil dari request jika ada

        $pendapatan_statis = [
            ['label' => 'Modal', 'value' => $request->modal],
            ['label' => 'Jasa', 'value' => $request->jasa],
            ['label' => 'Penjualan', 'value' => $request->penjualan],
            ['label' => 'Lainnya', 'value' => $request->{'lainnya-pendapatan'}],
        ];

        $pengeluaran_statis = [
            ['label' => 'Bahan', 'value' => $request->bahan],
            ['label' => 'Gaji Karyawan', 'value' => $request->{'gaji-karyawan'}],
            ['label' => 'Banyak Karyawan', 'value' => $request->{'banyak-karyawan'}],
            ['label' => 'Sewa Tempat', 'value' => $request->{'sewa-tempat'}],
            ['label' => 'Listrik', 'value' => $request->listrik],
            ['label' => 'Lainnya', 'value' => $request->{'lainnya-pengeluaran'}],
        ];

        // Simpan pendapatan statis
        foreach ($pendapatan_statis as $item) {
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

        // Simpan pendapatan dinamis
        if ($request->has('fields_pendapatan')) {
            foreach ($request->fields_pendapatan as $field) {
                $label = $field['label'] ?? '';
                $value = $field['value'] ?? 0;
                if ($label !== '') {
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

        // Simpan pengeluaran statis
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

        // Simpan pengeluaran dinamis
        if ($request->has('fields_pengeluaran')) {
            foreach ($request->fields_pengeluaran as $field) {
                $label = $field['label'] ?? '';
                $value = $field['value'] ?? 0;
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

        // Format cell sebagai Rupiah (misal: F8 sampai F21 dan dinamis)
        // $sheet->getStyle('F8:F21')->getNumberFormat()->setFormatCode($rupiahFormat);
        $rupiahFormat = '"Rp" #,##0;[Red]"Rp" -#,##0';

        // Hitung jumlah field pendapatan dinamis
        $jumlahPendapatanDinamis = $request->has('fields_pendapatan') ? count($request->fields_pendapatan) : 0;

        // Sisipkan row sebelum baris pendapatan statis (baris 8)
        if ($jumlahPendapatanDinamis > 0) {
            $sheet->insertNewRowBefore(8, $jumlahPendapatanDinamis);
        }

        // Tulis pendapatan statis mulai baris 8
        $startRowPendapatan = 8;
        $total_pendapatan = 0;

        $sheet->setCellValue('E7', 'Pendapatan');
        $sheet->getStyle('E7')->getFont()->setBold(true);

        $sheet->setCellValue('E' . $startRowPendapatan, 'Modal');
        $sheet->setCellValue('F' . $startRowPendapatan, is_numeric($request->modal) ? $request->modal : 0);
        $sheet->getStyle('F' . $startRowPendapatan)->getNumberFormat()->setFormatCode($rupiahFormat);
        $total_pendapatan += is_numeric($request->modal) ? $request->modal : 0;
        $startRowPendapatan++;

        $sheet->setCellValue('E' . $startRowPendapatan, 'Jasa');
        $sheet->setCellValue('F' . $startRowPendapatan, is_numeric($request->jasa) ? $request->jasa : 0);
        $sheet->getStyle('F' . $startRowPendapatan)->getNumberFormat()->setFormatCode($rupiahFormat);
        $total_pendapatan += is_numeric($request->jasa) ? $request->jasa : 0;
        $startRowPendapatan++;

        $sheet->setCellValue('E' . $startRowPendapatan, 'Penjualan');
        $sheet->setCellValue('F' . $startRowPendapatan, is_numeric($request->penjualan) ? $request->penjualan : 0);
        $sheet->getStyle('F' . $startRowPendapatan)->getNumberFormat()->setFormatCode($rupiahFormat);
        $total_pendapatan += is_numeric($request->penjualan) ? $request->penjualan : 0;
        $startRowPendapatan++;

        // Tulis field pendapatan dinamis setelah statis
        if ($request->has('fields_pendapatan')) {
            foreach ($request->fields_pendapatan as $field) {
                $label = $field['label'] ?? '';
                $value = isset($field['value']) && is_numeric($field['value']) ? (float)$field['value'] : 0;
                $sheet->setCellValue('E' . $startRowPendapatan, $label);
                $sheet->setCellValue('F' . $startRowPendapatan, $value);
                $sheet->getStyle('F' . $startRowPendapatan)->getNumberFormat()->setFormatCode($rupiahFormat);
                $total_pendapatan += $value;
                $startRowPendapatan++;
            }
        }

        // Tambahkan satu baris kosong sebelum total pendapatan
        $sheet->setCellValue('E' . $startRowPendapatan, '');
        $sheet->setCellValue('F' . $startRowPendapatan, '');
        $startRowPendapatan++;

        // Total pendapatan di baris setelah semua pendapatan
        $sheet->setCellValue('E' . $startRowPendapatan, 'Total Pendapatan');
        $sheet->setCellValue('F' . $startRowPendapatan, $total_pendapatan);
        $sheet->getStyle('F' . $startRowPendapatan)->getNumberFormat()->setFormatCode($rupiahFormat);
        $sheet->getStyle('E' . $startRowPendapatan . ':F' . $startRowPendapatan)->getFont()->setBold(true);
        $rowTotalPendapatan = $startRowPendapatan;
        $startRowPendapatan++;

        // Tambahkan satu baris kosong setelah total pendapatan
        $sheet->setCellValue('E' . $startRowPendapatan, '');
        $sheet->setCellValue('F' . $startRowPendapatan, '');
        $startRowPendapatan++;
        

        // Hitung jumlah field pengeluaran dinamis
        $jumlahPengeluaranDinamis = $request->has('fields_pengeluaran') ? count($request->fields_pengeluaran) : 0;
        $total_pengeluaran = 0;

        // Sisipkan row sebelum baris pengeluaran statis (baris 16)
        if ($jumlahPengeluaranDinamis > 0) {
            $sheet->insertNewRowBefore(16, $jumlahPengeluaranDinamis);
        }

        // Tulis pengeluaran statis mulai baris 16
        $startRowPengeluaran = $startRowPendapatan;
        $total_pengeluaran = 0;

        // Tambahkan row sebelum bahan bertuliskan "Pengeluaran" dan bold
        $sheet->setCellValue('E' . ($startRowPengeluaran), 'Pengeluaran');
        $sheet->getStyle('E' . ($startRowPengeluaran))->getFont()->setBold(true);
        $startRowPengeluaran++;

        $sheet->setCellValue('E' . $startRowPengeluaran, 'Bahan');
        $sheet->setCellValue('F' . $startRowPengeluaran, is_numeric($request->bahan) ? $request->bahan : 0);
        $sheet->getStyle('F' . $startRowPengeluaran)->getNumberFormat()->setFormatCode($rupiahFormat);
        $total_pengeluaran += is_numeric($request->bahan) ? $request->bahan : 0;
        $startRowPengeluaran++;

        $sheet->setCellValue('E' . $startRowPengeluaran, 'Gaji Karyawan');
        $sheet->setCellValue('F' . $startRowPengeluaran, is_numeric($request->{'gaji-karyawan'}) ? $request->{'gaji-karyawan'} : 0);
        $sheet->getStyle('F' . $startRowPengeluaran)->getNumberFormat()->setFormatCode($rupiahFormat);
        $total_pengeluaran += is_numeric($request->{'gaji-karyawan'}) ? $request->{'gaji-karyawan'} : 0;
        $startRowPengeluaran++;

        $sheet->setCellValue('E' . $startRowPengeluaran, 'Banyak Karyawan');
        $sheet->setCellValue('F' . $startRowPengeluaran, is_numeric($request->{'banyak-karyawan'}) ? $request->{'banyak-karyawan'} : 0);
        $sheet->getStyle('F' . $startRowPengeluaran)->getNumberFormat()->setFormatCode($rupiahFormat);
        $total_pengeluaran += is_numeric($request->{'banyak-karyawan'}) ? $request->{'banyak-karyawan'} : 0;
        $startRowPengeluaran++;

        $sheet->setCellValue('E' . $startRowPengeluaran, 'Sewa Tempat');
        $sheet->setCellValue('F' . $startRowPengeluaran, is_numeric($request->{'sewa-tempat'}) ? $request->{'sewa-tempat'} : 0);
        $sheet->getStyle('F' . $startRowPengeluaran)->getNumberFormat()->setFormatCode($rupiahFormat);
        $total_pengeluaran += is_numeric($request->{'sewa-tempat'}) ? $request->{'sewa-tempat'} : 0;
        $startRowPengeluaran++;

        $sheet->setCellValue('E' . $startRowPengeluaran, 'Listrik');
        $sheet->setCellValue('F' . $startRowPengeluaran, is_numeric($request->listrik) ? $request->listrik : 0);
        $sheet->getStyle('F' . $startRowPengeluaran)->getNumberFormat()->setFormatCode($rupiahFormat);
        $total_pengeluaran += is_numeric($request->listrik) ? $request->listrik : 0;
        $startRowPengeluaran++;

        $sheet->setCellValue('E' . $startRowPengeluaran, 'Lainnya');
        $sheet->setCellValue('F' . $startRowPengeluaran, is_numeric($request->{'lainnya-pengeluaran'}) ? $request->{'lainnya-pengeluaran'} : 0);
        $sheet->getStyle('F' . $startRowPengeluaran)->getNumberFormat()->setFormatCode($rupiahFormat);
        $total_pengeluaran += is_numeric($request->{'lainnya-pengeluaran'}) ? $request->{'lainnya-pengeluaran'} : 0;
        $startRowPengeluaran++;

        // Tulis field pengeluaran dinamis setelah statis
        if ($request->has('fields_pengeluaran')) {
            foreach ($request->fields_pengeluaran as $field) {
                $label = $field['label'] ?? '';
                $value = isset($field['value']) && is_numeric($field['value']) ? (float)$field['value'] : 0;
                $sheet->setCellValue('E' . $startRowPengeluaran, $label);
                $sheet->setCellValue('F' . $startRowPengeluaran, $value);
                $sheet->getStyle('F' . $startRowPengeluaran)->getNumberFormat()->setFormatCode($rupiahFormat);
                $total_pengeluaran += $value;
                $startRowPengeluaran++;
            }
        }

        // Tambahkan satu baris kosong setelah total pengeluaran
        $sheet->setCellValue('E' . $startRowPengeluaran, '');
        $sheet->setCellValue('F' . $startRowPengeluaran, '');
        $startRowPengeluaran++;

        // Total pengeluaran di baris setelah semua pengeluaran
        $sheet->setCellValue('E' . $startRowPengeluaran, 'Total Pengeluaran');
        $sheet->setCellValue('F' . $startRowPengeluaran, $total_pengeluaran);
        $sheet->getStyle('F' . $startRowPengeluaran)->getNumberFormat()->setFormatCode($rupiahFormat);
        $sheet->getStyle('E' . $startRowPengeluaran . ':F' . $startRowPengeluaran)->getFont()->setBold(true);
        $rowTotalPengeluaran = $startRowPengeluaran; // SIMPAN BARIS INI!
        $startRowPengeluaran++;

        // Tambahkan satu baris kosong sebelum laba rugi
        $sheet->setCellValue('E' . $startRowPengeluaran, '');
        $sheet->setCellValue('F' . $startRowPengeluaran, '');
        $startRowPengeluaran++;

        // Rumus Laba Rugi
        $sheet->setCellValue('E' . $startRowPengeluaran, 'Laba/Rugi');
        $sheet->setCellValue('F' . $startRowPengeluaran, '=F' . ($rowTotalPendapatan) . '-F' . ($rowTotalPengeluaran));
        $sheet->getStyle('F' . $startRowPengeluaran)->getNumberFormat()->setFormatCode($rupiahFormat);
        $sheet->getStyle('E' . $startRowPengeluaran . ':F' . $startRowPengeluaran)->getFont()->setBold(true);
        $startRowPengeluaran++;


        // Hitung margin laba terhadap omset (maksimal 100%)
        $margin = ($total_pendapatan > 0) ? (($total_pendapatan - $total_pengeluaran) / $total_pendapatan) * 100 : 0;
        $margin = min($margin, 100); // batasi maksimal 100%

        // Tulis Margin Laba terhadap Omset
        $sheet->setCellValue('E' . $startRowPengeluaran, 'Margin Laba terhadap Omset (%)');
        $sheet->setCellValue('F' . $startRowPengeluaran, round($margin / 100, 4)); // Excel expects 0.12 for 12%
        $sheet->getStyle('E' . $startRowPengeluaran . ':F' . $startRowPengeluaran)->getFont()->setBold(true);
        $sheet->getStyle('F' . $startRowPengeluaran)->getNumberFormat()->setFormatCode('0.00%');


        $filename = 'analisis_usaha_' . date('Ymd_His') . '.xlsx';
        $tempFile = storage_path('app/' . $filename);
        (new Xlsx($spreadsheet))->save($tempFile);

        return response()->download($tempFile)->deleteFileAfterSend(true);
    }
}
