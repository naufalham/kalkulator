@vite(['resources/css/form_usaha.css','resources/js/app.js'])
<!-- Navbar -->
<x-navbar></x-navbar>

<!-- Main content -->
<main class="flex-grow max-w-7xl mx-auto px-8 sm:px-16 lg:px-24 py-8 w-full pt-32">
    <form autocomplete="off" class="bg-white rounded-xl p-8 max-w-6xl w-full mx-auto space-y-2" novalidate="" method="POST" action="{{ route('export.analisis.usaha') }}">

        @csrf
        <!-- Pendapatan -->
        <section>
            <h1 class="font-extrabold text-black text-lg mb-6 select-none mx-auto max-w-5xl text-center">
                Analisis Kelayakan Usaha Fesyen
            </h1>
            <hr>
            <h2 class="font-extrabold text-black text-base mb-6 mt-6 select-none">
                Pendapatan
            </h2>
            <div class="grid grid-cols-1 sm:grid-cols-2 gap-x-12 gap-y-6">
                <div class="flex flex-col">
                    <label class="text-sm text-black mb-1 select-none" for="modal">
                        Modal (Rp)
                    </label>
                    <input class="border border-gray-300 rounded-md px-3 py-2 text-sm focus:outline-none focus:ring-2 focus:ring-[#F97316]" id="modal" name="modal" type="text"/>
                </div>
                <div class="flex flex-col">
                    <label class="text-sm text-black mb-1 select-none" for="jasa">
                        Jasa (Rp)
                    </label>
                    <input class="border border-gray-300 rounded-md px-3 py-2 text-sm focus:outline-none focus:ring-2 focus:ring-[#F97316]" id="jasa" name="jasa" type="text"/>
                </div>
                <div class="flex flex-col">
                    <label class="text-sm text-black mb-1 select-none" for="penjualan">
                        Penjualan (Rp)
                    </label>
                    <input class="border border-gray-300 rounded-md px-3 py-2 text-sm focus:outline-none focus:ring-2 focus:ring-[#F97316]" id="penjualan" name="penjualan" type="text"/>
                </div>
                <div class="flex flex-col">
                    <label class="text-sm text-black mb-1 select-none" for="lainnya-pendapatan">
                        Lainnya (Rp)
                    </label>
                    <input class="border border-gray-300 rounded-md px-3 py-2 text-sm focus:outline-none focus:ring-2 focus:ring-[#F97316]" id="lainnya-pendapatan" name="lainnya-pendapatan" type="text"/>
                </div>
            </div>
        </section>

        <!-- Pengeluaran -->
        <section>
            <h2 class="font-extrabold text-black text-base mb-6 select-none">
                Pengeluaran
            </h2>
            <div class="grid grid-cols-1 sm:grid-cols-2 gap-x-12 gap-y-6">
                <div class="flex flex-col">
                    <label class="text-sm text-black mb-1 select-none" for="bahan">
                        Bahan (Rp)
                    </label>
                    <input class="border border-gray-300 rounded-md px-3 py-2 text-sm focus:outline-none focus:ring-2 focus:ring-[#F97316]" id="bahan" name="bahan" type="text"/>
                </div>
                <div class="flex flex-col">
                    <label class="text-sm text-black mb-1 select-none" for="gaji-karyawan">
                        Gaji Karyawan (Rp)
                    </label>
                    <input class="border border-gray-300 rounded-md px-3 py-2 text-sm focus:outline-none focus:ring-2 focus:ring-[#F97316]" id="gaji-karyawan" name="gaji-karyawan" type="text"/>
                </div>
                <div class="flex flex-col">
                    <label class="text-sm text-black mb-1 select-none" for="banyak-karyawan">
                        Banyak Karyawan
                    </label>
                    <input class="border border-gray-300 rounded-md px-3 py-2 text-sm focus:outline-none focus:ring-2 focus:ring-[#F97316]" id="banyak-karyawan" name="banyak-karyawan" type="text"/>
                </div>
                <div class="flex flex-col">
                    <label class="text-sm text-black mb-1 select-none" for="sewa-tempat">
                        Sewa Tempat (Rp)
                    </label>
                    <input class="border border-gray-300 rounded-md px-3 py-2 text-sm focus:outline-none focus:ring-2 focus:ring-[#F97316]" id="sewa-tempat" name="sewa-tempat" type="text"/>
                </div>
                <div class="flex flex-col">
                    <label class="text-sm text-black mb-1 select-none" for="listrik">
                        Listrik (Rp)
                    </label>
                    <input class="border border-gray-300 rounded-md px-3 py-2 text-sm focus:outline-none focus:ring-2 focus:ring-[#F97316]" id="listrik" name="listrik" type="text"/>
                </div>
                <div class="flex flex-col">
                    <label class="text-sm text-black mb-1 select-none" for="lainnya-pengeluaran">
                        Lainnya (Rp)
                    </label>
                    <input class="border border-gray-300 rounded-md px-3 py-2 text-sm focus:outline-none focus:ring-2 focus:ring-[#F97316]" id="lainnya-pengeluaran" name="lainnya-pengeluaran" type="text"/>
                </div>
            </div>
        </section>

        <div class="flex justify-end">
            <button class="bg-[#F97316] text-white text-sm font-semibold rounded-lg px-6 py-3 hover:bg-[#e06f11] transition-colors" type="submit">
                Unduh Hasil
            </button>
        </div>
    </form>
</main>

<!-- Footer -->
<div class="mt-10"></div>
<x-footer></x-footer>