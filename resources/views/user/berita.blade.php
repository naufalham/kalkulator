@vite(['resources/css/usaha.css', 'resources/js/app.js'])

<!-- Navbar -->
<x-navbar></x-navbar>

<!-- Kontainer utama dengan padding sama seperti halaman profil -->
<div class="w-full px-8 sm:px-12 lg:px-16 xl:px-24 pt-3">

    <!-- Hero Section -->
    <div class="w-full bg-[#2f318d] rounded-2xl py-10 px-4 flex flex-col items-center mb-8 mt-28">
        <h1 class="text-white sm:text-2xl font-extrabold text-center mb-2">Laman Berita</h1>
        <p class="text-white text-base text-center mb-4">
            Temukan berbagai informasi, inspirasi, dan berita terbaru seputar dunia bisnis dan kewirausahaan di sini.
        </p>
        <form class="w-full max-w-2xl mx-auto">
            <div class="flex items-center bg-white rounded-full px-6 py-3 shadow-md">
                <svg class="w-5 h-5 text-gray-400 mr-2" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                    <circle cx="11" cy="11" r="8" />
                    <line x1="21" y1="21" x2="16.65" y2="16.65" />
                </svg>
                <input 
                    type="text" 
                    placeholder="Cari" 
                    class="flex-1 border-none outline-none bg-transparent text-gray-700 text-base font-semibold"
                />
            </div>
        </form>
    </div>

    <!-- Artikel Terbaru -->
    <div>
        <h2 class="text-xl font-extrabold text-gray-900 mb-1">Berita Terbaru</h2>
        <div class="border-t border-gray-400 mb-5"></div>

        <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-4 gap-x-4 gap-y-4 mt-30 mb-30">
            @foreach($beritas as $berita)
            <div class="bg-white rounded-2xl shadow-md hover:shadow-lg transition-shadow duration-300 px-4 pt-4 pb-5 flex flex-col h-full">
                <a href="{{ route('user.berita.show', $berita->id) }}" class="group">
                    <div class="relative rounded-xl overflow-hidden mb-3">
                        <img 
                            src="{{ $berita->foto ? asset('storage/' . $berita->foto) : 'https://via.placeholder.com/400x200?text=No+Image' }}" 
                            alt="{{ $berita->judul }}"
                            class="w-full h-44 object-cover rounded-xl transition-transform duration-300 group-hover:scale-105"
                        />
                    </div>
                </a>
                <div class="flex items-center text-xs text-gray-500 mb-1">
                    <svg class="w-4 h-4 mr-1 text-gray-400" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M8 7V3m8 4V3m-9 4h10a2 2 0 012 2v10a2 2 0 01-2 2H7a2 2 0 01-2-2V9a2 2 0 012-2z" />
                    </svg>
                    {{ \Carbon\Carbon::parse($berita->created_at)->translatedFormat('l, d F Y') }}
                </div>
                <h3 class="font-bold text-gray-900 text-base leading-snug mb-1 group-hover:text-[#2f318d] transition-colors duration-200">
                    <a href="{{ route('user.berita.show', $berita->id) }}" class="hover:underline">
                        {{ $berita->judul }}
                    </a>
                </h3>
                <p class="text-sm text-gray-600 font-medium leading-relaxed">
                    {{ Str::limit(strip_tags($berita->isi), 80) }}
                </p>
            </div>
            @endforeach
        </div>
    </div>
</div>

<!-- Footer -->
<div class="mt-10"></div>
<x-footer></x-footer>
