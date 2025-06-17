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

    public function toggleUserStatus(User $user)
    {
        $user->aktif = !$user->aktif;
        $user->save();

        $statusMessage = $user->aktif ? 'diaktifkan' : 'dinonaktifkan';
        return redirect()->route('admin.user')->with('success', "Pengguna {$user->name} berhasil {$statusMessage}.");
    }

    public function admin_updatePassword(Request $request, User $user)
    {
        $request->validate([
            'password' => 'required|string|min:6',
        ]);

        $user->password = Hash::make($request->password);
        $user->save();

        return redirect()->route('admin.user')->with('success', "Password untuk pengguna {$user->name} berhasil diperbarui.");
    }

}