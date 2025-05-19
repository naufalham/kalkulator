@vite(['resources/css/profil.css','resources/js/app.js'])
<!--Navbar -->
<x-navbar></x-navbar>

  <!-- Main content -->
  <main class="w-full px-8 sm:px-12 lg:px-16 xl:px-24 flex flex-col md:flex-row gap-6 mb-20 flex-grow">

   <!-- Sidebar -->
    <x-sidebar></x-sidebar>

   <!-- Right content -->
   <section class="bg-white rounded-xl p-6 sm:p-8 w-full max-w-4xl flex flex-col gap-6">
    <!-- Contoh artikel, ulangi sesuai kebutuhan -->
      <article class="content-card">
        <div>
          <h3 class="content-title">Hasil Analisis Kelayakan Usaha Fesyen</h3>
          <p class="content-date">5 April 2004</p>
        </div>
        <a class="content-link" href="#">Lihat</a>
      </article>

      <article class="content-card">
        <div>
          <h3 class="content-title">Hasil Analisis Kelayakan Usaha Kuliner</h3>
          <p class="content-date">5 April 2004</p>
        </div>
        <a class="content-link" href="#">Lihat</a>
      </article>

      <article class="content-card">
        <div>
          <h3 class="content-title">Hasil Analisis Kelayakan Usaha Jasa</h3>
          <p class="content-date">5 April 2004</p>
        </div>
        <a class="content-link" href="#">Lihat</a>
      </article>

      <article class="content-card">
        <div>
          <h3 class="content-title">Hasil Analisis Kelayakan Usaha Kerajinan</h3>
          <p class="content-date">5 April 2004</p>
        </div>
        <a class="content-link" href="#">Lihat</a>
      </article>
   </section>
  </main>
 
  <!-- Footer -->
  <x-footer></x-footer>