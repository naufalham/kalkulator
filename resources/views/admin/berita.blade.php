<html lang="en">
 <head>
  <meta charset="utf-8"/>
  <meta content="width=device-width, initial-scale=1" name="viewport"/>
  <title>
   AKUNaZma
  </title>
  <script src="https://cdn.tailwindcss.com">
  </script>
  <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" rel="stylesheet"/>
  <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;600;700&amp;display=swap" rel="stylesheet"/>
  <style>
   body {
      font-family: 'Inter', sans-serif;
    }
  </style>
 </head>

<x-navmin></x-navmin>

<!-- Main content -->
<body class="bg-[#f5f8ff] text-gray-900 pt-16">

    <main class="flex flex-col sm:flex-row min-h-[calc(100vh-56px)]">
    <x-sidemin></x-sidemin>
    
    <!-- News list -->
    <section class="flex-1 p-4 sm:p-6 overflow-x-auto">

        <h1 class="font-semibold text-gray-900 text-base mb-4">
            Berita
        </h1>

        <div class="flex justify-end mb-4">
            <a href="{{ route('admin.berita.create') }}" class="bg-[#F87F1A] text-white px-4 py-2 rounded-lg text-sm font-semibold hover:bg-[#d96c13] transition">
                + Tambah Berita
            </a>
        </div>

        <div class="overflow-x-auto bg-white rounded-lg shadow">

        <!-- filepath: d:\APK\xampp\htdocs\kalkulator\resources\views\admin\berita.blade.php -->
        @foreach ($beritas as $index => $berita)
            <div class="bg-[#F5F8FF] rounded-xl flex justify-between items-center px-6 py-3 text-black font-semibold text-sm select-none">
                <span>
                    {{ $berita->judul }}
                </span>
                <div class="flex space-x-6 text-[#F57C20] font-semibold text-sm cursor-pointer">
                    <a href="{{ route('admin.berita.edit', $berita->id) }}" class="bg-yellow-400 text-black px-2 py-1 rounded hover:bg-yellow-500">
                        Edit
                    </a>
                    <form action="{{ route('admin.berita.destroy', $berita->id) }}" method="POST" style="display:inline;">
                        @csrf
                        @method('DELETE')
                        <button class="bg-red-600 text-white px-2 py-1 rounded" onclick="return confirm('Yakin ingin menghapus?')">Hapus</button>
                    </form>
                </div>
            </div>
        @endforeach
    </section>
   </main>

</body>

<x-footer></x-footer>