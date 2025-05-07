@vite(['resources/css/usaha.css', 'resources/js/app.js'])

<!-- Navbar -->
<x-navbar></x-navbar>

<!-- Main Berita -->
<main class="flex-grow max-w-6xl mx-auto px-6 mt-12">
  <h2 class="font-bold text-lg text-black mb-10 select-none text-center">
    Berita
  </h2>
    <div class="flex justify-center mb-8">
      <img alt="Fashion image" class="rounded-lg" height="160" src="https://storage.googleapis.com/a1aa/image/e84a876a-b123-4fa8-e1e4-13f7a6cc9fb8.jpg" width="400"/>
    </div>
    <p class="text-sm leading-tight">
      Jakarta, 5 Mei 2025 – Rumah mode ternama Dior kembali mencuri perhatian
      dalam peragaan busana Paris Fashion Week dengan koleksi musim panas 2025
      yang menggabungkan nuansa tropis dan sentuhan futuristik. Direktur Kreatif
      Maria Grazia Chiuri mempersembahkan deretan busana berwarna cerah seperti
      coral, lime green, dan biru laut, lengkap dengan siluet longgar dan bahan
      ringan seperti linen dan sutra. Koleksi ini juga menampilkan aksesori
      inovatif seperti kacamata augmented reality dan tas tangan transparan
      yang dirancang menggunakan bahan daur ulang. “Kami ingin merayakan
      keindahan alam sambil tetap mengedepankan teknologi dan keberlanjutan,”
      ujar Chiuri dalam konferensi pers usai pertunjukan. Para kritikus mode
      memuji koleksi ini sebagai salah satu yang paling segar dan relevan dengan
      isu lingkungan saat ini. Beberapa selebriti papan atas seperti Zendaya
      dan BLACKPINK Jisoo terlihat duduk di barisan depan mengenakan busana dari
      koleksi Dior sebelumnya.
    </p>
    <br>
  </section>

  <!-- Related news -->
  <section aria-label="Related news you might also like" class="px-4">
    <h3 class="font-bold text-lg mb-6 select-text">Anda mungkin juga suka</h3>

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

    <br>
    <!-- Berita 2 -->
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
  </section>
</main>

<!-- Footer -->
<x-footer></x-footer>
