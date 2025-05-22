<nav x-data="{ open: false }" class="fixed top-0 left-0 right-0 z-50 flex items-center justify-between h-16 px-4 sm:px-8 md:px-12 bg-white shadow">
    <div class="flex items-center space-x-2">
        <img alt="NaZMaLogy logo" class="w-8 h-8" height="32" src="{{ asset('asset/logo.png') }}"/>
        <span class="font-black text-xl text-black select-none">
            AKUNaZMa
        </span>
    </div>
    <!-- Hamburger button -->
    <button @click="open = !open" class="md:hidden focus:outline-none">
        <svg class="w-7 h-7 text-[#F97316]" fill="none" stroke="currentColor" viewBox="0 0 24 24">
            <path :class="{'hidden': open, 'inline-flex': !open }" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"/>
            <path :class="{'inline-flex': open, 'hidden': !open }" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"/>
        </svg>
    </button>
    <!-- Menu -->
    <ul class="hidden md:flex space-x-10 font-semibold text-black text-sm items-center">
        <li><a class="hover:underline" href="/">Beranda</a></li>
        <li><a class="hover:underline" href="{{ route ('user.berita') }}">Berita</a></li>
        <li><a class="hover:underline" href="/kalkulator">Kalkulator</a></li>
        <li><a class="hover:underline" href="{{ route ('user.usaha.index') }}">Usaha</a></li>

        @auth
        <li>
            <a class="text-[#F97316] hover:underline flex items-center gap-1" href="{{ route('user.edit') }}">
                    <svg class="w-4 h-4 text-[#F97316]" fill="currentColor" viewBox="0 0 24 24">
                        <path d="M12 12c2.7 0 4.5-1.8 4.5-4.5S14.7 3 12 3 7.5 4.8 7.5 7.5 9.3 12 12 12zm0 2c-3 0-9 1.5-9 4.5V21h18v-2.5c0-3-6-4.5-9-4.5z"/>
                    </svg>
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
    <div x-show="open" @click.away="open = false" class="md:hidden absolute top-16 left-0 w-full bg-white shadow-lg border-t z-50">
        <ul class="flex flex-col py-4 px-6 space-y-4 font-semibold text-black text-base">
            <li><a class="hover:underline" href="/">Beranda</a></li>
            <li><a class="hover:underline" href="{{ route ('user.berita') }}">Berita</a></li>
            <li><a class="hover:underline" href="/kalkulator">Kalkulator</a></li>
            <li><a class="hover:underline" href="{{ route ('user.usaha.index') }}">Usaha</a></li>
            @auth
            <li>
                <a class="text-[#F97316] hover:underline" href="{{ route('user.edit') }}">
                    {{ Auth::user()->name }}
                </a>
            </li>
            <li>
                <form method="POST" action="{{ route('logout') }}">
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
    </div>
</nav>

<!-- Tambahkan Alpine.js CDN di layout utama jika belum ada -->
<script src="//unpkg.com/alpinejs" defer></script>