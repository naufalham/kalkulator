 @vite(['resources/css/usaha.css','resources/js/app.js'])
<x-navbar></x-navbar>

<main class="max-w-6xl mx-auto flex-grow w-full px-6 mt-10">
    <form class="bg-white rounded-xl p-8 grid grid-cols-1 md:grid-cols-2 gap-x-12 gap-y-6" id="calcForm" onsubmit="return false">
        <h1 class="font-bold text-lg text-black col-span-full">
            Kalkulator Estimasi Modal Stok
        </h1>
        <div class="flex flex-col">
            <label class="text-sm mb-2  text-black" for="pendapatan">
                Jumlah Unit Barang
            </label>
            <p class="text-xs text-gray-700 mb-2">
                Jumlah produk atau barang yang ingin dibeli untuk dijadikan stok
            </p>
            <input class="border border-gray-400 rounded-lg px-4 py-2 text-sm focus:outline-none focus:ring-2 focus:ring-[#f47920]" id="pendapatan" name="pendapatan" placeholder="" type="number" required/>
        </div>

        <div class="flex flex-col">
            <label class="text-sm mb-2 font-normal text-black" for="biaya">
                Harga Beli per Unit (Rp)
            </label>
            <p class="text-xs text-gray-700 mb-2">
                Harga pembelian untuk satu unit barang dari supplier
            </p>
            <input class="border border-gray-400 rounded-lg px-4 py-2 text-sm focus:outline-none focus:ring-2 focus:ring-[#f47920]" id="biaya" name="biaya" placeholder="" type="number" required/>
        </div>

        <div class="col-span-full flex justify-end mt-4">
            <button class="bg-[#f47920] text-white rounded-lg px-6 py-2 text-sm font-normal hover:bg-[#db6e1a] focus:outline-none focus:ring-2 focus:ring-[#f47920]" id="hitungBtn" type="submit">
                Hitung
            </button>
        </div>
    </form>

    <section class="bg-white rounded-xl p-6 mt-10 text-sm text-black max-w-full" id="resultSection">
        <p class="mb-3 font-semibold">
            Hasil Estimasi Modal
        </p>
        <p id="resultValue">
            Rp 9.000.000
        </p>
    </section>
</main>

<!-- Footer -->
<x-footer></x-footer>