@extends('layouts.head')

@section('content')
    <h1 class="text-xl font-semibold mb-4 text-center">
        Edit Berita
    </h1>
    
    <form action="{{ route('admin.berita.update', $berita->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <div class="mb-3">
            <label for="judul" class="form-label">Judul Berita</label>
            <input type="text" class="form-control text-sm" id="judul" name="judul" value="{{ old('judul', $berita->judul) }}" required>
        </div>
        <div class="mb-3">
            <label for="isi" class="form-label">Isi Berita</label>
            <textarea class="form-control" id="isi" name="isi" rows="6" required>{{ old('isi', $berita->isi) }}</textarea>
        </div>
        <div class="mb-3 text-sm">
            <label for="foto" class="form-label text-sm">Gambar Berita</label>
            {{-- Menampilkan pesan kesalahan jika ada --}}
            @if ($errors->any())
                <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-2 rounded mb-4">
                    <ul class="text-xs list-disc pl-5">
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
            {{-- Menampilkan gambar berita yang sudah ada --}}
            @if($berita->foto)
                <div class="mb-2">
                    <img src="{{ asset('storage/' . $berita->foto) }}" alt="Gambar Berita" width="200">
                </div>
            @endif
            <input class="form-control" type="file" id="foto" name="foto">
            <small class="text-muted">Kosongkan jika tidak ingin mengubah gambar.</small>
        </div>
        <div class="flex gap-2 justify-end mt-4">
            <a href="{{ route('admin.berita.index') }}" class="bg-gray-300 text-gray-800 rounded-xl py-2 px-6 text-sm font-semibold select-none hover:bg-gray-400 transition">
                Batal
            </a>
            <button class="bg-[#F97316] text-white rounded-xl py-2 px-6 text-sm font-semibold select-none" type="submit">
                Simpan
            </button>
        </div>
    </form>
@endsection
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/summernote@0.8.20/dist/summernote-lite.min.js"></script>
<script>
  document.addEventListener('DOMContentLoaded', function() {
    $('#isi').summernote({
      height: 200
    });
  });
</script>