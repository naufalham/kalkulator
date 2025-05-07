<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    /**
     * Tampilkan form login.
     */
    public function showLoginForm()
    {
        return view('user.login');
    }

    /**
     * Proses login.
     */
    public function login(Request $request)
    {
        // Validasi input
        $request->validate([
            'email' => 'required|email',
            'kata_sandi' => 'required|string|min:6',
        ]);

        // Coba autentikasi
        if (Auth::attempt(['email' => $request->email, 'password' => $request->kata_sandi])) {
            // Login berhasil, redirect ke dashboard atau halaman lain
            return redirect()->intended('berita')->with('success', 'Login berhasil!');
        }

        // Login gagal, kembali ke halaman login dengan pesan error
        return back()->withErrors([
            'email' => 'Email atau kata sandi salah.',
        ])->withInput($request->only('email'));
    }

    /**
     * Proses logout.
     */
    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect('/login')->with('success', 'Logout berhasil!');
    }
}
