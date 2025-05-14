<nav>
    <ul class="nav-menu flex flex-wrap justify-center sm:justify-end space-x-6 font-semibold text-black text-sm w-full sm:w-auto">
        <li class="nav-item">
            <a href="/" class="nav-link {{ Request::is('/') ? 'text-[#F97316]' : '' }}">Beranda</a>
        </li>
        <li class="nav-item">
            <a href="/berita" class="nav-link {{ Request::is('berita', 'isi') ? 'text-[#F97316]' : '' }}">Berita</a>
        </li>
        <li class="nav-item">
            <a href="/kalkulator" class="nav-link {{ Request::is('kalkulator', 'kalkulator/modal', 'kalkulator/bep', 'kalkulator/laba', 'kalkulator/penjualan', 'kalkulator/stok') ? 'text-[#F97316]' : '' }}">Kalkulator</a>
        </li>
        <li class="nav-item">
            <a href="/usaha" class="nav-link {{ Request::is('usaha') ? 'text-[#F97316]' : '' }}">Usaha</a>
        </li>
        @auth
            <li class="nav-item">
                <a href="/profil" class="nav-link {{ Request::is('profil') ? 'text-[#F97316]' : '' }}">
                    {{ Auth::user()->nama }}
                </a>
            </li>
            <li class="nav-item">
                <form method="POST" action="{{ route('logout') }}" class="inline">
                    @csrf
                    <button type="submit" class="nav-link hover:underline">
                        Logout
                    </button>
                </form>
            </li>
        @else
            <li class="nav-item">
                <a href="/login" class="nav-link {{ Request::is('login') ? 'text-[#F97316]' : '' }}">Masuk</a>
            </li>
        @endauth
    </ul>
</nav>