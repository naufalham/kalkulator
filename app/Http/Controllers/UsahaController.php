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
        $layanan = \App\Models\Layanan::findOrFail($layanan);
        return view('user.form_usaha', compact('layanan'));
    }
}