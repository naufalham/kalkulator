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
        Kalkulator Estimasi Modal Stok
    </h1>
    <form class="bg-white rounded-xl p-8 grid grid-cols-1 md:grid-cols-2 gap-x-12 gap-y-6" id="calcForm" onsubmit="return false">
        <div class="flex flex-col">
            <label class="text-xs mb-2 font-normal text-black" for="pendapatan">
                Jumlah Unit Barang
            </label>
            <input class="border border-gray-400 rounded-lg px-4 py-2 text-sm focus:outline-none focus:ring-2 focus:ring-[#f47920]" id="pendapatan" name="pendapatan" placeholder="" type="number" required/>
        </div>
        <div class="flex flex-col">
            <label class="text-xs mb-2 font-normal text-black" for="biaya">
                Harga Beli per Unit (Rp)
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
            Hasil Estimasi Modal
        </p>
        <p class="font-semibold text-sm" id="hasilLaba">
            Rp. 9.000.000
        </p>
    </section>
</main>

<x-footer></x-footer>