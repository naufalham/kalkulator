@vite(['resources/css/usaha.css','resources/js/app.js'])
<!-- Navbar -->
<x-navbar></x-navbar>

<!-- Main content -->
<main class="max-w-6xl mx-auto flex-grow w-full px-6 mt-10 pt-20">
    <form class="bg-white rounded-xl p-8 grid grid-cols-1 sm:grid-cols-2 gap-x-12 gap-y-6" id="modalAwalForm" onsubmit="return false">
        <h1 class="font-bold text-lg text-black col-span-full">
            Kalkulator Target Penjualan
        </h1>
        <div class="flex flex-col">
            <label class="text-sm mb-2 text-black" for="pendapatan">
                Biaya Tetap (Rp)
            </label>
            <p class="text-xs text-gray-700 mb-2">
                Biaya yang tidak berubah meskipun jumlah penjualan berubah (Contoh: sewa tempat, gaji tetap, listrik bulanan)
            </p>
            <input class="border border-gray-400 rounded-md px-4 py-2 text-sm focus:outline-none focus:ring-2 focus:ring-[#F47920]" id="biayaTetap" type="text"/>
        </div>

        <div class="flex flex-col">
            <label class="text-sm mb-2 text-black" for="rasioMargin">
                Rasio Margin Kontribusi (Rp)
            </label>
            <p class="text-xs text-gray-700 mb-2">
                Selisih antara harga jual per unit dan biaya variabel per unit
            </p>
            <input class="border border-gray-400 rounded-md px-4 py-2 text-sm focus:outline-none focus:ring-2 focus:ring-[#F47920] mt-4" id="rasioMargin" type="text"/>
        </div>

        <div class="flex flex-col">
            <label class="text-sm mb-2  text-black" for="targetLaba">
                Target Laba (Rp)
            </label>
            <p class="text-xs text-gray-700 mb-2">
                Jumlah keuntungan yang ingin dicapai
            </p>
            <input class="border border-gray-400 rounded-md px-4 py-2 text-sm focus:outline-none focus:ring-2 focus:ring-[#F47920]" id="targetLaba" type="text"/>
        </div>

        <div class="col-span-full flex justify-end mt-4">
            <button class="bg-[#F47920] text-white text-sm font-semibold rounded-md px-6 py-2" type="submit">
                Hitung
            </button>
        </div>
    </form>

    <section class="bg-white rounded-xl p-6 mt-10 text-sm text-black max-w-full" id="resultSection">
        <p class="mb-3 font-semibold">
            Hasil Target Penjualan
        </p>
        <p id="resultValue" id="hasilPenjualan">
            Rp 0
        </p>
    </section>
</main>

<script>
document.getElementById('formPenjualan').addEventListener('submit', function(e) {
    e.preventDefault();
    const biayaTetap = parseFloat(document.getElementById('biayaTetap').value) || 0;
    const rasioMargin = parseFloat(document.getElementById('rasioMargin').value) || 0;
    const targetLaba = parseFloat(document.getElementById('targetLaba').value) || 0;

    let hasil = 0;
    if (rasioMargin !== 0) {
        hasil = (biayaTetap + targetLaba) / rasioMargin;
    }

    const hasilText = 'Rp ' + Math.round(hasil).toLocaleString('id-ID');
    document.getElementById('hasilPenjualan').textContent = hasilText;
});
</script>

<!-- Footer -->
<div class="mt-10"></div>
<x-footer></x-footer>