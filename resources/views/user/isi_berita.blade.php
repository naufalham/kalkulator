@vite(['resources/css/usaha.css', 'resources/js/app.js'])
<!-- Navbar -->
<x-navbar></x-navbar>

<!-- Judul Berita dengan background biru menarik -->
<div class="w-full bg-gradient-to-r from-[#2f318d] to-[#4345a5] py-10 px-6 sm:px-12 mt-10 text-white text-center">
  <div class="max-w-3xl mx-auto">
    <h1 class="text-2xl sm:text-4xl font-extrabold leading-snug">
      {{ $berita->judul }}
    </h1>
    <p class="mt-3 text-sm sm:text-base text-gray-200">
      {{ \Carbon\Carbon::parse($berita->created_at)->translatedFormat('l, d F Y') }}
    </p>

    <!-- Garis hias -->
    <div class="mt-5 w-16 h-1 bg-white mx-auto rounded-full"></div>
  </div>
</div>


<!-- Main Berita -->
<main class="flex-grow max-w-6xl mx-auto px-6 mt-8 pt-8">
    <div class="flex justify-center mb-8">
        @if($berita->foto)
            <img src="{{ asset('storage/' . $berita->foto) }}" alt="{{ $berita->judul }}" class="rounded-lg" height="160" width="400" />
        @endif
    </div>
    <div class="text-sm leading-tight text-justify">
        {!! $berita->isi !!}
    </div>

    <!-- Related news (biarkan tetap statis jika belum dinamis) -->
    <section aria-label="Related news you might also like" class="max-w-6xl">
      <h3 class="font-bold text-lg mb-6 mt-6 select-text">Anda mungkin juga suka</h3>

      <!-- Berita 1 -->
      <article class="bg-white rounded-2xl p-4 sm:p-6 flex flex-col sm:flex-row items-start gap-4 sm:gap-6 shadow-sm">
        <img src="{{ asset('asset/fesyen.jpg') }}" alt="Fesyen Image" class="rounded-lg w-full sm:w-[200px] h-auto object-cover" />
        <div class="flex-1">
          <h3 class="font-bold text-base text-black mb-2 select-none">Fesyen</h3>
          <p class="text-sm text-[#4B4B4B] leading-relaxed">
            Dunia fesyen Indonesia semakin berkembang dengan munculnya desainer muda yang mengusung gaya kontemporer namun tetap mempertahankan nilai-nilai budaya lokal. Hal ini terlihat dalam gelaran pekan mode terbaru di Jakarta yang menampilkan batik dalam balutan modern. Selain itu, tren sustainable fashion juga mulai diminati oleh kalangan muda.
          </p>
          <a href="/isi" class="text-[#F28C28] text-sm mt-3 inline-block">Baca selengkapnya</a>
        </div>
      </article>

      <!-- Berita 2 -->
      <article class="bg-white rounded-2xl p-4 sm:p-6 flex flex-col sm:flex-row items-start gap-4 sm:gap-6 shadow-sm mt-8">
        <img src="{{ asset('asset/fesyen.jpg') }}" alt="Fesyen Image" class="rounded-lg w-full sm:w-[200px] h-auto object-cover" />
        <div class="flex-1">
          <h3 class="font-bold text-base text-black mb-2 select-none">Fesyen</h3>
          <p class="text-sm text-[#4B4B4B] leading-relaxed">
            Dunia fesyen Indonesia semakin berkembang dengan munculnya desainer muda yang mengusung gaya kontemporer namun tetap mempertahankan nilai-nilai budaya lokal. Hal ini terlihat dalam gelaran pekan mode terbaru di Jakarta yang menampilkan batik dalam balutan modern. Selain itu, tren sustainable fashion juga mulai diminati oleh kalangan muda.
          </p>
          <a href="/isi" class="text-[#F28C28] text-sm mt-3 inline-block">Baca selengkapnya</a>
        </div>
      </article>
    </section>
</main>

<x-wa />

<!-- Footer -->
<div class="mt-10"></div>
<x-footer></x-footer>