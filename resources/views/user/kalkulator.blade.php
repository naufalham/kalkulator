@vite(['resources/css/usaha.css','resources/js/app.js'])
        <!-- Navbar -->
        <x-navbar id="sticky-navbar" class="bg-white shadow-md"></x-navbar>

        <!-- Main content -->
        <main class="flex-grow max-w-7xl mx-auto px-4 sm:px-6 md:px-8 mt-12">
            <div class="main-content grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 gap-x-8 gap-y-12 max-w-6xl mx-auto place-items-center">
                <a href="/kalkulator/modal" class="relative bg-white rounded-2xl pt-12 pb-8 px-6 text-center shadow-sm transition-transform transform hover:-translate-y-2 hover:shadow-lg duration-300">
                    <div class="absolute -top-6 left-1/2 -translate-x-1/2 bg-[#F28C28] w-12 h-12 rounded-xl flex items-center justify-center">
                        <img alt="Icon Modal Awal" class="w-9 h-9" height="32" src="{{ asset('icons/kalkulator/modal.png') }}" width="24"/>
                    </div>
                    <h3 class="font-bold text-sm sm:text-base text-black mb-2 select-none">
                        Kalkulator Modal Awal
                    </h3>
                    <p class="custom-paragraph text-xs sm:text-sm">
                        Cari tahu total dana yang dibutuhkan diawal
                    </p>
                </a>

                <a href="/kalkulator/bep" class="relative bg-white rounded-2xl pt-12 pb-8 px-6 text-center shadow-sm transition-transform transform hover:-translate-y-2 hover:shadow-lg duration-300">
                    <div class="absolute -top-6 left-1/2 -translate-x-1/2 bg-[#F28C28] w-12 h-12 rounded-xl flex items-center justify-center">
                        <img alt="Icon bep" class="w-8 h-8" height="32" src="{{ asset('icons/kalkulator/modal.png') }}" width="24"/>
                    </div>
                    <h3 class="font-bold text-base text-black select-none">
                        Kalkulator
                    </h3>
                    <h3 class="font-bold text-base text-black select-none">
                        Break Even Point (BEP)
                    </h3>
                    <p class="custom-paragraph">
                        Cari tahu berapa banyak produk yang harus dijual
                    </p>
                </a>

                <a href="/kalkulator/laba" class="relative bg-white rounded-2xl pt-12 pb-8 px-6 text-center shadow-sm transition-transform transform hover:-translate-y-2 hover:shadow-lg duration-300">
                    <div class="absolute -top-6 left-1/2 -translate-x-1/2 bg-[#F28C28] w-12 h-12 rounded-xl flex items-center justify-center">
                        <img alt="Icon Laba" class="w-8 h-8" height="32" src="{{ asset('icons/kalkulator/modal.png') }}" width="24"/>
                    </div>
                    <h3 class="font-bold text-base text-black select-none">
                        Kalkulator
                    </h3>
                    <h3 class="font-bold text-base text-black select-none">
                        Estimasi Laba Bersih
                    </h3>
                    <p class="custom-paragraph">
                        Estimasikan berapa laba bersih yang bisa didapatkan
                    </p>
                </a>
                
                <a href="/kalkulator/penjualan" class="relative bg-white rounded-2xl pt-12 pb-8 px-6 text-center shadow-sm transition-transform transform hover:-translate-y-2 hover:shadow-lg duration-300">
                    <div class="absolute -top-6 left-1/2 -translate-x-1/2 bg-[#F28C28] w-12 h-12 rounded-xl flex items-center justify-center">
                        <img alt="Icon penjualan" class="w-8 h-8" height="32" src="{{ asset('icons/kalkulator/modal.png') }}" width="24"/>
                    </div>
                    <h3 class="font-bold text-base text-black mb-2 select-none">
                        Kalkulator Target Penjualan
                    </h3>
                    <p class="custom-paragraph">
                        Tentukan jumlah produk yang harus dijual
                    </p>
                </a>
                
                <a href="/kalkulator/stok" class="relative bg-white rounded-2xl pt-12 pb-8 px-6 text-center shadow-sm transition-transform transform hover:-translate-y-2 hover:shadow-lg duration-300">
                    <div class="absolute -top-6 left-1/2 -translate-x-1/2 bg-[#F28C28] w-12 h-12 rounded-xl flex items-center justify-center">
                        <img alt="Icon stok" class="w-8 h-8" height="32" src="{{ asset('icons/kalkulator/modal.png') }}" width="24"/>
                    </div>
                    <h3 class="font-bold text-base text-black mb-2 select-none">
                        Kalkulator Estimasi Modal Stok
                    </h3>
                    <p class="custom-paragraph">
                        Hitung berapa modal yang perlu disiapkan
                    </p>
                </a>
            </div>
        </main>

        <!-- Footer -->
        <x-footer></x-footer>