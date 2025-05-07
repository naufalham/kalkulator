<nav class="flex flex-wrap justify-center sm:justify-end space-x-6 font-semibold text-black text-sm w-full sm:w-auto">
    <a class="hover:underline" href="/">Beranda</a>
    <a class="hover:underline" href="/berita">Berita</a>
    <a class="hover:underline" href="/kalkulator">Kalkulator</a>
    <a class="hover:underline" href="/usaha">Usaha</a>
    @auth
        <a class="text-[#F97316] hover:underline" href="/profil">
            {{ Auth::user()->nama }}
        </a>
        <form method="POST" action="{{ route('logout') }}" class="inline">
            @csrf
            <button type="submit" class="text-[#F97316] hover:underline">
                Logout
            </button>
        </form>
    @else
        <a class="text-[#F97316] hover:underline" href="/login">
          Masuk
        </a>
    @endauth
</nav>