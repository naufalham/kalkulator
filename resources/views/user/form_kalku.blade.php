<html lang="en">
 <head>
  <meta charset="utf-8"/>
  <meta content="width=device-width, initial-scale=1" name="viewport"/>
  <title>
   Kalkulator Harga Jual
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
 <body class="bg-[#f5f8ff] min-h-screen flex flex-col justify-between">


  <x-navbar></x-navbar>


  <main class="px-6 md:px-16 lg:px-24 py-16 flex flex-col gap-10 max-w-[1200px] mx-auto flex-grow">
   <h1 class="font-extrabold text-lg md:text-xl lg:text-2xl text-black max-w-max">
    Kalkulator Harga Jual
   </h1>
   <section class="flex flex-col md:flex-row gap-10">
    <form class="bg-white rounded-xl p-8 flex flex-col gap-8 flex-1 max-w-md" onsubmit="return false">
     <div class="flex flex-col gap-2">
      <label class="text-sm font-normal text-black" for="biayaProduksi">
       Biaya Produksi (Rp)
      </label>
      <input class="border border-gray-400 rounded-lg px-4 py-2 text-black text-sm focus:outline-none focus:ring-2 focus:ring-orange-500" id="biayaProduksi" placeholder="" type="number"/>
     </div>
     <div class="flex flex-col gap-2">
      <label class="text-sm font-normal text-black" for="marginKeuntungan">
       Margin Keuntungan (%)
      </label>
      <input class="border border-gray-400 rounded-lg px-4 py-2 text-black text-sm focus:outline-none focus:ring-2 focus:ring-orange-500" id="marginKeuntungan" placeholder="" type="number"/>
     </div>
     <button class="self-start bg-[#f97316] text-white font-semibold text-sm rounded-lg px-8 py-3 hover:bg-[#ea6b0f] transition" type="submit">
      Hitung
     </button>
    </form>
    <section class="bg-white rounded-xl p-8 flex flex-col md:flex-row md:justify-between md:items-start gap-6 flex-1 max-w-2xl">
     <div class="flex flex-col gap-4 max-w-xs">
      <h2 class="font-bold text-black text-base">
       Hasil
      </h2>
      <div>
       <p class="font-bold text-black text-sm mb-1">
        Harga Jual
       </p>
       <p class="text-black text-sm">
        Rp
       </p>
      </div>
      <div>
       <p class="font-bold text-black text-sm mb-1">
        Biaya Produksi
       </p>
       <p class="text-black text-sm">
        .. %
       </p>
      </div>
      <div>
       <p class="font-bold text-black text-sm mb-1">
        Margin Keuntungan
       </p>
       <p class="text-black text-sm">
        .. %
       </p>
      </div>
     </div>
     <div class="flex flex-col justify-between items-end gap-4">
      <img alt="Pie chart showing Komposisi Harga Jual ($5750) with Margin Keuntungan 13.04% and Biaya Produksi 86.96%" class="w-[200px] h-[200px] object-contain" height="200" src="https://storage.googleapis.com/a1aa/image/2190dcf4-d70a-4782-4338-5017d93c3e88.jpg" width="200"/>
      <button class="bg-[#f97316] text-white font-semibold text-sm rounded-lg px-8 py-3 hover:bg-[#ea6b0f] transition">
       Unduh
      </button>
     </div>
    </section>
   </section>
  </main>
  <footer class="bg-[#2e3273] text-white py-12 px-6 md:px-16 lg:px-24">
   <div class="max-w-[1200px] mx-auto flex flex-col md:flex-row justify-between gap-10 md:gap-0">
    <div class="flex flex-col gap-6 max-w-xs">
     <div class="flex items-center gap-3">
      <img alt="NaZMaLogy logo icon" class="w-8 h-8 object-contain" height="32" src="https://storage.googleapis.com/a1aa/image/5b684367-5d01-4e94-5f48-82bce4cfbd45.jpg" width="32"/>
      <span class="font-semibold text-lg">
       NaZMaLogy
      </span>
     </div>
     <p class="text-sm font-normal leading-relaxed">
      Kalkulator Pintar NaZMalogy:
      <br/>
      Inovasi Analisis Bisnis
      <br/>
      yang Membantumu Menentukan Kelayakan Usaha
      <br/>
      Secara Cepat dan Akurat.
     </p>
    </div>
    <div class="flex flex-col gap-6 max-w-xs">
     <h3 class="font-bold text-sm">
      Kontak Kami
     </h3>
     <div class="flex gap-4 text-white text-lg">
      <a aria-label="Email" href="#">
       <i class="fas fa-envelope">
       </i>
      </a>
      <a aria-label="Facebook" href="#">
       <i class="fab fa-facebook-f">
       </i>
      </a>
      <a aria-label="Instagram" href="#">
       <i class="fab fa-instagram">
       </i>
      </a>
      <a aria-label="LinkedIn" href="#">
       <i class="fab fa-linkedin-in">
       </i>
      </a>
      <a aria-label="YouTube" href="#">
       <i class="fab fa-youtube">
       </i>
      </a>
      <a aria-label="TikTok" href="#">
       <i class="fab fa-tiktok">
       </i>
      </a>
     </div>
    </div>
   </div>
   <p class="text-center text-sm mt-10 font-normal">
    © Copyright 2025. – Develop By
    <a class="underline hover:text-[#f97316] transition" href="#">
     NaZMa Office
    </a>
    .
   </p>
  </footer>
 </body>
</html>
