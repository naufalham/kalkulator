@vite(['resources/css/login.css','resources/js/app.js'])
<!-- Header -->
<x-navbar></x-navbar>
 
 <!-- Main content -->
<main class="flex-grow flex justify-center items-start mt-12 px-4 sm:px-6 pt-20">
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
      <input class="w-full border border-black rounded-lg px-4 py-2 text-sm focus:outline-none focus:ring-2 focus:ring-orange-500" placeholder="Kata Sandi" required="" type="password" name="password" value="{{ old('password') }}"/>
      <button class="bg-[#F97316] text-white font-semibold rounded-lg py-3 hover:bg-[#e06f11] transition-colors" type="submit">
        Masuk
      </button>
          
      <a href="{{ route('google.login') }}"
        class="flex items-center justify-center gap-2 bg-white text-gray-700 border rounded-lg shadow-md py-2 px-4 hover:bg-gray-100 transition-colors">
        <img src="https://www.gstatic.com/firebasejs/ui/2.0.0/images/auth/google.svg" alt="Google" class="w-5 h-5">
        <span class="font-medium">Login dengan Google</span>
      </a>

    </form>

    <p class="text-center text-black text-sm font-semibold mt-4">
        Belum punya akun? 
      <a href="/register" class="text-[#F97316] hover:underline">Daftar Sekarang</a>
    </p>
  </section>
</main>

<x-wa />

<!-- Footer -->
<div class="mt-10"></div>
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