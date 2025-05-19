<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use PhpOffice\PhpSpreadsheet\IOFactory;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;

class AnalisisUsahaExportController extends Controller
{
    public function export(Request $request)
    {
        $spreadsheet = IOFactory::load(storage_path('app/templates/template_analisis.xlsx'));
        $sheet = $spreadsheet->getActiveSheet();

        // Isi data input ke cell yang sesuai (ubah sesuai template Anda)
        // $sheet->setCellValue('B2', $request->modal);
        // $sheet->setCellValue('B3', $request->jasa);
        // $sheet->setCellValue('B4', $request->penjualan);
        // $sheet->setCellValue('B5', $request->{'lainnya-pendapatan'});
        // $sheet->setCellValue('B7', $request->bahan);
        // $sheet->setCellValue('B8', $request->{'gaji-karyawan'});
        // $sheet->setCellValue('B9', $request->{'banyak-karyawan'});
        // $sheet->setCellValue('B10', $request->{'sewa-tempat'});
        // $sheet->setCellValue('B11', $request->listrik);
        // $sheet->setCellValue('B12', $request->{'lainnya-pengeluaran'});

        $sheet->setCellValue('F8', is_numeric($request->modal) ? $request->modal : 0);
        $sheet->setCellValue('F9', is_numeric($request->jasa) ? $request->jasa : 0);
        $sheet->setCellValue('F10', is_numeric($request->penjualan) ? $request->penjualan : 0);
        $sheet->setCellValue('F11', is_numeric($request->{'lainnya-pendapatan'}) ? $request->{'lainnya-pendapatan'} : 0);
        $sheet->setCellValue('F16', is_numeric($request->bahan) ? $request->bahan : 0);
        $sheet->setCellValue('F17', is_numeric($request->{'gaji-karyawan'}) ? $request->{'gaji-karyawan'} : 0);
        $sheet->setCellValue('F18', is_numeric($request->{'banyak-karyawan'}) ? $request->{'banyak-karyawan'} : 0);
        $sheet->setCellValue('F19', is_numeric($request->{'sewa-tempat'}) ? $request->{'sewa-tempat'} : 0);
        $sheet->setCellValue('F20', is_numeric($request->listrik) ? $request->listrik : 0);
        $sheet->setCellValue('F21', is_numeric($request->{'lainnya-pengeluaran'}) ? $request->{'lainnya-pengeluaran'} : 0);

        $filename = 'analisis_usaha_' . date('Ymd_His') . '.xlsx';
        $tempFile = storage_path('app/' . $filename);
        (new Xlsx($spreadsheet))->save($tempFile);

        return response()->download($tempFile)->deleteFileAfterSend(true);
    }
}
