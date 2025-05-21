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
}