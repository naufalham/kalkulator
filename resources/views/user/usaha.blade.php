@vite(['resources/css/usaha.css','resources/js/app.js'])
<!-- Navbar -->
<x-navbar></x-navbar>

<!-- Main content -->
  <main class="flex-grow max-w-6xl mx-auto px-6 mt-12">
    <div class="main-content grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 gap-x-8 gap-y-12 max-w-6xl mx-auto place-items-center pt-20">
      

      @foreach($layanans as $layanan)
      <a href="/form_usaha" class="block">
          <div class="relative bg-white rounded-2xl pt-12 pb-8 px-6 text-center shadow-sm transition-transform transform hover:-translate-y-2 hover:shadow-lg duration-300">
              <div class="absolute -top-6 left-1/2 -translate-x-1/2 bg-[#F28C28] w-12 h-12 rounded-xl flex items-center justify-center">
                  <img alt="Icon representing fashion" class="w-9 h-9" height="32" src="{{ asset('icons/' . strtolower($layanan->nama_layanan) . '.png') }}" width="24"/>
              </div>
              <h3 class="font-bold text-base text-black mb-2 select-none">
                  {{ $layanan->nama_layanan }}
              </h3>
              <p class="custom-paragraph">
                  {{ $layanan->deskripsi }}
              </p>
          </div>
      </a>
      @endforeach

      
    </div>
  </main>

<!-- Footer -->
<div class="mt-10"></div>
<x-footer></x-footer>