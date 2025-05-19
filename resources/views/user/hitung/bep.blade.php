@vite(['resources/css/usaha.css','resources/js/app.js'])
  <!-- Header -->
  <x-navbar></x-navbar>

  <!-- Main content -->
  <main class="max-w-6xl mx-auto flex-grow w-full px-6 mt-10">
    <form class="bg-white rounded-xl p-8 grid grid-cols-1 sm:grid-cols-2 gap-x-12 gap-y-6" id="modalAwalForm" onsubmit="return false">
        <h1 class="font-bold text-lg text-black col-span-full">
            Kalkulator Break Even Point
        </h1>
        <div class="flex flex-col">
            <label class="text-sm mb-2 text-black" for="fixedCost">
                Biaya Tetap (Rp)
            </label>
            <p class="text-xs text-gray-700 mb-2">
                Biaya yang tidak berubah meskipun jumlah penjualan berubah (Contoh: sewa tempat, gaji tetap, listrik bulanan)
            </p>
            <input class="border border-gray-400 rounded-lg px-3 py-2 text-sm focus:outline-none focus:ring-2 focus:ring-[#F97316]" id="fixedCost" name="fixedCost" min="0" placeholder="" type="number" required/>
        </div>

        <div class="flex flex-col">
            <label class="text-sm mb-2 text-black" for="unitPrice">
                Harga Jual Per Unit (Rp)
            </label>
            <p class="text-xs text-gray-700 mb-2">
                Harga jual produk atau jasa per satuan yang ditawarkan
            </p>
            <input class="border border-gray-400 rounded-lg px-3 py-2 text-sm focus:outline-none focus:ring-2 focus:ring-[#F97316] mt-4" id="unitPrice" name="unitPrice" min="0" placeholder="" type="number" required/>
        </div>

        <div class="flex flex-col">
            <label class="text-sm mb-2 text-black" for="variableCost">
                Biaya Variable Per Unit (Rp)
            </label>
            <p class="text-xs text-gray-700 mb-2">
                Biaya yang bergantung pada jumlah produk/jasa yang dijual (Contoh: bahan baku per unit)
            </p>
            <input class="border border-gray-400 rounded-lg px-3 py-2 text-sm focus:outline-none focus:ring-2 focus:ring-[#F97316]" id="variableCost" name="variableCost" min="0" placeholder="" type="number" required/>
        </div>

        <!-- Tambahkan Radio Button -->
        <div class="col-span-full">
            <p class="text-sm text-black mb-2">
                Pilih kategori (Salah Satu)
            </p>
            <div class="flex flex-col space-y-2">
                <label class="flex items-center space-x-2">
                    <input type="radio" name="category" value="unit" class="focus:ring-[#F97316]" required/>
                    <span class="text-sm text-black">Unit barang/jasa yang harus dijual</span>
                </label>
                <label class="flex items-center space-x-2">
                    <input type="radio" name="category" value="revenue" class="focus:ring-[#F97316]" required/>
                    <span class="text-sm text-black">Berapa rupiah penjualan yang dibutuhkan</span>
                </label>
            </div>
        </div>

        <div class="col-span-full flex justify-end mt-4">
            <button class="bg-[#F97316] text-white rounded-lg px-6 py-2 text-sm font-semibold hover:bg-[#ea7a1a] transition" id="hitungBtn" type="submit">
                Hitung
            </button>
        </div>
    </form>

    <section class="bg-white rounded-xl p-6 mt-10 text-sm text-black max-w-full" id="resultSection">
        <p class="mb-3 font-semibold">
            Modal awal yang dibutuhkan
        </p>
        <p id="resultValue">
            Rp 9.000.000
        </p>
    </section>
</main>

<!-- Footer -->
 <x-footer></x-footer>
