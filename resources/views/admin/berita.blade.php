<x-navmin></x-navmin>

<!-- Main content -->

    <x-sidemin></x-sidemin>
    
    <!-- News list -->
    <section class="bg-white rounded-2xl flex-grow p-4 flex flex-col space-y-4">

        {{-- <pre>{{ var_dump($beritas) }}</pre> --}}

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


<x-footer></x-footer>