<html lang="en">
 <head>
  <meta charset="utf-8"/>
  <meta content="width=device-width, initial-scale=1" name="viewport"/>
  @vite(['resources/css/register.css','resources/js/app.js'])
  <title>
   AKUNaZMa
  </title>
  <script src="https://cdn.tailwindcss.com">
  </script>
  <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" rel="stylesheet"/>
  <link href="https://fonts.googleapis.com/css2?family=Poppins&amp;display=swap" rel="stylesheet"/>
 </head>
 <body class="bg-[#f3f7ff] min-h-screen flex flex-col justify-between">
  <!-- Header -->
  <x-navbar></x-navbar>

  <main class="flex-grow flex items-center justify-center px-4 mt-12">
   <form aria-label="Registration form" class="bg-white rounded-xl max-w-md w-full p-6 sm:p-8 space-y-4">
    <h1 class="font-semibold text-center text-lg">
     Selamat Datang!
    </h1>
    <input class="w-full border border-black rounded-lg px-4 py-2 text-sm focus:outline-none focus:ring-2 focus:ring-orange-500" placeholder="Nama Lengkap" required="" type="text"/>
    <input class="w-full border border-black rounded-lg px-4 py-2 text-sm focus:outline-none focus:ring-2 focus:ring-orange-500" placeholder="Jenis Pekerjaan" required="" type="text"/>
    <input class="w-full border border-black rounded-lg px-4 py-2 text-sm focus:outline-none focus:ring-2 focus:ring-orange-500" placeholder="Email" required="" type="email"/>
    <input class="w-full border border-black rounded-lg px-4 py-2 text-sm focus:outline-none focus:ring-2 focus:ring-orange-500" placeholder="Kata Sandi" required="" type="password"/>
    <button class="w-full bg-orange-500 text-white rounded-lg py-2 text-sm font-medium hover:bg-orange-600 transition" type="submit">
     Daftar Sekarang
    </button>
    <p class="text-center text-black text-sm font-semibold mt-4">
      Sudah punya akun? 
      <a href="login.html" class="text-[#F97316] hover:underline">Masuk</a>
  </p>
   </form>
  </main>
  <footer class="bg-[#2e3271] text-white mt-20 py-10">
   <div class="max-w-5xl mx-auto px-4 sm:px-6 flex flex-col md:flex-row md:justify-between md:items-start gap-8 md:gap-0">
    <div class="flex flex-col space-y-4 max-w-xs">
     <div class="flex items-center space-x-2">
      <img alt="NaZMaLogy logo icon with stylized N in white" class="w-6 h-6" height="24" src="https://storage.googleapis.com/a1aa/image/c35aa89d-dc7c-4008-9d22-014fa63a1119.jpg" width="24"/>
      <span class="font-semibold text-lg select-none">
       AKUNaZMa
      </span>
     </div>
     <p class="text-sm leading-relaxed">
      Kalkulator Pintar NaZMalogy:
      <br/>
      Inovasi Analisis Bisnis
      <br/>
      yang Membantumu Menentukan Kelayakan Usaha
      <br/>
      Secara Cepat dan Akurat.
     </p>
    </div>
    <div class="flex flex-col space-y-3">
     <h3 class="font-semibold text-sm">
      Kontak Kami
     </h3>
     <div class="flex space-x-3 text-white text-lg">
      <a aria-label="Email" class="hover:text-orange-500" href="#">
       <i class="fas fa-envelope">
       </i>
      </a>
      <a aria-label="Facebook" class="hover:text-orange-500" href="#">
       <i class="fab fa-facebook-f">
       </i>
      </a>
      <a aria-label="Instagram" class="hover:text-orange-500" href="#">
       <i class="fab fa-instagram">
       </i>
      </a>
      <a aria-label="LinkedIn" class="hover:text-orange-500" href="#">
       <i class="fab fa-linkedin-in">
       </i>
      </a>
      <a aria-label="YouTube" class="hover:text-orange-500" href="#">
       <i class="fab fa-youtube">
       </i>
      </a>
      <a aria-label="TikTok" class="hover:text-orange-500" href="#">
       <i class="fab fa-tiktok">
       </i>
      </a>
     </div>
    </div>
   </div>
   <p class="text-center text-xs mt-10 px-4 sm:px-6">
    © Copyright 2025. – Develop By
    <a class="underline hover:text-orange-500 font-semibold" href="#">
     NaZMa Office
    </a>
    .
   </p>
  </footer>
  <script>
  // Ambil elemen header
  const header = document.getElementById('sticky-header');

  // Tambahkan event listener untuk scroll
  window.addEventListener('scroll', () => {
    if (window.scrollY > 50) { // Jika scroll lebih dari 50px
      header.classList.add('sticky');
    } else {
      header.classList.remove('sticky');
    }
  });
</script>
 </body>
</html>