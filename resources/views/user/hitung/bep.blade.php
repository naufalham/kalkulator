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
 <body class="bg-[#F4F8FF] min-h-screen flex flex-col">
  <!-- Header -->
  <x-navbar></x-navbar>


  <!-- Main content -->
  <main class="max-w-7xl mx-auto px-6 mt-10 flex-grow w-full">
    <h1 class="font-extrabold text-black text-lg mb-6">
        Kalkulator Break Even Point (BEP)
    </h1>

    <form class="bg-white rounded-xl p-8 grid grid-cols-1 sm:grid-cols-2 gap-x-12 gap-y-6" id="modalAwalForm" onsubmit="return false">
        <div class="flex flex-col">
            <label class="text-xs mb-2 text-black" for="fixedCost">
                Biaya Tetap (Rp)
            </label>
            <input class="border border-gray-400 rounded-lg px-3 py-2 text-sm focus:outline-none focus:ring-2 focus:ring-[#F97316]" id="fixedCost" name="fixedCost" min="0" placeholder="" type="number" required/>
        </div>
        <div class="flex flex-col">
            <label class="text-xs mb-2 text-black" for="unitPrice">
                Harga Jual Per Unit (Rp)
            </label>
            <input class="border border-gray-400 rounded-lg px-3 py-2 text-sm focus:outline-none focus:ring-2 focus:ring-[#F97316]" id="unitPrice" name="unitPrice" min="0" placeholder="" type="number" required/>
        </div>
        <div class="flex flex-col">
            <label class="text-xs mb-2 text-black" for="variableCost">
                Biaya Variable Per Unit (Rp)
            </label>
            <input class="border border-gray-400 rounded-lg px-3 py-2 text-sm focus:outline-none focus:ring-2 focus:ring-[#F97316]" id="variableCost" name="variableCost" min="0" placeholder="" type="number" required/>
        </div>
        <!-- Tambahkan Radio Button -->
        <div class="col-span-full">
            <p class="text-xs text-black mb-2">
                Pilih kategori (Salah Satu)
            </p>
            <div class="flex flex-col space-y-2">
                <label class="flex items-center space-x-2">
                    <input type="radio" name="category" value="unit" class="focus:ring-[#F97316]" required/>
                    <span class="text-xs text-black">Unit barang/jasa yang harus dijual</span>
                </label>
                <label class="flex items-center space-x-2">
                    <input type="radio" name="category" value="revenue" class="focus:ring-[#F97316]" required/>
                    <span class="text-xs text-black">Berapa rupiah penjualan yang dibutuhkan</span>
                </label>
            </div>
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
