@vite(['resources/css/usaha.css','resources/js/app.js'])

    <!-- Navbar -->
      <x-navbar></x-navbar>

    <!-- Main content -->
      <main class="flex-grow max-w-7xl mx-auto px-6 mt-12">
        <h2 class="font-bold text-lg text-black mb-10 select-none text-center">
          Pilih Jenis Usaha
        </h2>

        <div class="main-content grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 gap-x-8 gap-y-12 max-w-6xl mx-auto place-items-center">
          
            <!-- Fesyen -->
            <a href="/form_usaha" class="block">
                <div class="relative bg-white rounded-2xl pt-12 pb-8 px-6 text-center shadow-sm transition-transform transform hover:-translate-y-2 hover:shadow-lg duration-300">
                    <div class="absolute -top-6 left-1/2 -translate-x-1/2 bg-[#2E327D] w-12 h-12 rounded-xl flex items-center justify-center">
                        <img alt="Icon representing fashion" class="w-9 h-9" height="32" src="{{ asset('icons/fesyen.png') }}" width="24"/>
                    </div>
                    <h3 class="font-bold text-base text-black mb-2 select-none">
                        Fesyen
                    </h3>
                    <p class="custom-paragraph">
                        Usaha yang berfokus pada pakaian, sepatu, dan aksesori gaya hidup
                    </p>
                </div>
            </a>
            
            <!-- Kuliner -->
            <a href="/form_usaha" class="block">
              <div class="relative bg-white rounded-2xl pt-12 pb-8 px-6 text-center shadow-sm transition-transform transform hover:-translate-y-2 hover:shadow-lg duration-300">
                <div class="absolute -top-6 left-1/2 -translate-x-1/2 bg-[#2E327D] w-12 h-12 rounded-xl flex items-center justify-center">
                  <img alt="Icon representing fashion" class="w-8 h-8" height="32" src="{{ asset('icons/kuliner.png') }}" width="24"/>
                </div>
                <h3 class="font-bold text-base text-black mb-2 select-none">
                  Kuliner
                </h3>
                <p class="custom-paragraph">
                  Usaha di bidang makanan, minuman, dan layanan kuliner
                </p>
              </div>
            </a>

            <!-- Jasa -->
            <a href="/form_usaha" class="block">
              <div class="relative bg-white rounded-2xl pt-12 pb-8 px-6 text-center shadow-sm transition-transform transform hover:-translate-y-2 hover:shadow-lg duration-300">
                <div class="absolute -top-6 left-1/2 -translate-x-1/2 bg-[#2E327D] w-12 h-12 rounded-xl flex items-center justify-center">
                  <img alt="Icon representing fashion" class="w-8 h-8" height="32" src="{{ asset('icons/jasa.png') }}" width="24"/>
                </div>
                <h3 class="font-bold text-base text-black mb-2 select-none">
                  Jasa
                </h3>
                <p class="custom-paragraph">
                  Usaha yang menawarkan layanan atau keahlian untuk memenuhi kebutuhan
                </p>
              </div>
            </a>

            <!-- Kerajinan -->
            <a href="/form_usaha" class="block">
              <div class="relative bg-white rounded-2xl pt-12 pb-8 px-6 text-center shadow-sm transition-transform transform hover:-translate-y-2 hover:shadow-lg duration-300 translate-x-1/2">
                <div class="absolute -top-6 left-1/2 -translate-x-1/2 bg-[#2E327D] w-12 h-12 rounded-xl flex items-center justify-center">
                  <img alt="Icon representing fashion" class="w-8 h-8" height="32" src="{{ asset('icons/kerajinan.png') }}" width="24"/>
                </div>
                <h3 class="font-bold text-base text-black mb-2 select-none">
                    Kerajinan
                </h3>
                <p class="custom-paragraph">
                    Usaha yang mengubah kreativitas menjadi produk kerajinan bernilai
                </p>
              </div>
            </a>

            <!-- Campuran -->
            <a href="/form_usaha" class="block">
              <div class="relative bg-white rounded-2xl pt-12 pb-8 px-6 text-center shadow-sm transition-transform transform hover:-translate-y-2 hover:shadow-lg duration-300 translate-x-1/2">
                <div class="absolute -top-6 left-1/2 -translate-x-1/2 bg-[#2E327D] w-12 h-12 rounded-xl flex items-center justify-center">
                  <img alt="Icon representing fashion" class="w-8 h-8" height="32" src="{{ asset('icons/campuran.png') }}" width="24"/>
                </div>
                <h3 class="font-bold text-base text-black mb-2 select-none">
                  Campuran
                </h3>
                <p class="custom-paragraph">
                  Usaha gabungan dari berbagai bidang untuk peluang yang lebih luas
                </p>
              </div>
            </a>
        </div>

      </main>

  
    <!-- Footer -->
      <x-footer></x-footer>

