<html lang="en">
 <head>
  <meta charset="utf-8"/>
  <meta content="width=device-width, initial-scale=1" name="viewport"/>
  @vite(['resources/css/login.css','resources/js/app.js'])
  <title>
   AKUNaZMa
  </title>
  <script src="https://cdn.tailwindcss.com">
  </script>
  <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" rel="stylesheet"/>
  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;700&amp;display=swap" rel="stylesheet"/>

 </head>
 <body class="bg-[#F5F8FF] min-h-screen flex flex-col">
  <!-- Header -->
   <x-navbar></x-navbar>

  <!-- Hero Section -->
  <section aria-label="Hero section with full-page background image" class="relative min-h-screen -mt-[64px] pt-[64px] w-full bg-cover bg-center" style="background-image: url('{{ asset('asset/landing.jpg') }}');">
    <div class="absolute inset-0 bg-black bg-opacity-60 flex flex-col justify-center items-center text-center px-6 sm:px-12">
        <h1 class="text-white font-bold text-2xl sm:text-4xl leading-tight">
            Kalkulator Pintar
            <br/>
            Membantu Menganalisis Kelayakan Usaha Anda
        </h1>
        <button class="mt-6 bg-[#2e348a] text-white font-semibold rounded-lg px-5 py-3 text-sm sm:text-base hover:bg-[#252a6f] transition" type="button">
            Daftar
        </button>
    </div>
</section>
  <!-- Business Types Section -->
  <section class="max-w-6xl mx-auto px-6 sm:px-12 mt-16">
   <h2 class="font-bold text-[#1a1a1a] text-lg mb-8">
    Tersedia untuk beberapa jenis usaha
   </h2>
   <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-4 gap-6 max-w-5xl mx-auto" role="list">
    <!-- Fesyen -->
    <article class="bg-white rounded-2xl p-6 flex flex-col items-center text-center" role="listitem">
     <div aria-hidden="true" class="bg-[#2e348a] rounded-md p-3 mb-4 inline-flex items-center justify-center" style="width:48px; height:48px">
         <img alt="Icon representing fashion" class="w-6 h-6" height="32" src="{{ asset('icons/fesyen.png') }}" width="24"/>
     </div>
     <h3 class="font-bold text-sm mb-1">
      Fesyen
     </h3>
     <p class="text-xs text-[#4a4a4a] leading-relaxed">
      Usaha yang berfokus pada pakaian, sepatu, dan aksesoris gaya hidup
     </p>
    </article>
    <!-- Kuliner -->
    <article class="bg-white rounded-2xl p-6 flex flex-col items-center text-center" role="listitem">
     <div aria-hidden="true" class="bg-[#2e348a] rounded-md p-3 mb-4 inline-flex items-center justify-center" style="width:48px; height:48px">
      <img alt="Icon representing fashion" class="w-6 h-6" height="32" src="{{ asset('icons/kuliner.png') }}" width="24"/>
     </div>
     <h3 class="font-bold text-sm mb-1">
      Kuliner
     </h3>
     <p class="text-xs text-[#4a4a4a] leading-relaxed">
      Usaha di bidang makanan, minuman, dan layanan kuliner
     </p>
    </article>
    <!-- Jasa -->
    <article class="bg-white rounded-2xl p-6 flex flex-col items-center text-center" role="listitem">
     <div aria-hidden="true" class="bg-[#2e348a] rounded-md p-3 mb-4 inline-flex items-center justify-center" style="width:48px; height:48px">
     <img alt="Icon representing fashion" class="w-6 h-6" height="32" src="{{ asset('icons/jasa.png') }}" width="24"/>
     </div>
     <h3 class="font-bold text-sm mb-1">
      Jasa
     </h3>
     <p class="text-xs text-[#4a4a4a] leading-relaxed">
      Usaha yang menawarkan layanan atau keahlian untuk memenuhi kebutuhan
     </p>
    </article>
    <!-- Kerajinan -->
    <article class="bg-white rounded-2xl p-6 flex flex-col items-center text-center" role="listitem">
     <div aria-hidden="true" class="bg-[#2e348a] rounded-md p-3 mb-4 inline-flex items-center justify-center" style="width:48px; height:48px">
     <img alt="Icon representing fashion" class="w-6 h-6" height="32" src="{{ asset('icons/kerajinan.png') }}" width="24"/>
     </div>
     <h3 class="font-bold text-sm mb-1">
      Kerajinan
     </h3>
     <p class="text-xs text-[#4a4a4a] leading-relaxed">
      Usaha yang mengubah kreativitas menjadi produk kerajinan bernilai
     </p>
    </article>
   </div>
   <div class="flex justify-center mt-10">
      <a href="/usaha">
         <button class="border bg-[#2e348a] text-white font-semibold rounded-lg px-6 py-2 text-sm sm:text-base hover:bg-[#252a6f] transition" type="button">
            Coba Sekarang
         </button>
      </a>
   </div>
  </section>
  <!-- Calculator Info Section -->
  <section class="max-w-6xl mx-auto px-6 sm:px-12 mt-16 flex flex-col md:flex-row items-center md:items-stretch gap-4">
    <div aria-label="Calculator info with icon" class="bg-[#2e348a] rounded-3xl p-6 flex flex-col justify-center flex-1 max-w-md text-white relative">
        <div class="flex items-center justify-between mb-3">
            <h3 class="font-bold text-base leading-snug">
                KALKULATOR PINTAR
            </h3>
        </div>
        <p class="text-xs leading-relaxed">
            Membantu menganalisis dan mengelola keuangan usaha Anda secara cepat
            dan efisien, agar tetap sehat dan menguntungkan.
        </p>
    </div>
    <div class="flex-1 max-w-sm">
        <img class="rounded-3xl w-full h-auto object-cover" height="250" loading="lazy" src="{{ asset('asset/lampu.jpeg') }}" width="400"/>
    </div>
