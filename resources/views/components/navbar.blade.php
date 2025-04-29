<html lang="en">
 <head>
  <meta charset="utf-8"/>
  <meta content="width=device-width, initial-scale=1" name="viewport"/>
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
  <header id="sticky-header" class="bg-white rounded-xl mx-4 sm:mx-6 mt-6 flex flex-col sm:flex-row justify-between items-center px-4 sm:px-6 py-3 max-w-5xl w-full self-center">
    <div class="flex items-center space-x-2 mb-3 sm:mb-0 w-full sm:w-auto justify-center sm:justify-start">
     <img alt="Logo NaZMaLogy with stylized N and arrow shapes in blue and orange" class="w-6 h-6" height="24" src="https://storage.googleapis.com/a1aa/image/1c9ecd82-53dc-4a00-367d-29e7a201a14f.jpg" width="24"/>
     <span class="font-semibold text-lg text-black select-none">
      AKUNaZMa
     </span>
    </div>
    <nav class="flex flex-wrap justify-center sm:justify-end space-x-6 font-semibold text-black text-sm w-full sm:w-auto">
     <a class="hover:underline" href="/landing">
      Beranda
     </a>
     <a class="hover:underline" href="#">
      Kalkulator
     </a>
     <a class="hover:underline" href="/usaha">
      Usaha
     </a>
     <a class="text-[#F97316] hover:underline" href="/login">
      Masuk
     </a>
    </nav>
   </header>


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