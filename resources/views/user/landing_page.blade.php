@vite(['resources/css/landing.css','resources/js/app.js'])
<!-- Navbar -->
<x-navbar></x-navbar>

<!-- Main -->
 <section aria-label="Hero section with full-page background image" class="relative min-h-screen w-full bg-no-repeat bg-cover bg-center flex items-center justify-center text-center" style="background-image: url('{{ asset('asset/landing.jpg') }}');">
    <div class="absolute  bg-black bg-opacity-60 inset-0 flex flex-col justify-center items-center text-center px-6 sm:px-12">
        <h1 class="text-white font-bold text-2xl sm:text-4xl leading-tight">
            Kalkulator Pintar
            <br/>
            Membantu Menganalisis Kelayakan Usaha Anda
        </h1>
        @guest
        <button class="mt-6 bg-[#F28C28] text-white font-semibold rounded-full px-8 py-3" type="button" onclick="window.location.href='/register'">
            Daftar
        </button>
        @endguest
    </div>
</section>

<!-- Business Types Section -->
<section class="max-w-6xl mx-auto px-6 sm:px-6 mt-10">
    <h2 class="font-bold text-[#1a1a1a] text-lg mb-10">
        Tersedia untuk beberapa jenis usaha
    </h2>
    <div class="main-content grid grid-cols-1 sm:grid-cols-2 md:grid-cols-4 gap-x-8 gap-y-12 max-w-6xl mx-auto place-items-center">
        <!-- Fesyen -->
        <a href="{{route ('user.form_usaha')}}"  class="block w-full">
            <div class="relative bg-white rounded-2xl pt-12 pb-8 px-6 text-center shadow-sm transition-transform transform hover:-translate-y-2 hover:shadow-lg duration-300">
                <div class="absolute -top-6 left-1/2 -translate-x-1/2 bg-[#F28C28] w-12 h-12 rounded-xl flex items-center justify-center">
                    <img alt="Icon representing fashion" class="w-9 h-9" src="{{ asset('icons/fesyen.png') }}" />
                </div>
                <h3 class="font-bold text-base text-black mb-2 select-none">
                    Fesyen
                </h3>
                <p class="text-sm text-[#4a4a4a] leading-relaxed">
                    Usaha yang berfokus pada pakaian, sepatu, dan aksesori gaya hidup
                </p>
            </div>
        </a>
            
        <!-- Kuliner -->
        <a href="{{route ('user.form_usaha')}}"  class="block w-full">
            <div class="relative bg-white rounded-2xl pt-12 pb-8 px-6 text-center shadow-sm transition-transform transform hover:-translate-y-2 hover:shadow-lg duration-300">
                <div class="absolute -top-6 left-1/2 -translate-x-1/2 bg-[#F28C28] w-12 h-12 rounded-xl flex items-center justify-center">
                    <img alt="Icon representing food business" class="w-9 h-9" src="{{ asset('icons/kuliner.png') }}" />
                </div>
                <h3 class="font-bold text-base text-black mb-2 select-none">
                    Kuliner
                </h3>
                <p class="text-sm text-[#4a4a4a] leading-relaxed">
                    Usaha di bidang makanan, minuman, dan layanan kuliner
                </p>
            </div>
        </a>

        <!-- Jasa -->
        <a href="{{route ('user.form_usaha')}}"  class="block w-full">
            <div class="relative bg-white rounded-2xl pt-12 pb-8 px-6 text-center shadow-sm transition-transform transform hover:-translate-y-2 hover:shadow-lg duration-300">
                <div class="absolute -top-6 left-1/2 -translate-x-1/2 bg-[#F28C28] w-12 h-12 rounded-xl flex items-center justify-center">
                    <img alt="Icon representing services" class="w-9 h-9" src="{{ asset('icons/jasa.png') }}" />
                </div>
                <h3 class="font-bold text-base text-black mb-2 select-none">
                    Jasa
                </h3>
                <p class="text-sm text-[#4a4a4a] leading-relaxed">
                    Usaha yang menawarkan layanan atau keahlian untuk memenuhi kebutuhan
                </p>
            </div>
        </a>

        <!-- Kerajinan -->
        <a href="{{route ('user.form_usaha')}}"  class="block w-full">
            <div class="relative bg-white rounded-2xl pt-12 pb-8 px-6 text-center shadow-sm transition-transform transform hover:-translate-y-2 hover:shadow-lg duration-300">
                <div class="absolute -top-6 left-1/2 -translate-x-1/2 bg-[#F28C28] w-12 h-12 rounded-xl flex items-center justify-center">
                    <img alt="Icon representing crafts" class="w-9 h-9" src="{{ asset('icons/kerajinan.png') }}" />
                </div>
                <h3 class="font-bold text-base text-black mb-2 select-none">
                    Kerajinan
                </h3>
                <p class="text-sm text-[#4a4a4a] leading-relaxed">
                    Usaha yang mengubah kreativitas menjadi produk kerajinan bernilai
                </p>
            </div>
        </a>
    </div>

    <div class = "flex justify-center mt-10">
        <a href="{{ route ('user.usaha.index') }}">
            <button
                class="border-none bg-[#F28C28] text-white font-semibold rounded-full px-8 py-3 text-sm sm:text-base shadow-md hover:bg-[#e07c1a] transition-all duration-200"
                type="button">
                Coba Sekarang
            </button>
        </a>
    </div>
</section>

<!-- FAQ Section -->
<section class="w-full px-6 sm:px-12 lg:px-16 xl:px-24 mt-10 max-w-screen-xl mx-auto">
    <h2 class="text-xl sm:text-2xl font-bold text-center text-[#1a1a1a] mb-8">
        Pertanyaan yang Sering Diajukan
    </h2>
    <div class="space-y-4">
        @foreach($faqs as $faq)
            <details class="faq-item borderborder-gray-300 rounded-lg bg-white text-sm">
                <summary>
                    {{ $faq->question }}
                    <i class="fas fa-chevron-down ml-2 text-gray-600"></i>
                </summary>
                <div class="faq-answer text-sm text-gray-700 leading-relaxed">
                    {!! nl2br(e($faq->answer)) !!}
                </div>
            </details>
        @endforeach
    </div>
</section>

<x-wa />

<!-- Footer -->
<div class="mt-10"></div>
<x-footer></x-footer>

<script>
document.querySelectorAll('.faq-item').forEach(function(detail) {
    const summary = detail.querySelector('summary');
    const icon = summary.querySelector('i');

    function updateIcon() {
        if (detail.open) {
            icon.classList.remove('fa-chevron-down');
            icon.classList.add('fa-chevron-up');
        } else {
            icon.classList.remove('fa-chevron-up');
            icon.classList.add('fa-chevron-down');
        }
    }

    updateIcon(); // Set awal
    detail.addEventListener('toggle', updateIcon);
});
</script>
