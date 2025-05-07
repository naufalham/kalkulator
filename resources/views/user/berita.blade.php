@vite(['resources/css/usaha.css','resources/js/app.js'])

<!-- Navbar -->
<x-navbar></x-navbar>

<!-- Main Content -->
<main class="flex-grow max-w-7xl mx-auto px-6 mt-12">
  <h2 class="font-bold text-lg text-black mb-10 select-none text-center">
    Berita
  </h2>

  <section class="space-y-8 max-w-6xl mx-auto">
    
    <!-- Berita 1 -->
    <article class="bg-white rounded-2xl p-6 flex items-start gap-6 shadow-sm">
      <img class="w-24 h-24 rounded-xl border-2 border-[#2B3277] object-cover" 
           src="https://storage.googleapis.com/a1aa/image/c659c4ba-ac6f-47cd-bdb0-1980d781f7cb.jpg" 
           alt="Gambar Berita 1">
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
      <img class="w-24 h-24 rounded-xl border-2 border-[#2B3277] object-cover" 
           src="https://storage.googleapis.com/a1aa/image/c659c4ba-ac6f-47cd-bdb0-1980d781f7cb.jpg" 
           alt="Gambar Berita 2">
      <div class="flex-1">
        <h3 class="font-bold text-base text-black mb-2 select-none">Teknologi UMKM</h3>
        <p class="text-sm text-[#4B4B4B] leading-relaxed">
          Banyak pelaku UMKM kini mulai mengadopsi teknologi digital untuk mengembangkan usahanya, mulai dari sistem kasir digital, pemasaran lewat media sosial, hingga penggunaan platform e-commerce. Langkah ini terbukti mampu meningkatkan jangkauan pasar dan penjualan secara signifikan.
        </p>
        <a href="#" class="text-[#F28C28] text-sm mt-3 inline-block">Baca selengkapnya</a>
      </div>
    </article>

    <!-- Berita 3 -->
    <article class="bg-white rounded-2xl p-6 flex items-start gap-6 shadow-sm">
      <img class="w-24 h-24 rounded-xl border-2 border-[#2B3277] object-cover" 
           src="https://storage.googleapis.com/a1aa/image/c659c4ba-ac6f-47cd-bdb0-1980d781f7cb.jpg" 
           alt="Gambar Berita 3">
      <div class="flex-1">
        <h3 class="font-bold text-base text-black mb-2 select-none">Tips Usaha</h3>
        <p class="text-sm text-[#4B4B4B] leading-relaxed">
          Menjalankan usaha kecil membutuhkan strategi yang tepat, salah satunya adalah memahami target pasar. Penting juga untuk mengatur keuangan secara disiplin dan memanfaatkan media digital untuk promosi. Jangan lupa juga untuk terus belajar dari kompetitor dan tren pasar yang sedang berkembang.
        </p>
        <a href="#" class="text-[#F28C28] text-sm mt-3 inline-block">Baca selengkapnya</a>
      </div>
    </article>

  </section>
</main>

<!-- Footer -->
<x-footer></x-footer>
