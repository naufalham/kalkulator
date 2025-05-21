<main class="flex-grow max-w-[1400px] mx-auto px-6 mt-8 mb-12 flex flex-col md:flex-row gap-6 w-full">
    <!-- Sidebar -->
    <aside class="bg-white rounded-2xl w-full md:w-72 p-6 flex flex-col space-y-4">
        <aside class="bg-white rounded-2xl w-full max-w-xs flex flex-col space-y-4 p-4">
            <a href="/admin/user" class="text-[#F57C20] text-sm font-semibold rounded-xl py-2 px-6 bg-[#F5F8FF] select-none">
                Pengguna
            </a>
            <a href="/admin/berita" class="text-white text-sm font-semibold rounded-xl py-2 px-6 bg-[#F57C20] select-none">
                Berita
            </a>
            <a href="{{ route ('admin.berita.create') }}" class="text-[#F57C20] text-sm font-semibold rounded-xl py-2 px-6 bg-[#F5F8FF] select-none">
                Tambah Berita
            </a>
            <a href="/admin/kalkulator" class="text-[#F57C20] text-sm font-semibold rounded-xl py-2 px-6 bg-[#F5F8FF] select-none">
                Penggunaan Kalkulator
            </a>
        </aside>
    </aside>