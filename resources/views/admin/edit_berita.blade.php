<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>AKUNaZma</title>
     <script src="https://cdn.tailwindcss.com">
    </script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" rel="stylesheet"/>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;600;700&amp;display=swap" rel="stylesheet"/>
    
    <!-- Tambahkan di dalam <head> -->
    <link href="https://cdn.jsdelivr.net/npm/summernote@0.8.20/dist/summernote-lite.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            font-family: 'Poppins', sans-serif;
        }
    </style>
</head>

    
    <!-- Navbar -->
    <x-navmin></x-navmin>
    <body class="bg-white text-gray-900 pt-16 min-h-screen flex flex-col text-sm">
        <!-- Main Layout -->
        <main class="flex flex-1 sm:flex-row min-h-0">
            <!-- Sidebar -->
            <aside class="h-full">
                <x-sidemin />
            </aside>
        <!-- Form -->
         <section class="bg-white flex-grow p-4 flex flex-col space-y-4">
            <h1 class="text-xl font-semibold mb-4 text-center">Edit Berita</h1>
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
                    <p class="text-xs text-gray-500 mt-1">* Nama file gambar harus sama dengan judul berita.</p>
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
        </section>
    </body>

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/summernote@0.8.20/dist/summernote-lite.min.js"></script>
<script>
  document.addEventListener('DOMContentLoaded', function() {
    $('#isi').summernote({
      height: 200
    });
  });
</script>