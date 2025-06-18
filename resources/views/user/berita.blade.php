@vite(['resources/css/usaha.css', 'resources/js/app.js'])

<!-- Navbar -->
<x-navbar></x-navbar>

<!-- Main Container -->
<div class="w-full px-6 sm:px-12 lg:px-20 xl:px-32 pt-3">

    <!-- Hero Section -->
    <div class="w-full bg-gradient-to-r from-[#2f318d] to-[#4a51d3] rounded-3xl py-12 px-6 flex flex-col items-center mb-10 mt-28 shadow-lg">
        <h1 class="text-white text-3xl sm:text-4xl font-extrabold text-center mb-3">Laman Berita</h1>
        <p class="text-white text-lg text-center mb-6 max-w-2xl">
            Temukan berbagai informasi, inspirasi, dan berita terbaru seputar dunia bisnis dan kewirausahaan di sini.
        </p>
        <form class="w-full max-w-xl mx-auto" method="GET" action="{{ route('user.berita') }}">
            <div class="flex items-center bg-white rounded-full px-6 py-3 shadow-md focus-within:ring-2 focus-within:ring-[#2f318d]">
                <input 
                    type="text" 
                    name="q"
                    value="{{ request('q') }}"
                    placeholder="Cari berita di sini..." 
                    class="flex-1 border-none outline-none bg-transparent text-gray-700 text-base font-medium placeholder-gray-400"
                />
                <svg class="w-5 h-5 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" 
                          d="M21 21l-4.35-4.35m0 0A7.5 7.5 0 1010.5 18.5a7.5 7.5 0 006.15-3.85z" />
                </svg>
            </div>
        </form>
    </div>

    <!-- Berita Terbaru -->
    <section>
        <h2 class="text-2xl font-bold text-gray-900 mb-2">Berita Terbaru</h2>
        <hr class="border-gray-300 mb-6" />

        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 gap-6" id="berita-list">
            @if($beritas->isEmpty())
                <div class="col-span-full text-center text-gray-500 py-12">
                    Tidak ada berita ditemukan.
                </div>
            @endif

            @foreach($beritas as $berita)
            <a href="{{ route('user.berita.show', $berita->slug) }}" class="berita-item block bg-white rounded-2xl shadow-md hover:shadow-xl hover:ring-2 hover:ring-[#2f318d]/30 transition-all duration-300 overflow-hidden min-h-[420px] hover:scale-[1.01]">
                <div class="w-full h-48 overflow-hidden">
                    <img 
                        src="{{ $berita->foto ? asset('storage/' . $berita->foto) : 'https://via.placeholder.com/400x200?text=No+Image' }}" 
                        alt="{{ $berita->judul }}"
                        class="w-full h-full object-cover transition-transform duration-300"
                    />
                </div>
                <div class="p-4 flex flex-col justify-between h-full">
                    <div>
                        <div class="flex items-center text-xs text-gray-500 mb-1">
                            <svg class="w-4 h-4 mr-1 text-gray-400" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M8 7V3m8 4V3m-9 4h10a2 2 0 012 2v10a2 2 0 01-2 2H7a2 2 0 01-2-2V9a2 2 0 012-2z" />
                            </svg>
                            {{ \Carbon\Carbon::parse($berita->created_at)->translatedFormat('l, d F Y') }}
                        </div>
                        <h3 class="text-base font-semibold text-gray-800 leading-tight mb-1">
                            {{ $berita->judul }}
                        </h3>
                        <p class="text-sm text-gray-600 leading-relaxed">
                            {{ Str::limit(strip_tags($berita->isi), 80) }}
                        </p>
                    </div>
                </div>
            </a>
            @endforeach
        </div>

        @if($beritas->count() > 8)
            <div class="flex justify-center mt-10">
                <button id="loadMoreBtn"
                    class="bg-[#2f318d] text-white px-6 py-3 rounded-full font-semibold shadow-md hover:bg-[#23246f] hover:scale-105 transition-all duration-200">
                    Muat Lebih Banyak
                </button>
            </div>
        @endif

        <script>
            document.addEventListener('DOMContentLoaded', function () {
                const beritaItems = document.querySelectorAll('.berita-item');
                const loadMoreBtn = document.getElementById('loadMoreBtn');
                let visible = 8;

                function updateVisibility() {
                    beritaItems.forEach((item, idx) => {
                        item.style.display = idx < visible ? '' : 'none';
                    });
                    if (visible >= beritaItems.length && loadMoreBtn) {
                        loadMoreBtn.style.display = 'none';
                    }
                }

                updateVisibility();

                if (loadMoreBtn) {
                    loadMoreBtn.addEventListener('click', function () {
                        visible += 8;
                        updateVisibility();
                    });
                }
            });
        </script>
    </section>
</div>

<!-- WhatsApp & Footer -->
<x-wa />
<div class="mt-14"></div>
<x-footer />
