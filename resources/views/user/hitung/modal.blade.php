<html lang="en">
 <head>
  <meta charset="utf-8"/>
  <meta content="width=device-width, initial-scale=1" name="viewport"/>
  <title>
   Kalkulator Modal Awal
  </title>
  <script src="https://cdn.tailwindcss.com">
  </script>
  <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" rel="stylesheet"/>
  <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;700&amp;display=swap" rel="stylesheet"/>
  <style>
   body {
      font-family: 'Inter', sans-serif;
    }
  </style>
 </head>
 <body class="bg-[#F5F8FF] min-h-screen flex flex-col">
  <!-- Navbar -->
  <x-navbar></x-navbar>

  <main class="max-w-5xl mx-auto flex-grow w-full px-6 mt-10">
   <h1 class="font-bold text-lg text-black mb-6">
    Kalkulator Modal Awal
   </h1>
   <form class="bg-white rounded-xl p-8 grid grid-cols-1 sm:grid-cols-2 gap-x-12 gap-y-6" id="modalAwalForm" onsubmit="return false">
    <div class="flex flex-col">
     <label class="text-xs mb-2 text-black" for="sewa">
      Sewa tempat (Rp)
     </label>
     <input class="border border-gray-400 rounded-lg px-3 py-2 text-sm focus:outline-none focus:ring-2 focus:ring-[#F97316]" id="sewa" min="0" placeholder="" type="number"/>
    </div>
    <div class="flex flex-col">
     <label class="text-xs mb-2 text-black" for="biayaAlat">
      Biaya alat &amp; perlengkapan (Rp)
     </label>
     <input class="border border-gray-400 rounded-lg px-3 py-2 text-sm focus:outline-none focus:ring-2 focus:ring-[#F97316]" id="biayaAlat" min="0" placeholder="" type="number"/>
    </div>
    <div class="flex flex-col">
     <label class="text-xs mb-2 text-black" for="stokBarang">
      Beli stok barang (Rp)
     </label>
     <input class="border border-gray-400 rounded-lg px-3 py-2 text-sm focus:outline-none focus:ring-2 focus:ring-[#F97316]" id="stokBarang" min="0" placeholder="" type="number"/>
    </div>
    <div class="flex flex-col">
     <label class="text-xs mb-2 text-black" for="biayaPromosi">
      Biaya promosi awal (Rp)
     </label>
     <input class="border border-gray-400 rounded-lg px-3 py-2 text-sm focus:outline-none focus:ring-2 focus:ring-[#F97316]" id="biayaPromosi" min="0" placeholder="" type="number"/>
    </div>
    <div class="col-span-full flex justify-end mt-4">
     <button class="bg-[#F97316] text-white rounded-lg px-6 py-2 text-sm font-semibold hover:bg-[#ea7a1a] transition" id="hitungBtn" type="submit">
      Hitung
     </button>
    </div>
   </form>
   <section class="bg-white rounded-xl p-6 mt-10 text-xs text-black max-w-full" id="resultSection">
    <p class="mb-3 font-semibold">
     Modal awal yang dibutuhkan.
    </p>
    <p id="resultValue">
     Rp. 9.000.000
    </p>
   </section>
  </main>
  


    <!-- Footer -->
    <x-footer></x-footer>

 </body>
</html>
