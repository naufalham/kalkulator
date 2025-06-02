<!-- Tambahkan Alpine.js -->
<script src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js" defer></script>

<div x-data="{ sidebarOpen: false }" class="flex h-screen font-[Poppins]">

    <!-- Overlay untuk mobile -->
    <div x-show="sidebarOpen" 
         @click="sidebarOpen = false" 
         class="fixed inset-0 bg-black bg-opacity-50 z-30 sm:hidden"
         x-transition.opacity
         x-cloak>
    </div>

    <!-- Sidebar -->
    <nav :class="sidebarOpen ? 'translate-x-0' : '-translate-x-full'"
         class="fixed sm:relative z-40 sm:z-auto bg-white w-64 h-full border-r border-gray-200 px-4 py-6 space-y-4 transition-transform transform sm:translate-x-0 duration-300 ease-in-out">

        <ul class="space-y-4 text-sm font-semibold text-gray-900">
            <li class="flex items-center space-x-2 cursor-pointer">
                <i class="fas fa-users text-orange-500"></i>
                <a href="/admin/user" class="hover:text-orange-500 transition duration-200">Pengguna</a>
            </li>
            <li class="flex items-center space-x-2 cursor-pointer">
                <i class="fas fa-newspaper text-orange-500"></i>
                <a href="/admin/berita" class="hover:text-orange-500 transition duration-200">Berita</a>
            </li>
            <li class="flex items-center space-x-2 cursor-pointer">
                <i class="fas fa-calculator text-orange-500"></i>
                <a href="/admin/kalkulator" class="hover:text-orange-500 transition duration-200">Penggunaan Kalkulator</a>
            </li>
            <li class="flex items-center space-x-2 cursor-pointer">
                <i class="fas fa-question-circle text-orange-500"></i>
                <a href="{{ route('admin.faq.index') }}" class="hover:text-orange-500 transition duration-200">FAQ</a>
            </li>
        </ul>
    </nav>
</div>
