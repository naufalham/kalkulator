<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Layanan;
use App\Models\RecordPendapatan;
use App\Models\RecordPengeluaran;
use Illuminate\Support\Facades\Auth;

class RiwayatController extends Controller
{
    public function index()
    {
        $user_id = Auth::user()->id;
        // Ambil semua record pendapatan user, group by waktu pengisian (misal created_at)
        $riwayat = RecordPendapatan::where('user_id', $user_id)
            ->with('layanan')
            ->orderBy('created_at', 'desc')
            ->get()
            ->groupBy(function($item) {
                return $item->layanan_id . '|' . $item->created_at->format('Y-m-d H:i:s');
            });

        return view('user.riwayat', compact('riwayat'));
    }
}
