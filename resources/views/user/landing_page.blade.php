<html lang="en">
  <head>
    <meta charset="utf-8"/>
    <meta content="width=device-width, initial-scale=1" name="viewport"/>
    @vite(['resources/css/landing.css','resources/js/app.js'])
    <title>
     AKUNaZMa
    </title>
    <script src="https://cdn.tailwindcss.com">
    </script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" rel="stylesheet"/>
    <link href="https://fonts.googleapis.com/css2?family=Poppins&amp;display=swap" rel="stylesheet"/>
  
   </head>
 <body class="bg-[#f3f7ff] min-h-screen flex flex-col justify-between">
  <!-- Navbar -->

  <x-navbar></x-navbar>
  
  <!-- Hero Section -->
  <!-- filepath: d:\APK\xampp\htdocs\kalkulator\resources\views\user\landing_page.blade.php -->
<section aria-label="Hero section with background image of hands on laptop and tablet with tax documents overlay" class="relative w-full h-screen">
   <img alt="Background image showing hands typing on a laptop and a tablet with transparent tax document icons floating above" class="absolute inset-0 w-full h-full object-cover" src="https://storage.googleapis.com/a1aa/image/46a9f8a4-d959-4f0e-6176-a75bf8132037.jpg"/>
   <div class="absolute inset-0 bg-black bg-opacity-60 flex flex-col justify-center px-6 sm:px-12 max-w-7xl mx-auto">
      <h1 class="text-white font-bold text-lg sm:text-xl max-w-md leading-tight ml-8 sm:ml-16">
         Kalkulator Pintar
         <br/>
         Membantu Menganalisis Kelayakan Usaha Anda
      </h1>
      <button class="mt-6 bg-[#2e348a] text-white font-semibold text-sm rounded-lg px-5 py-2 w-max ml-8 sm:ml-16" type="button">
         Daftar
      </button>
   </div>
