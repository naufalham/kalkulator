<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Layanan;

class UsahaController extends Controller
{
    public function index()
    {
        $layanans = Layanan::all();
        return view('user.usaha', compact('layanans'));
    }

    public function show($layanan)
    {
        $layanan = Layanan::findOrFail($layanan);

            // Ambil hanya data master (created_at & updated_at NULL)
        $fieldsPendapatan = \App\Models\NamaPendapatan::where('layanan_id', $layanan->id)
            ->whereNull('created_at')
            ->whereNull('updated_at')
            ->get();

        $fieldsPengeluaran = \App\Models\NamaPengeluaran::where('layanan_id', $layanan->id)
            ->whereNull('created_at')
            ->whereNull('updated_at')
            ->get();

        return view('user.form_usaha', [
            'layanan' => $layanan,
            'fieldsPendapatan' => $fieldsPendapatan,
            'fieldsPengeluaran' => $fieldsPengeluaran,
        ]);
        // return view('user.form_usaha', compact('layanan'));
    }
}