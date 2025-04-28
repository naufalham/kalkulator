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
      <a href="/login" class="text-[#F97316] hover:underline">Masuk</a>
  </p>
   </form>
  </main>
  <!-- Footer -->
  <x-footer></x-footer>
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