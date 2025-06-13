<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Layanan;
use App\Models\NamaPendapatan;
use App\Models\NamaPengeluaran;


class UsahaController extends Controller
{
    public function index()
    {
        $layanans = Layanan::all();
        return view('user.usaha', compact('layanans'));
    }

    public function getUsahaForm($id, Request $request)
    {
        $index = $request->query('index');
        $layanan = Layanan::findOrFail($id);

        $fieldsPendapatan = NamaPendapatan::where('layanan_id', $id)->get(); // $id adalah ID Fesyen
        $fieldsPengeluaran = NamaPengeluaran::where('layanan_id', $id)->get(); // $id adalah ID Fesyen

        return view('user._usaha_fields', compact('fieldsPendapatan', 'fieldsPengeluaran', 'index'));
    }


    public function show($layanan)
    {
        $layanan = Layanan::findOrFail($layanan);

        // Ambil hanya data master (created_at & updated_at NULL)
        $fieldsPendapatan = NamaPendapatan::where('layanan_id', $layanan->id)
            ->whereNull('created_at')
            ->whereNull('updated_at')
            ->get();

        $fieldsPengeluaran = NamaPengeluaran::where('layanan_id', $layanan->id)
            ->whereNull('created_at')
            ->whereNull('updated_at')
            ->get();

        // Fetch all services (layanan) to be used in the "Tambah Usaha Lain" dropdown
        // Exclude the current service if needed, or include all based on logic
        $semuaLayanan = Layanan::with('pendapatan', 'pengeluaran')->get();


        return view('user.form_usaha', [
            'layanan' => $layanan,
            'fieldsPendapatan' => $fieldsPendapatan,
            'fieldsPengeluaran' => $fieldsPengeluaran,
            'semuaLayanan' => $semuaLayanan, // Pass $semuaLayanan to the view
        ]);
    }



}
