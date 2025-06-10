<html lang="en">
<head>
    <meta charset="utf-8"/>
    <meta content="width=device-width, initial-scale=1" name="viewport"/>
    <title>AKUNaZma</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" rel="stylesheet"/>
    <!-- Tambahkan di <head> -->
        <link href="https://cdn.jsdelivr.net/npm/summernote@0.8.20/dist/summernote-lite.min.css" rel="stylesheet">
    <style>
        body {
            font-family: 'Poppins', sans-serif;
        }
    </style>
</head>

<body class="bg-[#f5f8ff] text-gray-900 pt-16 text-sm">
    
    <!-- Navbar -->
    <x-navmin></x-navmin>
    <body class="bg-white text-gray-900 pt-16 min-h-screen flex flex-col">
        <!-- Main Layout -->
        <main class="flex flex-1 sm:flex-row min-h-0">
            <!-- Sidebar -->
            <aside class="h-full">
                <x-sidemin />
            </aside>
        <!-- Form -->
        <section class="bg-white flex-grow p-4 flex flex-col space-y-4">
            <h1 class="text-xl font-semibold mb-4 text-center">Tambah Berita</h1>
            <form class="flex flex-col gap-6" method="POST" action="{{ route('admin.berita.store') }}" enctype="multipart/form-data">
                @csrf
                <div class="flex flex-col gap-1">
                    <label class="text-black text-sm font-normal select-none" for="judul">
                        Judul Berita
                    </label>
                    <input class="border border-gray-400 rounded-lg py-2 px-4 text-black text-sm focus:outline-none focus:ring-2 focus:ring-[#F87F1A]" id="judul" type="text" name="judul" value="{{ old('judul') }}" required />
                </div>
                <div class="flex flex-col gap-1">
                    <label class="text-black text-sm font-normal select-none" for="gambar">
                        Gambar Berita
                    </label>
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
                    <input class="border border-gray-400 rounded-lg py-2 px-4 text-black text-sm focus:outline-none focus:ring-2 focus:ring-[#F87F1A]" id="foto" type="file" name="foto" required />
                </div>
                <div class="flex flex-col gap-1">
                    <label class="text-black text-sm font-normal select-none" for="isi">
                        Isi Berita
                    </label>
                    <textarea class="border border-gray-400 rounded-lg py-2 px-4 text-black text-sm resize-none focus:outline-none focus:ring-2 focus:ring-[#F87F1A]" id="isi" rows="8" name="isi" required>{{ old('isi') }}</textarea>
                </div>
                <div class="flex gap-2 justify-end mt-4">
                    <a href="{{ route('admin.berita.index') }}" class="bg-gray-300 text-gray-800 rounded-xl py-2 px-6 text-sm font-semibold select-none hover:bg-gray-400 transition">
                        Batal
                    </a>
                    <button class="bg-[#F97316] text-white rounded-xl py-2 px-6 text-sm font-semibold select-none" type="submit">
                        Kirim
                    </button>
                </div>
            </form>
        </section>
    </main>
</body>

{{-- <script src="https://cdn.ckeditor.com/ckeditor5/39.0.1/classic/ckeditor.js"></script>
<script>
    ClassicEditor
        .create(document.querySelector('#isi'))
        .catch(error => {
            console.error(error);
        });
</script> --}}

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/summernote@0.8.20/dist/summernote-lite.min.js"></script>
<script>
  document.addEventListener('DOMContentLoaded', function() {
    $('#isi').summernote({
      height: 200
    });
  });
</script>


</main>