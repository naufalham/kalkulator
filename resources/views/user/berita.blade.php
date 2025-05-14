@vite(['resources/css/usaha.css','resources/js/app.js'])

<!-- Navbar -->
<x-navbar></x-navbar>

<!-- Main Content -->
<main class="flex-grow max-w-6xl mx-auto px-6 mt-12">
  <section class="space-y-8 max-w-6xl mx-auto">
    
    <!-- Berita 1 -->
    <article class="bg-white rounded-2xl p-6 flex items-start gap-6 shadow-sm">
    <img src="{{ asset('asset/fesyen.jpg') }}" alt="Fesyen Image" class="rounded-lg" width="200" />
      <div class="flex-1">
        <h3 class="font-bold text-base text-black mb-2 select-none">Fesyen</h3>
        <p class="text-sm text-[#4B4B4B] leading-relaxed">
          Dunia fesyen Indonesia semakin berkembang dengan munculnya desainer muda yang mengusung gaya kontemporer namun tetap mempertahankan nilai-nilai budaya lokal. Hal ini terlihat dalam gelaran pekan mode terbaru di Jakarta yang menampilkan batik dalam balutan modern. Selain itu, tren sustainable fashion juga mulai diminati oleh kalangan muda.
        </p>
        <a href="/isi" class="text-[#F28C28] text-sm mt-3 inline-block">Baca selengkapnya</a>
      </div>
    </article>

    <!-- Berita 2 -->
    <article class="bg-white rounded-2xl p-6 flex items-start gap-6 shadow-sm">
    <img src="{{ asset('asset/fesyen.jpg') }}" alt="Fesyen Image" class="rounded-lg" width="200" />
      <div class="flex-1">
        <h3 class="font-bold text-base text-black mb-2 select-none">Fesyen</h3>
        <p class="text-sm text-[#4B4B4B] leading-relaxed">
          Dunia fesyen Indonesia semakin berkembang dengan munculnya desainer muda yang mengusung gaya kontemporer namun tetap mempertahankan nilai-nilai budaya lokal. Hal ini terlihat dalam gelaran pekan mode terbaru di Jakarta yang menampilkan batik dalam balutan modern. Selain itu, tren sustainable fashion juga mulai diminati oleh kalangan muda.
        </p>
        <a href="/isi" class="text-[#F28C28] text-sm mt-3 inline-block">Baca selengkapnya</a>
      </div>
    </article>

    <!-- Berita 3 -->
    <article class="bg-white rounded-2xl p-6 flex items-start gap-6 shadow-sm">
    <img src="{{ asset('asset/fesyen.jpg') }}" alt="Fesyen Image" class="rounded-lg" width="200" />
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

<!-- Footer -->
<x-footer></x-footer>
