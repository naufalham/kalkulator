<?php

namespace App\Http\Controllers\Admin;

use App\Models\Kalkulator;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Layanan; // Atau model yang sesuai untuk kalkulator/layanan
use App\Models\User;    
use App\Models\Berita;    

class DashboardController extends Controller
{
    public function index() // Atau nama method yang sesuai
{
    // Anda perlu memanggil metode statistikDownload dari DownloadController
    // atau memindahkan logika statistikDownload ke sini.
    // Untuk saat ini, kita akan memanggilnya dan mendapatkan datanya.
    $downloadController = new \App\Http\Controllers\DownloadController();
    $statistikData = $downloadController->statistikDownload(); // Ini mengembalikan view, kita perlu memodifikasinya

    $jumlahUsaha = Layanan::where('id', '!=', 5)->count();
    $jumlahKalkulator = Layanan::count(); // Hitung total layanan/kalkulator
    $jumlahPengguna = User::where('role', 'user')->count();       // Hitung total pengguna
    $jumlahBerita = Berita::count(); // Hitung total berita


    return view('admin.kalkulator', [
        'bulan' => $statistikData['bulan'] ?? [], // Ambil bulan dari hasil
        'series' => $statistikData['series'] ?? [], // Ambil series dari hasil
        'pieData' => $statistikData['pieData'] ?? [], // Ambil pieData dari hasil
        'jumlahKalkulator' => $jumlahKalkulator, // Total jenis layanan termasuk campuran
        'jumlahUsaha' => $jumlahUsaha, // Total jenis usaha spesifik (tidak termasuk campuran)
        'jumlahPengguna' => $jumlahPengguna,
        'jumlahBerita' => $jumlahBerita, 
    ]);
}

}
