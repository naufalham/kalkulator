<?php

namespace App\Http\Controllers\Auth;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class LoginController extends Controller
{
    /**
     * Tampilkan form login.
     */
    public function showLoginForm()
    {
        return view('user.login'); // Sesuaikan dengan view kamu
    }

    public function login(Request $request)
    {
        // Validasi input
        $request->validate([
            'email' => 'required|email',
            'password' => 'required|string|min:6',
        ]);

        // Cari pengguna berdasarkan email
        $user = User::where('email', $request->email)->first();

        if (!$user) {
            return back()->withErrors(['email' => 'User tidak ditemukan.'])->onlyInput('email');
        }

        // Periksa kata sandi
        if (!Auth::attempt($request->only('email', 'password'))) {
            dd ('Password salah');
            return back()->withErrors(['password' => 'Password salah.'])->onlyInput('email');
        }

        // Redirect berdasarkan role
        if ($user->role === 'admin') {
            return redirect()->route('admin.user');
        } elseif ($user->role === 'user') {
            return redirect()->route('landing_page');
        }

        // return view('user.landing_page'); // Ganti dengan halaman yang sesuai

        // Jika autentikasi gagal
        // return back()->withErrors(['email' => 'Email atau kata sandi salah.'])->onlyInput('email');
    }


    
    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect('/login');
    }
}
