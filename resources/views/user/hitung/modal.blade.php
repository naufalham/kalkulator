@vite(['resources/css/usaha.css','resources/js/app.js'])
<!-- Navbar -->
<x-navbar></x-navbar>
<main class="max-w-6xl mx-auto flex-grow w-full px-6 mt-10">
  <form class="bg-white rounded-xl p-8 grid grid-cols-1 sm:grid-cols-2 gap-x-12 gap-y-6" id="modalAwalForm" onsubmit="return false">
    <h1 class="font-bold text-lg text-black col-span-full">
      Kalkulator Modal Awal
    </h1>
    <div class="flex flex-col">
      <label class="text-sm mb-2 text-black" for="sewa">
        Sewa tempat (Rp)
      </label>
      <input class="border border-gray-400 rounded-lg px-3 py-2 text-sm focus:outline-none focus:ring-2 focus:ring-[#F97316]" id="sewa" min="0" placeholder="" type="number"/>
    </div>

    <div class="flex flex-col">
      <label class="text-sm mb-2 text-black" for="biayaAlat">
        Biaya alat &amp; perlengkapan (Rp)
      </label>
      <input class="border border-gray-400 rounded-lg px-3 py-2 text-sm focus:outline-none focus:ring-2 focus:ring-[#F97316]" id="biayaAlat" min="0" placeholder="" type="number"/>
    </div>

    <div class="flex flex-col">
      <label class="text-sm mb-2 text-black" for="stokBarang">
        Beli stok barang (Rp)
      </label>
      <input class="border border-gray-400 rounded-lg px-3 py-2 text-sm focus:outline-none focus:ring-2 focus:ring-[#F97316]" id="stokBarang" min="0" placeholder="" type="number"/>
    </div>
    
    <div class="flex flex-col">
      <label class="text-sm mb-2 text-black" for="biayaPromosi">
        Biaya promosi awal (Rp)
     </label>
     <input class="border border-gray-400 rounded-lg px-3 py-2 text-sm focus:outline-none focus:ring-2 focus:ring-[#F97316]" id="biayaPromosi" min="0" placeholder="" type="number"/>
    </div>
    
    <div class="col-span-full flex justify-end mt-4">
      <button class="bg-[#F97316] text-white rounded-lg px-6 py-3 text-sm font-semibold hover:bg-[#ea7a1a] transition" id="hitungBtn" type="submit">
        Hitung
      </button>
    </div>
  </form>

  <section class="bg-white rounded-xl p-6 mt-10 text-sm text-black max-w-full" id="resultSection">
    <p class="mb-3 font-semibold">
      Modal awal yang dibutuhkan
    </p>
    <p id="resultValue">
      Rp. 0
    </p>
  </section>
</main>


<script>
  document.getElementById('modalAwalForm').addEventListener('submit', function(e) {
      e.preventDefault();
      const sewa = parseFloat(document.getElementById('sewa').value) || 0;
      const biayaAlat = parseFloat(document.getElementById('biayaAlat').value) || 0;
      const stokBarang = parseFloat(document.getElementById('stokBarang').value) || 0;
      const biayaPromosi = parseFloat(document.getElementById('biayaPromosi').value) || 0;

      const total = sewa + biayaAlat + stokBarang + biayaPromosi;
      document.getElementById('resultValue').textContent = 'Rp. ' + total.toLocaleString('id-ID');
  });
</script>
  
<!-- Footer -->
<x-footer></x-footer>