</section>
  <!-- Business Types Section -->
  <section class="max-w-7xl mx-auto mt-16 px-6 sm:px-12">
   <h2 class="font-bold text-black text-lg mb-8">
    Tersedia untuk beberapa jenis usaha
   </h2>
   <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-4 gap-6">
    <!-- Fesyen -->
    <div class="bg-white rounded-xl p-6 text-center">
     <div class="inline-block bg-[#2e348a] rounded-md p-3 mb-4">
      <img alt="Icon representing fashion with a stylized flower shape in white on dark blue background" class="w-8 h-8" height="32" src="https://storage.googleapis.com/a1aa/image/f20c470b-125b-4c43-67ba-c65ba6c4f35f.jpg" width="32"/>
     </div>
     <h3 class="font-bold text-black mb-2">
      Fesyen
     </h3>
     <p class="text-xs text-gray-600 leading-relaxed">
      Usaha yang berfokus pada pakaian, sepatu, dan aksesori gaya hidup
     </p>
    </div>
    <!-- Kuliner -->
    <div class="bg-white rounded-xl p-6 text-center">
     <div class="inline-block bg-[#2e348a] rounded-md p-3 mb-4">
      <img alt="Icon representing culinary with fork and spoon in white on dark blue background" class="w-8 h-8" height="32" src="https://storage.googleapis.com/a1aa/image/0625f9b3-1f51-42a4-4dd7-dd29f811b13e.jpg" width="32"/>
     </div>
     <h3 class="font-bold text-black mb-2">
      Kuliner
     </h3>
     <p class="text-xs text-gray-600 leading-relaxed">
      Usaha di bidang makanan, minuman, dan layanan kuliner
     </p>
    </div>
    <!-- Jasa -->
    <div class="bg-white rounded-xl p-6 text-center">
     <div class="inline-block bg-[#2e348a] rounded-md p-3 mb-4">
      <img alt="Icon representing services with a white heart and handshake symbol on dark blue background" class="w-8 h-8" height="32" src="https://storage.googleapis.com/a1aa/image/4c0981c2-3d6f-4721-bdb3-28ec3bd597f2.jpg" width="32"/>
     </div>
     <h3 class="font-bold text-black mb-2">
      Jasa
     </h3>
     <p class="text-xs text-gray-600 leading-relaxed">
      Usaha yang menawarkan layanan atau keahlian untuk memenuhi kebutuhan
     </p>
    </div>
    <!-- Kerajinan -->
    <div class="bg-white rounded-xl p-6 text-center">
     <div class="inline-block bg-[#2e348a] rounded-md p-3 mb-4">
      <img alt="Icon representing crafts with white cube blocks stacked on dark blue background" class="w-8 h-8" height="32" src="https://storage.googleapis.com/a1aa/image/001ea0a2-8402-46fe-8f46-108a6f041b3d.jpg" width="32"/>
     </div>
     <h3 class="font-bold text-black mb-2">
      Kerajinan
     </h3>
     <p class="text-xs text-gray-600 leading-relaxed">
      Usaha yang mengubah kreativitas menjadi produk kerajinan bernilai
     </p>
    </div>
   </div>
   <div class="flex justify-center mt-10">
    <button class="border border-black rounded-full px-6 py-2 text-xs font-bold hover:bg-gray-100" type="button">
     Coba Sekarang
    </button>
   </div>
  </section>
  <!-- Kalkulator Pintar Section -->
  <section class="max-w-7xl mx-auto mt-16 px-6 sm:px-12 flex flex-col md:flex-row items-center md:items-stretch gap-6">
   <div class="bg-[#2e348a] rounded-3xl p-8 flex flex-col justify-center max-w-md text-white relative" style="min-width: 320px;">
    <div class="flex justify-between items-start">
     <h3 class="font-bold text-lg leading-snug max-w-[70%]">
      KALKULATOR PINTAR
     </h3>
     <img alt="White calculator icon on dark blue background" class="w-12 h-12" height="48" src="https://storage.googleapis.com/a1aa/image/1a335f5a-0fac-4fb1-3332-fb67caff7c51.jpg" width="48"/>
    </div>
    <p class="mt-4 text-sm leading-relaxed max-w-[90%]">
     Membantu menganalisis dan mengelola keuangan usaha Anda secara cepat
        dan efisien, agar tetap sehat dan menguntungkan.
    </p>
   </div>
   <img alt="Person holding a glowing lightbulb with stacks of coins and a notebook on a table in warm sunlight" class="rounded-xl w-full md:w-auto object-cover flex-1" height="280" src="https://storage.googleapis.com/a1aa/image/7600f4b0-eabe-4220-9b80-2769ffd10f7f.jpg" width="600"/>
  </section>
  <!-- Footer -->
  <footer class="bg-[#2e348a] mt-16 py-10 px-6 sm:px-12 text-white">
   <div class="max-w-7xl mx-auto flex flex-col md:flex-row justify-between gap-10">
    <div class="max-w-xs">
     <div class="flex items-center space-x-2 mb-4">
      <img alt="NaZMaLogy logo with stylized N and L in white" class="w-6 h-6" height="24" src="https://storage.googleapis.com/a1aa/image/49eada91-e04e-49ea-a313-ced85f615e1a.jpg" width="24"/>
      <span class="font-bold text-base">
       NaZMaLogy
      </span>
     </div>
     <p class="text-xs leading-tight">
      Kalkulator Pintar NaZMalogy:
      <br/>
      Inovasi Analisis Bisnis
      <br/>
      yang Membantumu Menentukan Kelayakan Usaha
      <br/>
      Secara Cepat dan Akurat.
     </p>
    </div>
    <div>
     <h4 class="font-bold text-sm mb-3">
      Kontak Kami
     </h4>
     <div class="flex space-x-3 text-xs">
      <a aria-label="Email" class="hover:text-gray-300" href="#">
       <i class="fas fa-envelope">
       </i>
      </a>
      <a aria-label="Facebook" class="hover:text-gray-300" href="#">
       <i class="fab fa-facebook-f">
       </i>
      </a>
      <a aria-label="Instagram" class="hover:text-gray-300" href="#">
       <i class="fab fa-instagram">
       </i>
      </a>
      <a aria-label="LinkedIn" class="hover:text-gray-300" href="#">
       <i class="fab fa-linkedin-in">
       </i>
      </a>
      <a aria-label="YouTube" class="hover:text-gray-300" href="#">
       <i class="fab fa-youtube">
       </i>
      </a>
      <a aria-label="TikTok" class="hover:text-gray-300" href="#">
       <i class="fab fa-tiktok">
       </i>
      </a>
     </div>
    </div>
   </div>
   <p class="text-center text-xs mt-8">
    © Copyright 2025. - Develop By
    <a class="underline hover:text-gray-300" href="#">
     NaZMa Office
    </a>
    .
   </p>
  </footer>
 </body>
</html>
