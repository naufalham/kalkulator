@vite(['resources/css/usaha.css','resources/js/app.js'])
<x-navbar></x-navbar>

<main class="flex-grow max-w-7xl mx-auto w-full px-6 mt-10">
    <h1 class="font-bold text-lg mb-6">
     Kalkulator Target Penjualan
    </h1>
    <form class="bg-white rounded-xl p-8 grid grid-cols-1 md:grid-cols-2 gap-y-6 gap-x-12 mb-10" id="formPenjualan" autocomplete="off">
        <div class="flex flex-col space-y-1">
            <label class="text-xs font-normal text-black" for="biayaTetap">
                Biaya Tetap (Rp)
            </label>
            <input class="border border-gray-400 rounded-md px-4 py-2 text-sm focus:outline-none focus:ring-2 focus:ring-[#F47920]" id="biayaTetap" type="number"/>
        </div>
        <div class="flex flex-col space-y-1">
            <label class="text-xs font-normal text-black" for="rasioMargin">
                Rasio Margin Kontribusi (Rp)
            </label>
            <input class="border border-gray-400 rounded-md px-4 py-2 text-sm focus:outline-none focus:ring-2 focus:ring-[#F47920]" id="rasioMargin" type="number"/>
        </div>
        <div class="flex flex-col space-y-1 md:col-span-1">
            <label class="text-xs font-normal text-black" for="targetLaba">
                Target Laba (Rp)
            </label>
            <input class="border border-gray-400 rounded-md px-4 py-2 text-sm focus:outline-none focus:ring-2 focus:ring-[#F47920]" id="targetLaba" type="number"/>
        </div>
        <div class="flex items-end justify-end">
            <button class="bg-[#F47920] text-white text-sm font-semibold rounded-md px-6 py-2" type="submit">
                Hitung
            </button>
        </div>
    </form>
    <section class="bg-white rounded-xl p-6 max-w-full w-full">
     <p class="text-xs font-semibold mb-2">
      Hasil Target Penjualan
     </p>
     <p class="text-xs font-semibold" id="hasilPenjualan">
      Rp. 0
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

    const hasilText = 'Rp. ' + Math.round(hasil).toLocaleString('id-ID');
    document.getElementById('hasilPenjualan').textContent = hasilText;
});
</script>

<x-footer></x-footer>