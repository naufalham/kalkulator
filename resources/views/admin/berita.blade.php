<x-navmin></x-navmin>

<!-- Main content -->

    <x-sidemin></x-sidemin>
    
    <!-- News list -->
    <section class="bg-white rounded-2xl flex-grow p-4 flex flex-col space-y-4">

        <pre>{{ var_dump($beritas) }}</pre>

        @foreach ($beritas as $index => $berita)
            <div class="bg-[#F5F8FF] rounded-xl flex justify-between items-center px-6 py-3 text-black font-semibold text-sm select-none">
                <span>
                    {{ $berita->judul }}
                </span>
                <div class="flex space-x-6 text-[#F57C20] font-semibold text-sm cursor-pointer">
                    <form action="{{ route('admin.berita.destroy', $berita->id) }}" method="POST">
                            @csrf
                            @method('DELETE')
                            <button class="bg-red-600 text-white px-2 py-1 rounded">Hapus</button>
                    </form>
                    {{-- <span>
                            Edit
                    </span>
                    <span>
                            Hapus
                    </span> --}}
                </div>
            </div>
        @endforeach
    </section>
   </main>


<x-footer></x-footer>