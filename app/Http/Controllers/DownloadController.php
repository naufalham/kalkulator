<?php

namespace App\Http\Controllers;

use id;
use Carbon\Carbon;
use App\Models\Layanan;
use App\Models\Download;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class DownloadController extends Controller
{
    public function statistikDownload()
    {
        $data = Download::selectRaw('layanan_id, DATE_FORMAT(downloaded_at, "%Y-%m") as bulan, COUNT(*) as total')
            ->groupBy('layanan_id', 'bulan')
            ->orderBy('bulan')
            ->get();

        // Ambil total download per layanan (sejak awal)
        $totalDownload = Download::selectRaw('layanan_id, COUNT(*) as total')
            ->groupBy('layanan_id')
            ->get();

        $layanans = Layanan::pluck('nama_layanan', 'id');
        // Ambil semua bulan unik
        $bulan = $data->pluck('bulan')->unique()->sort()->values();

        // Ambil 12 bulan terakhir saja
        $bulan = $bulan->take(-12)->values();

        // Ubah format bulan dari "2025-06" menjadi "Juni 2025"
        $bulanFormatted = $bulan->map(function($b) {
            return Carbon::createFromFormat('Y-m', $b)->translatedFormat('F Y');
        });

        

        

        // Format data untuk Highcharts
        $series = [];
        foreach ($layanans as $id => $nama) {
            $dataPerLayanan = [];
            foreach ($bulan as $b) {
                $row = $data->where('layanan_id', $id)->where('bulan', $b)->first();
                $dataPerLayanan[] = $row ? (int)$row->total : 0;
            }
            $series[] = [
                'name' => $nama,
                'data' => $dataPerLayanan,
            ];
        }

        $pieData = [];
        foreach ($totalDownload as $row) {
            $pieData[] = [
                'name' => $layanans[$row->layanan_id] ?? 'Lainnya',
                'y' => (int)$row->total,
            ];
        }


        return view('admin.kalkulator', [
            'series' => $series,
            'bulan' => $bulanFormatted,
            'pieData' => $pieData,
        ]);
    }
}
