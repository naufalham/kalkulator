<!-- resources/views/components/nav.blade.php -->
<nav class="flex items-center justify-between h-16">
    <div class="flex items-center space-x-2">
        <img alt="NaZMaLogy logo with blue and orange geometric shapes" class="w-8 h-8" height="32" src="https://storage.googleapis.com/a1aa/image/9eec60c9-c16f-4341-d23c-c71282f0d260.jpg" width="32"/>
        <span class="font-black text-xl text-black select-none">
            NaZMaLogy
        </span>
    </div>
    <ul class="hidden md:flex space-x-10 font-semibold text-black text-sm">
        <li>
            <a class="hover:underline" href="/">
                Beranda
            </a>
        </li>
        <li>
            <a class="hover:underline" href="/berita">
                Berita
            </a>
        </li>
        <li>
            <a class="hover:underline" href="/kalkulator">
                Kalkulator
            </a>
        </li>
        <li>
            <a class="hover:underline" href="/usaha">
                Usaha
            </a>
        </li>

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
            @else
                <a href="/login" class="text-[#F97316] hover:underline">Masuk</a>
            @endauth
        </li>
    </ul>

    <!-- @auth
        <a class="text-[#F97316] hover:underline" href="/profil">
            {{ Auth::user()->name }}
        </a>
        <form method="POST" action="{{ route('logout') }}" class="contents">
            @csrf
            <button type="submit" class="text-[#F97316] inline-flex items-center gap-1 hover:underline">
                <i class="fas fa-sign-out-alt"></i>
                Logout
            </button>
        </form>
    @else
        <a href="/login" class="text-[#F97316] hover:underline">Masuk</a>
    @endauth -->
</nav>

