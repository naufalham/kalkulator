<html lang="en">
<head>
    <meta charset="utf-8"/>
    <meta content="width=device-width, initial-scale=1" name="viewport"/>
    <title>AKUNaZma</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" rel="stylesheet"/>
    <style>
        body {
            font-family: 'Poppins', sans-serif;
        }
    </style>
</head>
<!-- Navbar -->
<x-navmin></x-navmin>
<body class="bg-white text-gray-900 pt-16 min-h-screen flex flex-col">
    <!-- Main Layout -->
    <main class="flex flex-1 sm:flex-row min-h-0">
        <!-- Sidebar -->
        <aside class="h-full">
            <x-sidemin />
        </aside>
        <!-- Page Content -->
        <section class="flex-1 flex flex-col p-4 sm:p-6 overflow-x-auto">
            <h1 class="text-xl font-semibold mb-4">Daftar Berita</h1>
            <div class="flex justify-between items-center mb-10 flex-wrap gap-4">
                <form method="GET" action="{{ route('admin.berita.index') }}"
                    class="bg-white rounded-lg px-4 py-3 max-w-md w-full flex items-center gap-2 shadow">
                    <i class="fas fa-search text-black text-bs"></i>
                    <input type="text" name="q" value="{{ request('q') }}"
                        placeholder="Cari Berita"
                        class="bg-transparent text-sm outline-none w-full"
                    />
                </form>

            
                <a href="{{ route('admin.berita.create') }}" class="bg-[#F97316] text-white px-4 py-2 rounded-lg text-sm font-semibold hover:bg-[#d96c13] transition">
                    Tambah Berita
                </a>
            </div>

            <div class="overflow-x-auto bg-white rounded-lg shadow">
                <table class="w-full border-collapse border border-gray-200 text-sm min-w-[600px]">
                    {{-- <div class="mt-4 bg-white border border-gray-200 rounded-lg p-3 shadow-sm">
                        {{ $beritas->links('pagination::tailwind') }}
                    </div> --}}

                    <thead>
                        <tr class="bg-[#f5f8ff] border-b border-gray-200">
                            <th class="border px-3 py-2 text-left font-semibold">No</th>
                            <th class="border px-3 py-2 text-left font-semibold">Gambar Berita</th>
                            <th class="border px-3 py-2 text-left font-semibold">Judul Berita</th>
                            <th class="border px-3 py-2 text-left font-semibold">Isi Berita</th>
                            <th class="border px-3 py-2 text-left font-semibold">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($beritas as $index => $berita)
                            <tr class="border-t hover:bg-gray-50">
                                <td class="border px-3 py-2">{{ $index + 1 }}</td>
                                <td class="border px-3 py-2">
                                    @if($berita->foto)
                                        <img src="{{ asset('storage/' . $berita->foto) }}" alt="{{ $berita->judul }}" class="w-14 h-14 object-cover rounded-lg" />
                                    @endif
                                </td>
                                <td class="border px-3 py-2">{{ $berita->judul }}</td>
                                <td class="border px-3 py-2">{{ Str::words(strip_tags($berita->isi), 20, '...') }}</td>
                                <td class="border px-3 py-2">
                                    <a href="{{ route('admin.berita.edit', $berita->id) }}" class="bg-yellow-400 text-black font-semibold text-sm px-2 py-1 rounded hover:bg-yellow-500 mr-3">
                                        Edit
                                    </a>
                                    <form action="{{ route('admin.berita.destroy', $berita->id) }}" method="POST" style="display:inline;">
                                        @csrf
                                        @method('DELETE')
                                        <button class="bg-red-600 text-white text-sm font-semibold px-2 py-1 rounded hover:bg-red-700" onclick="return confirm('Yakin ingin menghapus?')">Hapus</button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </section>
    </main>
</body>
</html>