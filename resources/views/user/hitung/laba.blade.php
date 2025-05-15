
  @vite(['resources/css/usaha.css','resources/js/app.js'])


<x-navbar></x-navbar>

<main class="flex-grow max-w-7xl mx-auto w-full px-6 mt-10">
    <h1 class="font-bold text-lg mb-6">
        Kalkulator Laba Bersih
    </h1>
    <form class="bg-white rounded-xl p-8 grid grid-cols-1 md:grid-cols-2 gap-x-12 gap-y-6" id="calcForm" onsubmit="return false" method="POST" action="{{ route('user.update') }}">
        <div class="flex flex-col">
            <label class="text-xs mb-2 font-normal text-black" for="pendapatan">
                Total Pendapatan (Rp)
            </label>
            <input class="border border-gray-400 rounded-lg px-4 py-2 text-sm focus:outline-none focus:ring-2 focus:ring-[#f47920]" id="pendapatan" name="pendapatan" placeholder="" type="number" required/>
        </div>
        <div class="flex flex-col">
            <label class="text-xs mb-2 font-normal text-black" for="biaya">
                Total Biaya (Rp)
            </label>
            <input class="border border-gray-400 rounded-lg px-4 py-2 text-sm focus:outline-none focus:ring-2 focus:ring-[#f47920]" id="biaya" name="biaya" placeholder="" type="number" required/>
        </div>
        <div class="col-span-full flex justify-end mt-4">
            <button class="bg-[#f47920] text-white rounded-lg px-6 py-2 text-sm font-normal hover:bg-[#db6e1a] focus:outline-none focus:ring-2 focus:ring-[#f47920]" id="hitungBtn" type="submit">
                Hitung
            </button>
        </div>
    </form>
    <section class="bg-white rounded-xl p-6 mt-10 text-xs text-black max-w-full" id="resultSection">
        <p class="font-semibold text-sm mb-3">
            Hasil Laba Bersih
        </p>
        <p class="font-semibold text-sm" id="hasilLaba">
            Rp. 0
        </p>
    </section>
</main>


<script>
document.getElementById('calcForm').addEventListener('submit', function(e) {
    e.preventDefault();
    const pendapatan = parseFloat(document.getElementById('pendapatan').value) || 0;
    const biaya = parseFloat(document.getElementById('biaya').value) || 0;
    const laba = pendapatan - biaya;
    let hasil = 'Rp. ' + Math.abs(laba).toLocaleString('id-ID');
    if (laba < 0) {
        hasil = '- ' + hasil;
    }
    document.getElementById('hasilLaba').textContent = hasil;
});
</script>

<x-footer></x-footer>