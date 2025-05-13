<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class UserController extends Controller
{
    /**
     * Tampilkan form profil.
     */
    public function edit()
    {
        return view('user.profil');
    }

    /**
     * Perbarui profil pengguna.
     */
    public function update(Request $request)
    {
        $request->validate([
            'nama' => 'nullable|string|max:255',
            'email' => 'nullable|email|unique:users,email,' . Auth::id(),
            'password' => 'nullable|string|min:6|confirmed',
        ]);

        $user = User::find(Auth::id());
        // $user = Auth::user();

        if ($request->filled('nama')) {
            $user->nama = $request->nama;
        }

        if ($request->filled('email')) {
            $user->email = $request->email;
        }

        if ($request->filled('password')) {
            $user->kata_sandi = bcrypt($request->password); // atau Hash::make
        }

        $user->save();

        return redirect()->route('user.edit')->with('success', 'Profil berhasil diperbarui!');
    }

    /**
     * Tampilkan data pengguna.
     */
    public function show()
    {
        $user = Auth::user();
        return view('user.show', compact('user'));
    }


    public function tampil()
    {
        $users = User::all();
        return view('admin.user', compact('users'));
    }

}