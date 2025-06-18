<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Models\User;
use Illuminate\Support\Facades\Validator;

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
            'name' => 'nullable|string|max:255',
            'email' => 'nullable|email|unique:users,email,' . Auth::id(),
            'password' => 'nullable|string|min:6|confirmed',
        ]);

        $user = User::find(Auth::id());
        // $user = Auth::user();

        if ($request->filled('name')) {
            $user->name = $request->name;
        }

        if ($request->filled('email')) {
            $user->email = $request->email;
        }

        if ($request->filled('password')) {
            $user->password = bcrypt($request->password); // atau Hash::make
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


    public function admin_tampil(Request $request)
    {
        $query = User::where('role', '!=', 'admin'); // Filter agar admin tidak muncul

        if ($request->filled('search')) { // Sesuaikan dengan nama input di form pencarian
            $search = $request->search;
            $query->where(function($sub) use ($search) {
                $sub->where('name', 'like', "%{$search}%")
                    ->orWhere('email', 'like', "%{$search}%")
                    ->orWhere('role', 'like', "%{$search}%");
            });
        }

        $users = $query->paginate(10); // Tambahkan paginasi
        return view('admin.user', compact('users')); // Pastikan viewnya adalah admin.user
    }

    public function toggleUserStatus(\App\Models\User $user)
    {
        $user->aktif = !$user->aktif;
        $user->save();

        $statusMessage = $user->aktif ? 'diaktifkan' : 'dinonaktifkan';
        return redirect()->route('admin.user')->with('success', "Pengguna {$user->name} berhasil {$statusMessage}.");
    }
    
    public function resetPassword(User $user)
    {
        // Password default
        $defaultPassword = 'password';

        // Update password pengguna
        $user->password = Hash::make($defaultPassword);
        $user->save();

        return redirect()->route('admin.user')
                         ->with('success', 'Password untuk pengguna ' . $user->name . ' berhasil direset menjadi default.');
    }

    public function updateAdminProfile(Request $request)
    {
        $admin = Auth::user();

        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email,' . $admin->id,
            'password' => 'nullable|string|min:6|confirmed',
        ]);

        if ($validator->fails()) {
            return redirect()->back()
                        ->withErrors($validator, 'adminProfileUpdate')
                        ->withInput();
        }

        $admin->name = $request->name;
        $admin->email = $request->email;

        if ($request->filled('password')) {
            $admin->password = Hash::make($request->password);
        }

        $admin->save();

        // Redirect kembali ke halaman sebelumnya (tempat modal dibuka) atau ke dashboard admin
        // Jika redirect()->back() tidak bekerja sesuai harapan karena modal,
        // Anda bisa redirect ke route admin yang spesifik.
        return redirect()->back()->with('success', 'Profil Anda berhasil diperbarui!');
    }

}