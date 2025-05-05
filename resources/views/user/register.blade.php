@vite(['resources/css/register.css','resources/js/app.js'])

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