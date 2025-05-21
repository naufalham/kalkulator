@vite(['resources/css/usaha.css', 'resources/js/app.js'])

<!-- Navbar -->
<x-navbar></x-navbar>

<!-- Kontainer utama dengan padding sama seperti halaman profil -->
<div class="w-full px-8 sm:px-12 lg:px-16 xl:px-24 pt-3">

    <!-- Hero Section -->
    <div class="w-full bg-[#2f318d] rounded-2xl py-10 px-4 flex flex-col items-center mb-8 mt-28">
        <h1 class="text-white sm:text-2xl font-extrabold text-center mb-2">Laman Berita</h1>
        <p class="text-white text-base text-center mb-4">
            Temukan berbagai informasi, inspirasi, dan berita terbaru seputar dunia bisnis dan kewirausahaan di sini.
        </p>
        <form class="w-full max-w-2xl mx-auto">
            <div class="flex items-center bg-white rounded-full px-6 py-3 shadow-md">
                <svg class="w-5 h-5 text-gray-400 mr-2" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                    <circle cx="11" cy="11" r="8" />
                    <line x1="21" y1="21" x2="16.65" y2="16.65" />
                </svg>
                <input 
                    type="text" 
                    placeholder="Cari" 
                    class="flex-1 border-none outline-none bg-transparent text-gray-700 text-base font-semibold"
                />
            </div>
        </form>
    </div>

    <!-- Artikel Terbaru -->
    <div>
        <h2 class="text-xl font-extrabold text-gray-900">Berita Terbaru</h2>
        <div class="border-t border-gray-400"></div>

        <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-4 gap-x-6 gap-y-3">
            <!-- Isi Card Berita -->
            <!-- Card 1 -->
            <article>
                <div class="relative rounded-lg overflow-hidden">
                    <img 
                        src="https://storage.googleapis.com/a1aa/image/8b053ab9-ea65-420e-4d62-b31a36560a0b.jpg" 
                        alt="Group of people standing in front of a banner holding boxes in a cooking demo event"
                        class="w-full h-auto object-cover rounded-lg"
                        width="320" height="180"
                    />
                </div>
                <p class="text-xs text-gray-600">Rabu, 21 Mei 2025</p>
                <h3 class="mt-1 font-extrabold text-gray-900 text-base leading-snug">
                    Final Day INSPIRA 4C Fest: Cake Decoration Competition
                </h3>
                <p class="mt-1 text-sm text-gray-600 font-semibold">
                    NaZMa Office, Yogyakarta, 18 Mei 2025
                    <span class="font-normal"> - Inspira Foo...</span>
                </p>
            </article>

            <!-- Card 2 -->
            <article>
                <div class="relative rounded-lg overflow-hidden">
                    <img 
                        src="https://storage.googleapis.com/a1aa/image/731cfd63-c41d-46cc-2b9a-424fe21647ff.jpg" 
                        alt="Group of people standing behind a table with a cake and cooking ingredients in a demo"
                        class="w-full h-auto object-cover rounded-lg"
                        width="320" height="180"
                    />
                </div>
                <p class="text-xs text-gray-600">Selasa, 20 Mei 2025</p>
                <h3 class="mt-1 font-extrabold text-gray-900 text-base leading-snug">
                    INSPIRA 4C Fest: Cooking Demo Interaktif Bersama Chef Profesional
                </h3>
                <p class="mt-1 text-sm text-gray-600 font-semibold">
                    NaZMa Office, Yogyakarta, 17 Mei 2025
                    <span class="font-normal"> - Suasana IN...</span>
                </p>
            </article>

            <!-- Card 3 -->
            <article>
                <div class="relative rounded-lg overflow-hidden">
                    <img 
                        src="https://storage.googleapis.com/a1aa/image/24728a30-06c7-412d-6bf3-c4232969dbf7.jpg" 
                        alt="Group photo of people sitting and standing indoors with colorful decorations in background"
                        class="w-full h-auto object-cover rounded-lg"
                        width="320" height="180"
                    />
                </div>
                <p class="text-xs text-gray-600">Senin, 19 Mei 2025</p>
                <h3 class="mt-1 font-extrabold text-gray-900 text-base leading-snug">
                    INSPIRA 4C Fest: Sinergi Pendampingan KaMu, Talkshow, &amp; Edukasi Kesehatan
                </h3>
                <p class="mt-1 text-sm text-gray-600 font-semibold">
                    NaZMa Office, 16 Mei 2025
                    <span class="font-normal"> - Sebuah gebrakan kolabo...</span>
                </p>
            </article>

            <!-- Card 4 -->
            <article>
                <div class="relative rounded-lg overflow-hidden">
                    <img 
                        src="https://storage.googleapis.com/a1aa/image/1cc5d050-95d4-489b-6cbf-e7787f9f18a7.jpg" 
                        alt="Two people shaking hands over a table with notebooks, phones, and a cup of coffee"
                        class="w-full h-auto object-cover rounded-lg"
                        width="320" height="180"
                    />
                </div>
                <p class="text-xs text-gray-600">Rabu, 14 Mei 2025</p>
                <h3 class="mt-1 font-extrabold text-gray-900 text-base leading-snug">
                    Kuasai Komunikasi, Menangkan Negosiasi: Bekal Wajib Profesional Masa Kini
                </h3>
                <p class="mt-1 text-sm text-gray-600 font-semibold">
                    NaZMa Office
                    <span class="font-normal"> - Di balik kesepakatan bisnis, lancar...</span>
                </p>
            </article>
        </div>
    </div>
</div>

<!-- Footer -->
<x-footer></x-footer>
