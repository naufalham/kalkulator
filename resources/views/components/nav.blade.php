<nav class="flex flex-wrap justify-center sm:justify-end space-x-6 font-semibold text-black text-sm w-full sm:w-auto">
    <a class="{{ Request::is('/') ? 'text-[#F97316]' : '' }} hover:underline" href="/">Beranda</a>
    <a class="{{ Request::is('berita') ? 'text-[#F97316]' : '' }} hover:underline" href="/berita">Berita</a>
    <a class="{{ Request::is('kalkulator') ? 'text-[#F97316]' : '' }} hover:underline" href="/kalkulator">Kalkulator</a>
    <a class="{{ Request::is('usaha') ? 'text-[#F97316]' : '' }} hover:underline" href="/usaha">Usaha</a>
    @auth
        <a class="{{ Request::is('profil') ? 'text-[#F97316]' : '' }} hover:underline" href="/profil">
            {{ Auth::user()->name}}
        </a>
        <form method="POST" action="{{ route('logout') }}" class="inline">
            @csrf
            <button type="submit" class="hover:underline">
                Logout
            </button>
        </form>
    @else
        <a class="{{ Request::is('login') ? 'text-[#F97316]' : '' }} hover:underline" href="/login">
          Masuk
        </a>
    @endauth
</nav>