<?php

namespace App\Http\Controllers;

use App\Models\Kalkulator;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class KalkulatorController extends Controller
{
    public function index() {
        $kalkulators = Kalkulator::all();
        return view('user.kalkulator', compact('kalkulators'));
    }
    public function show($slug)
    {
        $kalkulator = Kalkulator::where('slug', $slug)->with('fields')->firstOrFail();
        return view('user.hitung', compact('kalkulator'));
    }
}
