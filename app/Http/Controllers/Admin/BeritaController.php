<?php

namespace App\Http\Controllers\Admin;

use App\Models\Berita;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;

class BeritaController extends Controller
{
    public function index(Request $request)
    {
        $query = Berita::query();

        if ($request->filled('q')) {
            $q = $request->q;
            $query->where('judul', 'like', "%$q%")
                ->orWhere('isi', 'like', "%$q%");
        }

        $beritas = $query->latest()->paginate(10)->withQueryString();

        return view('admin.berita', compact('beritas'));
    }


    public function user_index()
    {
        $beritas = Berita::latest()->get();
        return view('user.berita', compact('beritas'));
    }

    public function cari(Request $request)
    {
        $query = Berita::query();

        if ($request->filled('q')) {
            $q = $request->q;
            $query->where('judul', 'like', "%$q%")
                ->orWhere('isi', 'like', "%$q%");
        }

        $beritas = $query->latest()->get();

        return view('user.berita', compact('beritas'));
    }

    public function show($slug)
    {
        $berita = Berita::where('slug', $slug)->firstOrFail();
        $rekomendasi = $berita->rekomendasi();

        return view('user.isi_berita', compact('berita', 'rekomendasi'));
    }

    /**
     * Tampilkan form untuk membuat berita baru.
     */
    public function create()
    {
        return view('admin.tambah_berita');
    }

    public function store(Request $request)
    {
        $request->validate([
            'judul' => 'required|string|max:255',
            'isi' => 'required',
            'foto' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        $berita = new Berita();
        $berita->judul = $request->judul;
        $berita->isi = $request->isi;

        if ($request->hasFile('foto')) {
            // Simpan ke storage/app/public/foto
            $path = $request->file('foto')->store('foto', 'public');
            $berita->foto = $path;
        } 

        $berita->save();

        return redirect()->route('admin.berita.index')->with('success', 'Berita berhasil ditambahkan!');
    }

    /**
     * Hapus berita dari database.
     */
    public function destroy($id)
    {
        $berita = Berita::findOrFail($id);
        $berita->delete();

        return redirect()->route('admin.berita.index')->with('success', 'Berita berhasil dihapus!');
    }

    public function edit($id)
    {
        $berita = Berita::findOrFail($id);
        return view('admin.edit_berita', compact('berita'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'judul' => 'required|string|max:255',
            'isi' => 'required',
            'foto' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        $berita = Berita::findOrFail($id);
        $berita->judul = $request->judul;
        $berita->isi = $request->isi;

        if ($request->hasFile('foto')) {
            // Hapus foto lama jika ada
            if ($berita->foto && Storage::disk('public')->exists($berita->foto)) {
                Storage::disk('public')->delete($berita->foto);
            }
            // Simpan foto baru
            $path = $request->file('foto')->store('foto', 'public');
            $berita->foto = $path;
        }

        $berita->save();

        return redirect()->route('admin.berita.index')->with('success', 'Berita berhasil diupdate!');
    }
}
