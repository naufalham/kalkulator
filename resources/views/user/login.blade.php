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
  </head>
  <body class="bg-[#f3f7ff] min-h-screen flex flex-col justify-between">

    <!-- Header -->
    <x-navbar></x-navbar>
  
    <!-- Main content -->
    <main class="flex-grow flex justify-center items-start mt-12 px-4 sm:px-6">
      <section aria-label="Form login NaZMaLogy" class="bg-white rounded-2xl max-w-md w-full p-6 sm:p-8 shadow-sm">
        <h1 class="font-semibold text-center text-lg">
          Selamat Datang!
        </h1>
        <form class="flex flex-col space-y-5" method="POST" action="{{ route('login.post') }}">

          @if ($errors->any())
              <div class="bg-red-100 text-red-700 p-4 rounded-md mb-4">
                  <ul>
                      @foreach ($errors->all() as $error)
                          <li>{{ $error }}</li>
                      @endforeach
                  </ul>
              </div>
          @endif
          @csrf
          <input class="w-full border border-black rounded-lg px-4 py-2 text-sm focus:outline-none focus:ring-2 focus:ring-orange-500" placeholder="Email" required="" type="email" name="email" value="{{ old('email') }}"/>
          <input class="w-full border border-black rounded-lg px-4 py-2 text-sm focus:outline-none focus:ring-2 focus:ring-orange-500" placeholder="Kata Sandi" required="" type="password" name="kata_sandi" value="{{ old('kata_sandi') }}"/>
          <button class="bg-[#F97316] text-white font-semibold rounded-lg py-3 mt-2 hover:bg-[#e06f11] transition-colors" type="submit">
            Masuk
          </button>

          <a href="{{ route('google.login') }}" class="bg-blue-500 text-white font-semibold rounded-lg py-2 px-4 hover:bg-blue-600 transition-colors">
            Login dengan Google
          </a>

        </form>
        <p class="text-center text-black text-sm font-semibold mt-4">
          Belum punya akun? 
        <a href="/register" class="text-[#F97316] hover:underline">Daftar Sekarang</a>
        </p>
      </section>
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
  </body>
</html>