@vite(['resources/css/register.css','resources/js/app.js'])

  <!-- Header -->
  <x-navbar></x-navbar>

    <main class="flex-grow flex items-center justify-center px-4 mt-12">
      <form aria-label="Registration form" class="bg-white rounded-xl max-w-md w-full p-6 sm:p-8 space-y-4" method="POST" action="{{ url('/register') }}">


          @if ($errors->any())
              <div class="bg-red-100 text-red-700 p-4 rounded-md mb-4">
                  <ul>
                      @foreach ($errors->all() as $error)
                          <li>{{ $error }}</li>
                      @endforeach
                  </ul>
              </div>
          @endif



        <h1 class="font-semibold text-center text-lg">
          Selamat Datang!
        </h1>
        @csrf
        <input class="w-full border border-black rounded-lg px-4 py-2 text-sm focus:outline-none focus:ring-2 focus:ring-orange-500" placeholder="Nama Lengkap" required="" type="text" name="nama" value="{{ old('nama') }}"/>
        <input class="w-full border border-black rounded-lg px-4 py-2 text-sm focus:outline-none focus:ring-2 focus:ring-orange-500" placeholder="Email" required="" type="email" name="email" value="{{ old('email') }}"/>
        <input class="w-full border border-black rounded-lg px-4 py-2 text-sm focus:outline-none focus:ring-2 focus:ring-orange-500" placeholder="Kata Sandi" required="" type="password" name="kata_sandi" value="{{ old('kata_sandi') }}"/>
        <button class="w-full bg-orange-500 text-white rounded-lg py-2 text-sm font-medium hover:bg-orange-600 transition" type="submit">
          Daftar Sekarang
        </button>

        <a href="{{ route('google.login') }}" class="bg-blue-500 text-white font-semibold rounded-lg py-2 px-4 hover:bg-blue-600 transition-colors">
          Daftar dengan Google
        </a>

        <p class="text-center text-black text-sm font-semibold mt-4">
          Sudah punya akun? 
          <a href="/login" class="text-[#F97316] hover:underline">Masuk</a>
        </p>
      </form>
    </main>

  <!-- Footer -->
  <x-footer></x-footer>