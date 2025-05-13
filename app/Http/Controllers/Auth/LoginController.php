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
        return view('user.login'); // Sesuaikan dengan view kamu
    }

    public function login(Request $request)
    {
        $user = \App\Models\User::where('email', $request->email)->first();
        
        if (!$user) {
            dd('User tidak ditemukan');
        }

        if (!\Illuminate\Support\Facades\Hash::check($request->kata_sandi, $user->kata_sandi)) {
            dd('Password salah');
        }

        $credentials = $request->only('email', 'kata_sandi');
        if (Auth::attempt(['email' => $credentials['email'], 'password' => $credentials['kata_sandi']])) {
            $request->session()->regenerate();

            $user = Auth::user();
            if ($user->role === 'admin') {
                return redirect()->route('admin.user');
            } else {
                return redirect()->route('user.landing_page');
            }
        }

        return back()->withErrors([
            'email' => 'Email atau kata sandi salah.',
        ])->onlyInput('email');
    }


    
    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect('/login');
    }
}
