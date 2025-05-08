<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Laravel\Socialite\Facades\Socialite;
use App\Models\User;

class GoogleController extends Controller
{
    /**
     * Redirect ke Google untuk autentikasi.
     */
    public function redirectToGoogle()
    {
        return Socialite::driver('google')->redirect();
    }

    /**
     * Tangani callback dari Google.
     */
    public function handleGoogleCallback()
    {
        try {
            $googleUser = Socialite::driver('google')->user();

            // Cari pengguna berdasarkan email
            $user = User::where('email', $googleUser->getEmail())->first();

            if (!$user) {
                // Jika pengguna tidak ditemukan, buat pengguna baru
                $user = User::create([
                    'nama' => $googleUser->getName(),
                    'email' => $googleUser->getEmail(),
                    'kata_sandi' => bcrypt('defaultpassword'), // Anda bisa mengganti ini
                    'role' => 1, // Default role = User
                ]);
            }

            // Login pengguna
            Auth::login($user);

            return redirect('/')->with('success', 'Login berhasil!');
        } catch (\Exception $e) {
            return redirect('/login')->withErrors(['error' => 'Terjadi kesalahan saat login menggunakan Google.']);
        }
    }
}
