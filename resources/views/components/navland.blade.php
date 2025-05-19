<nav class="flex items-center justify-between h-16 w-full max-w-6xl mx-auto px-6 bg-white rounded-xl mt-6 shadow">
    <!-- Logo -->
    <div class="flex items-center space-x-2">
        <img alt="NaZMaLogy logo" class="w-8 h-8" src="https://storage.googleapis.com/a1aa/image/9eec60c9-c16f-4341-d23c-c71282f0d260.jpg"/>
        <span class="font-black text-xl text-black select-none">NaZMaLogy</span>
    </div>
    <!-- Menu tengah -->
    <ul class="flex space-x-10 font-semibold text-black text-sm">
        <li><a class="hover:underline" href="/">Beranda</a></li>
        <li><a class="hover:underline" href="/berita">Berita</a></li>
        <li><a class="hover:underline" href="/kalkulator">Kalkulator</a></li>
        <li><a class="hover:underline" href="/usaha">Usaha</a></li>
    </ul>
    <!-- Profil & Logout kanan -->
    <div class="flex items-center space-x-4">
        <a class="text-[#F97316] hover:underline font-semibold" href="/profil">
            {{ Auth::user()->name ?? 'Profil' }}
        </a>
        <form method="POST" action="{{ route('logout') }}">
            @csrf
            <button type="submit" class="text-[#F97316] inline-flex items-center gap-1 hover:underline">
                <i class="fas fa-sign-out-alt"></i>
                Logout
            </button>
        </form>
    </div>
</nav>