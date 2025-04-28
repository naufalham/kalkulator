<html lang="id">
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
  <link href="https://fonts.googleapis.com/css2?family=Inter&amp;display=swap" rel="stylesheet"/>
  <link href="css/login.css" rel="stylesheet"/> 
 </head>
 <body class="bg-[#F4F8FF] min-h-screen flex flex-col">
  <!-- Header -->
  <x-navbar></x-navbar>
  
  <!-- Main content -->
  <main class="flex-grow flex justify-center items-start mt-12 px-4 sm:px-6">
   <section aria-label="Form login NaZMaLogy" class="bg-white rounded-2xl max-w-md w-full p-6 sm:p-8 shadow-sm">
    <h1 class="font-semibold text-center text-lg">
        Selamat Datang!
    </h1>
    <form class="flex flex-col space-y-5">
     <input class="border border-black rounded-lg px-4 py-2 text-black text-sm placeholder-black focus:outline-none focus:ring-2 focus:ring-[#F97316]" placeholder="Email" required="" type="email"/>
     <input class="border border-black rounded-lg px-4 py-2 text-black text-sm placeholder-black focus:outline-none focus:ring-2 focus:ring-[#F97316]" placeholder="Kata Sandi" required="" type="password"/>
     <button class="bg-[#F97316] text-white font-semibold rounded-lg py-3 mt-2 hover:bg-[#e06f11] transition-colors" type="submit">
      Masuk
     </button>
    </form>
    <p class="text-center text-black text-sm font-semibold mt-4">
    Belum punya akun? 
    <a href="/register" class="text-[#F97316] hover:underline">Daftar Sekarang</a>
    </p>
   </section>
  </main>
  <!-- Footer -->
  <footer class="bg-[#2F3A8F] text-white mt-20 py-10 px-4 sm:px-6 w-full">
   <div class="max-w-5xl mx-auto flex flex-col md:flex-row md:justify-between md:items-start gap-10 md:gap-0">
    <div class="flex flex-col space-y-4 max-w-xs mx-auto md:mx-0">
     <div class="flex items-center space-x-2">
      <img alt="Logo NaZMaLogy with stylized N and arrow shapes in white on blue background" class="w-6 h-6" height="24" src="https://storage.googleapis.com/a1aa/image/ea8fed56-b39d-45a8-88ed-73a07a0e6e88.jpg" width="24"/>
      <span class="font-semibold text-lg select-none">
       AKUNaZMa
      </span>
     </div>
     <p class="text-sm leading-relaxed text-center md:text-left">
      Kalkulator Pintar NaZMalogy:
      <br/>
      Inovasi Analisis Bisnis
      <br/>
      yang Membantumu Menentukan Kelayakan Usaha
      <br/>
      Secara Cepat dan Akurat.
     </p>
    </div>
    <div class="flex flex-col space-y-3 items-center md:items-start">
     <h2 class="font-semibold text-sm">
      Kontak Kami
     </h2>
     <div class="flex space-x-3 text-white text-lg">
      <a aria-label="Email" href="mailto:contact@example.com">
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
   <p class="text-center text-sm mt-10 px-2">
    © Copyright 2025. – Develop By
    <a class="underline hover:text-gray-300 font-semibold" href="#">
     NaZMa Office
    </a>
    .
   </p>
  </footer>
 </body>
</html>