</section>
  <!-- Footer -->
  <footer class="bg-[#2e348a] mt-16 text-white py-10">
   <div class="max-w-6xl mx-auto px-6 sm:px-12 flex flex-col md:flex-row justify-between gap-10">
    <div class="flex flex-col max-w-xs gap-4">
     <div class="flex items-center gap-2 font-bold text-lg select-none">
      <img alt="NaZMaLogy logo icon, stylized N with blue and orange colors" class="w-6 h-6" height="24" loading="lazy" src="https://storage.googleapis.com/a1aa/image/26d3893d-3c39-4f59-7423-b5b931be260a.jpg" width="24"/>
      NaZMaLogy
     </div>
     <p class="text-xs leading-tight max-w-[280px]">
      Kalkulator Pintar NaZMalogy:
      <br/>
      Inovasi Analisis Bisnis
      <br/>
      yang Membantumu Menentukan Kelayakan Usaha
      <br/>
      Secara Cepat dan Akurat.
     </p>
    </div>
    <div class="flex flex-col gap-3 max-w-xs">
     <h4 class="font-bold text-sm">
      Kontak Kami
     </h4>
     <div class="flex gap-3 text-xs">
      <a aria-label="Email contact" class="hover:text-gray-300 transition" href="#">
       <i class="fas fa-envelope">
       </i>
      </a>
      <a aria-label="Facebook" class="hover:text-gray-300 transition" href="#">
       <i class="fab fa-facebook-f">
       </i>
      </a>
      <a aria-label="Instagram" class="hover:text-gray-300 transition" href="#">
       <i class="fab fa-instagram">
       </i>
      </a>
      <a aria-label="LinkedIn" class="hover:text-gray-300 transition" href="#">
       <i class="fab fa-linkedin-in">
       </i>
      </a>
      <a aria-label="YouTube" class="hover:text-gray-300 transition" href="#">
       <i class="fab fa-youtube">
       </i>
      </a>
      <a aria-label="TikTok" class="hover:text-gray-300 transition" href="#">
       <i class="fab fa-tiktok">
       </i>
      </a>
     </div>
    </div>
   </div>
   <div class="text-center text-xs mt-8 text-white/80">
    © Copyright 2025. – Develop By
    <a class="underline hover:text-white transition" href="#">
     NaZMa Office
    </a>
    .
   </div>
  </footer>
 </body>
</html>
