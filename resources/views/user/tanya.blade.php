@vite(['resources/css/profil.css','resources/js/app.js'])
<!-- Header -->
<x-navbar></x-navbar>

<!-- Main content -->
<main class="w-full px-8 sm:px-12 lg:px-16 xl:px-24 flex flex-col md:flex-row gap-6 flex-grow pt-20">

    <!-- Sidebar -->
    <x-sidebar></x-sidebar>
        
    <!-- FAQ content -->
   <section aria-label="Frequently Asked Questions" class="bg-white rounded-xl w-full md:flex-1 p-6 space-y-4">

        @foreach($faqs as $faq)
            <details class="faq-item border border-gray-300 rounded-lg p-3">
                <summary class="cursor-pointer flex justify-between items-center text-sm">
                    {{ $faq->question }}
                    <i class="fas fa-chevron-down ml-2 text-gray-600"></i>
                </summary>
                <div class="mt-2 text-sm leading-relaxed">
                    {!! nl2br(e($faq->answer)) !!}
                </div>
            </details>
        @endforeach

    {{-- <details class="faq-item border border-gray-300 rounded-lg p-3">
        <summary class="cursor-pointer flex justify-between items-center text-sm">
            Apa itu AKUNaZMa?
            <i class="fas fa-chevron-down ml-2 text-gray-600"></i>
        </summary>
        <div class="mt-2 text-sm  leading-relaxed">
            <p> AKUNaZMa adalah alat bantu digital untuk membantu calon pengusaha atau pemilik usaha menganalisis kelayakan bisnisnya secara cepat dan objektif.
            </p>
            <p>
            Kami menyediakan kalkulator dan simulasi berbasis data untuk menilai aspek finansial dan non-finansial usaha.
            </p>
        </div>
    </details>

    <details class="faq-item border border-gray-300 rounded-lg p-3">
        <summary class="cursor-pointer flex justify-between items-center text-sm">
            Apakah layanan ini gratis/berbayar?
            <i class="fas fa-chevron-down ml-2 text-gray-600"></i>
        </summary>
        <div class="mt-2 text-sm  leading-relaxed">
            <p>Kami menyediakan beberapa kalkulator dasar secara gratis, 
            </p>
            <p>
            namun fitur lanjutan seperti kalkulator analisis kelayakan usaha premium.
            </p>
        </div>
    </details>

    <details class="faq-item border border-gray-300 rounded-lg p-3">
        <summary class="cursor-pointer flex justify-between items-center text-sm">
            Bagaimana cara menggunakan kalkulator analisis?
            <i class="fas fa-chevron-down ml-2 text-gray-600"></i>
        </summary>
        <div class="mt-2 text-sm  leading-relaxed">
            <p>
            Cukup pilih jenis usaha → masukkan data yang diminta → klik "Hitung"
            </p>
            <p>
            Anda akan diminta melakukan pembayaran terlebih dahulu untuk mendapatkan hasil analisis dalam bentuk file Excel.
            </p>
    </details>

    <details class="faq-item border border-gray-300 rounded-lg p-3">
        <summary class="cursor-pointer flex justify-between items-center text-sm">
            Bisakah menyimpan atau mengunduh hasil analisis?
            <i class="fas fa-chevron-up ml-2 text-gray-600"></i>
        </summary>
        <div class="mt-2 text-sm  leading-relaxed">
            <p>
            Tentu, Anda bisa menyimpan laporan sebagai Excel.
            </p>
            <p>
            Untuk fitur ekspor penuh, silakan melakukan pembayaran.
            </p>
        </div>
    </details> --}}
   </section>
</main>

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
    // Set initial icon state on page load
    updateIcon();

    // Listen for toggle event (works for mouse & keyboard)
    detail.addEventListener('toggle', updateIcon);
});
</script>