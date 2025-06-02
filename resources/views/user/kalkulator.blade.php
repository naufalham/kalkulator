@vite(['resources/css/usaha.css','resources/js/app.js'])
<!-- Navbar -->
<x-navbar id="sticky-navbar" class="bg-white shadow-md"></x-navbar>

<!-- Main content -->
<main class="flex-grow max-w-6xl mx-auto px-6 mt-12 pt-20">
    <div class="main-content grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 gap-x-8 gap-y-12 max-w-6xl mx-auto place-items-stretch h-full">
        @foreach($kalkulators as $kalkulator)
            <a href="{{ route('user.hitung.show', ['slug' => $kalkulator->slug]) }}" class="relative bg-white rounded-2xl pt-12 pb-8 px-6 text-center shadow-sm transition-transform transform hover:-translate-y-2 hover:shadow-lg duration-300 h-full flex flex-col justify-between">
                <div class="absolute -top-6 left-1/2 -translate-x-1/2 bg-[#F28C28] w-12 h-12 rounded-xl flex items-center justify-center">
                    <img alt="Icon {{ $kalkulator->nama }}" class="w-9 h-9" src="{{ asset('icons/kalkulator/modal.png') }}" />
                </div>
                <div>
                    <h3 class="font-bold text-base text-black select-none">Kalkulator</h3>
                    <h3 class="font-bold text-base text-black select-none">{{ $kalkulator->nama }}</h3>
                    <p class="custom-paragraph text-xs sm:text-sm min-h-[48px]">
                        {{ $kalkulator->deskripsi }}
                    </p>
                </div>
            </a>
        @endforeach
    </div>
</main>

<x-wa />

<!-- Footer -->
<div class="mt-10"></div>
<x-footer></x-footer>