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

<x-navmin></x-navmin>

<body class="bg-white text-gray-900 pt-16 min-h-screen flex flex-col">
    <main class="flex flex-1 sm:flex-row min-h-0">
        <aside class="h-full">
            <x-sidemin />
        </aside>

        <section class="flex-1 flex flex-col p-4 sm:p-6">
            <h1 class="text-xl font-semibold mb-4">Daftar Berita</h1>

            <!-- Form Cari dan Tambah -->
            <div class="flex justify-between items-center mb-10 flex-wrap gap-4">
                <form method="GET" action="{{ route('admin.berita.index') }}"
                      class="bg-white rounded-lg px-4 py-3 max-w-md w-full flex items-center gap-2 shadow">
                    <i class="fas fa-search text-black text-sm"></i>
                    <input type="text" name="q" value="{{ request('q') }}"
                           placeholder="Cari Berita"
                           class="bg-transparent text-sm outline-none w-full"/>
                </form>
                <a href="{{ route('admin.berita.create') }}"
                   class="bg-[#F97316] text-white px-4 py-2 rounded-lg text-sm font-semibold hover:bg-[#d96c13] transition">
                    Tambah Berita
                </a>
            </div>

            <!-- Tabel Berita -->
            <div class="rounded-lg shadow bg-white overflow-x-auto">
                <table class="w-full border-collapse border border-gray-200 text-sm table-auto">
                    <thead>
                        <tr class="bg-[#f5f8ff] border-b border-gray-200">
                            <th class="px-3 py-2 text-left font-semibold">No</th>
                            <th class="px-3 py-2 text-left font-semibold">Gambar</th>
                            <th class="px-3 py-2 text-left font-semibold">Judul</th>
                            <th class="px-3 py-2 text-left font-semibold">Isi</th>
                            <th class="px-3 py-2 text-left font-semibold">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($beritas as $index => $berita)
                            <tr class="border-t hover:bg-gray-50">
                                <td class="px-3 py-2">{{ $beritas->firstItem() + $index }}</td>

                                <td class="px-3 py-2">
                                    @if($berita->foto)
                                        <img src="{{ asset('storage/' . $berita->foto) }}"
                                            alt="{{ $berita->judul }}"
                                            class="w-14 h-14 object-cover rounded-lg"/>
                                    @endif
                                </td>
                                <td class="px-3 py-2 truncate max-w-[150px]">{{ $berita->judul }}</td>
                                <td class="px-3 py-2">
                                    <div class="line-clamp-3 max-w-[300px] text-ellipsis overflow-hidden">
                                        {{ Str::words(strip_tags($berita->isi), 20, '...') }}
                                    </div>
                                </td>
                                <td class="px-3 py-2">
                                    <div class="flex items-center gap-2 flex-wrap">
                                        <form action="{{ route('admin.berita.edit', $berita->id) }}" method="GET">
                                            <button type="submit"
                                                    class="bg-yellow-400 text-black font-semibold text-sm px-3 py-1 rounded hover:bg-yellow-500">
                                                Edit
                                            </button>
                                        </form>
                                        <form action="{{ route('admin.berita.destroy', $berita->id) }}" method="POST">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit"
                                                    onclick="return confirm('Yakin ingin menghapus?')"
                                                    class="bg-red-600 text-white font-semibold text-sm px-3 py-1 rounded hover:bg-red-700">
                                                Hapus
                                            </button>
                                        </form>
                                    </div>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="5" class="text-center py-4 text-gray-500">
                                    Berita tidak ditemukan.
                                </td>
                            </tr>
                        @endforelse 
                    </tbody>
                </table>
            </div>

            <!-- Pagination -->
            <div class="mt-4">
                {{ $beritas->links('pagination::tailwind') }}
            </div>
        </section>
    </main>
</body>
