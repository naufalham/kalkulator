<html lang="en">
 <head>
  <meta charset="utf-8"/>
  <meta content="width=device-width, initial-scale=1" name="viewport"/>
  @vite(['resources/css/usaha.css','resources/js/app.js'])
  <title>
   AKUNaZma
  </title>
  <script src="https://cdn.tailwindcss.com">
  </script>
  <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" rel="stylesheet"/>
  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;700&amp;display=swap" rel="stylesheet"/>
 </head>

<x-navbar></x-navbar>

<main class="flex-grow max-w-7xl mx-auto w-full px-6 mt-10">
    <h1 class="font-bold text-lg mb-6">
     Kalkulator Target Penjualan
    </h1>
    <form class="bg-white rounded-xl p-8 grid grid-cols-1 md:grid-cols-2 gap-y-6 gap-x-12 mb-10" onsubmit="return false">
     <div class="flex flex-col space-y-1">
      <label class="text-xs font-normal text-black" for="biayaTetap">
       Biaya Tetap (Rp)
      </label>
      <input class="border border-gray-400 rounded-md px-4 py-2 text-sm focus:outline-none focus:ring-2 focus:ring-[#F47920]" id="biayaTetap" type="text"/>
     </div>
     <div class="flex flex-col space-y-1">
      <label class="text-xs font-normal text-black" for="rasioMargin">
       Rasio Margin Kontribusi (Rp)
      </label>
      <input class="border border-gray-400 rounded-md px-4 py-2 text-sm focus:outline-none focus:ring-2 focus:ring-[#F47920]" id="rasioMargin" type="text"/>
     </div>
     <div class="flex flex-col space-y-1 md:col-span-1">
      <label class="text-xs font-normal text-black" for="targetLaba">
       Target Laba (Rp)
      </label>
      <input class="border border-gray-400 rounded-md px-4 py-2 text-sm focus:outline-none focus:ring-2 focus:ring-[#F47920]" id="targetLaba" type="text"/>
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
     <p class="text-xs font-semibold">
      Rp. 9.000.000
     </p>
    </section>
   </main>

    <x-footer></x-footer>