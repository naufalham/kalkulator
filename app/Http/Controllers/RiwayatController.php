<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Layanan;
use App\Models\RecordPendapatan;
use App\Models\RecordPengeluaran;

class RiwayatController extends Controller
{
    public function index()
    {
        $user_id = optional(\Illuminate\Support\Facades\Auth::user())->id;
        // Ambil semua layanan yang pernah diinput user
        $riwayat = Layanan::whereHas('recordPendapatan', function($q) use ($user_id) {
            $q->where('user_id', $user_id);
        })->with(['recordPendapatan' => function($q) use ($user_id) {
            $q->where('user_id', $user_id);
        }])->get();

        return view('user.riwayat', compact('riwayat'));
    }
}
