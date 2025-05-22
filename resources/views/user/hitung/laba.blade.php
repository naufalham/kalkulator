@vite(['resources/css/usaha.css','resources/js/app.js'])
<!-- Navbar -->
<x-navbar></x-navbar>

<!-- Main content -->
<main class="max-w-6xl mx-auto flex-grow w-full px-6 mt-10 pt-20">
    <form class="bg-white rounded-xl p-8 grid grid-cols-1 sm:grid-cols-2 gap-x-12 gap-y-6" id="calcForm" onsubmit="return false">
        <div class="col-span-full flex items-center justify-between mb-4">
            <h1 class="font-bold text-lg text-black">
                Kalkulator Laba Bersih
            </h1>
            <a href="/kalkulator" class="text-[#F97316] font-semibold hover:underline text-base">
                Keluar
            </a>
        </div>
        <div class="flex flex-col">
            <label class="text-sm mb-2 font-normal text-black" for="pendapatan">
                Total Pendapatan (Rp)
            </label>
            <p class="text-xs text-gray-700 mb-2">
                Jumlah seluruh pemasukan dari hasil penjualan produk atau jasa dalam periode tertentu
            </p>
            <input class="border border-gray-400 rounded-lg px-4 py-2 text-sm focus:outline-none focus:ring-2 focus:ring-[#f47920]" id="pendapatan" name="pendapatan" placeholder="" type="number" required/>
        </div>

        <div class="flex flex-col">
            <label class="text-sm mb-2 font-normal text-black" for="biaya">
                Total Biaya (Rp)
            </label>
            <p class="text-xs text-gray-700 mb-2">
                Jumlah seluruh pengeluaran usaha dalam periode yang sama, termasuk biaya tetap dan biaya variabel
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
            Hasil Laba Bersih
        </p>
        <p id="hasilLaba">
            Rp 0
        </p>
    </section>
</main>


<script>
document.getElementById('calcForm').addEventListener('submit', function(e) {
    e.preventDefault();
    const pendapatan = parseFloat(document.getElementById('pendapatan').value) || 0;
    const biaya = parseFloat(document.getElementById('biaya').value) || 0;
    const laba = pendapatan - biaya;
    let hasil = 'Rp ' + Math.abs(laba).toLocaleString('id-ID');
    if (laba < 0) {
        hasil = '- ' + hasil;
    }
    document.getElementById('hasilLaba').textContent = hasil;
});
</script>

<!-- Footer -->
<div class="mt-10"></div>
<x-footer></x-footer>