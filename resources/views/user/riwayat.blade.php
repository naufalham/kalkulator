@vite(['resources/css/profil.css','resources/js/app.js'])
<!--Navbar -->
<x-navbar></x-navbar>

<!-- Main content -->
<main class="w-full px-8 sm:px-12 lg:px-16 xl:px-24 flex flex-col md:flex-row gap-6 flex-grow pt-20">
  <!-- Sidebar -->
  <x-sidebar></x-sidebar>

    <!-- Right content -->
    <section class="bg-white rounded-2xl flex-grow p-6 flex flex-col space-y-6 overflow-x-auto">
      <!-- Contoh artikel, ulangi sesuai kebutuhan -->
      @foreach($riwayat as $group)
          @php $item = $group->first(); @endphp
          <article class="content-card">
            <div>
              <h3 class="content-title">Hasil Analisis Kelayakan Usaha {{ $item->layanan->nama_layanan }}</h3>
              <p class="content-date">{{ $item->created_at->format('d M Y') }}</p>
            </div>
            <a class="content-link" href="{{ route('user.usaha.download', ['layanan_id' => $item->layanan_id]) }}">Download</a>
          </article>
      @endforeach
    </section>
</main>
 
<!-- Footer -->
<div class="mt-10"></div>
<x-footer></x-footer>