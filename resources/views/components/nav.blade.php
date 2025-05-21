<nav class="fixed top-0 left-0 right-0 z-50 flex items-center justify-between h-16 px-12 bg-white shadow">
    <div class="flex items-center space-x-2">
        <img alt="NaZMaLogy logo" class="w-8 h-8" height="32" src="{{ asset('asset/logo.png') }}"/>
        <span class="font-black text-xl text-black select-none">
            AKUNaZMa
        </span>
    </div>
    <ul class="hidden md:flex space-x-10 font-semibold text-black text-sm">
        <li><a class="hover:underline" href="/">Beranda</a></li>
        <li><a class="hover:underline" href="/berita">Berita</a></li>
        <li><a class="hover:underline" href="/kalkulator">Kalkulator</a></li>
        <li><a class="hover:underline" href="{{ route ('user.usaha.index') }}">Usaha</a></li>

        @auth
        <li>
            <a class="text-[#F97316] hover:underline" href="/profil">
                {{ Auth::user()->name }}
            </a>
        </li>
        <li>
            <form method="POST" action="{{ route('logout') }}" class="contents">
                @csrf
                <button type="submit" class="text-[#F97316] inline-flex items-center gap-1 hover:underline">
                    <i class="fas fa-sign-out-alt"></i>
                    Logout
                </button>
            </form>
        </li>
        @else
        <li>
            <a href="/login" class="text-[#F97316] hover:underline">Masuk</a>
        </li>
        @endauth
    </ul>
</nav>
