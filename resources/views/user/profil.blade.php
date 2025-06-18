@vite(['resources/css/profil.css','resources/js/app.js'])
<!-- Header -->
<x-navbar></x-navbar>

<!-- Main content -->
<main class="w-full px-8 sm:px-12 lg:px-16 xl:px-24 flex flex-col md:flex-row gap-6 flex-grow pt-20">

    <!-- Sidebar -->
    <x-sidebar></x-sidebar>
        
    <!-- Account form -->
    <section aria-label="Account profile form" class="bg-white rounded-2xl flex-grow p-6 flex flex-col space-y-6 overflow-x-auto">
        <h2 class="font-bold text-l select-none">
            Akun
        </h2>
        <form class="flex flex-col gap-4 text-sm" method="POST" action="{{ route('user.update') }}">
            
            @csrf

            @if (session('success'))
                <div class="bg-green-100 text-green-700 p-4 rounded-md mb-4">
                    {{ session('success') }}
                </div>
            @endif

            @if ($errors->any())
                <div class="bg-red-100 text-red-700 p-4 rounded-md mb-4">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <div class="flex flex-col gap-1">
                <label class="font-semibold text-sm select-none" for="email">
                    Email
                </label>
                <input
                    class="border border-black rounded-lg py-2 px-3 text-sm bg-gray-100 text-gray-500 cursor-not-allowed"
                    id="email"
                    type="email"
                    name="email"
                    value="{{ Auth::user()->email }}"
                    disabled
                />
            </div>
            <div class="flex flex-col gap-1">
                <label class="font-semibold text-sm select-none" for="fullname">
                    Nama Lengkap
                </label>
                <input class="border border-black rounded-lg py-2 px-3 text-sm focus:outline-none focus:ring-2 focus:ring-[#f97316]" placeholder="{{ old('name', Auth::user()->name) }}" id="name" type="text" name="name" value="{{ old('name') }}" />
            </div>
            <div class="flex flex-col md:flex-row gap-6">
                <div class="flex-1 flex flex-col gap-1">
                    <label class="font-semibold text-sm select-none" for="password">
                        Kata Sandi
                    </label>
                    <input class="border border-black rounded-lg py-2 px-3 text-sm focus:outline-none focus:ring-2 focus:ring-[#f97316]" id="password" type="password" name="password"/>
                </div>
            </div>
            <div class="flex justify-end">
                <button class="bg-[#f97316] text-white rounded-lg py-2 px-6 text-sm font-semibold hover:bg-[#e66a0d] transition-colors" type="submit">
                    Perbarui Profil
                </button>
            </div>
        </form>
    </section>
</main>

<x-wa />

<!-- Footer -->
<div class="mt-10"></div>
<x-footer></x-footer>