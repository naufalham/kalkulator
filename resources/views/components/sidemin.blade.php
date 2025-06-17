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
         class="fixed sm:relative sm:z-auto bg-white w-64 h-full border-r border-gray-200 px-4 py-6 space-y-2 transition-transform transform sm:translate-x-0 duration-300 ease-in-out">

        <ul class="space-y-4 text-sm font-semibold text-gray-900">
            <li>
                <a href="/admin/kalkulator"
                class="flex items-center space-x-3 transition duration-200 py-2
                {{ request()->is('admin/kalkulator') ? 'text-orange-500' : 'hover:text-orange-500' }}">
                    <i class="fas fa-calculator {{ request()->is('admin/kalkulator') ? 'text-orange-500' : 'text-orange-500' }} text-2xl"></i>
                    <span>Dashboard</span>
                </a>
            </li>
            <li>
                <a href="/admin/user"
                class="flex items-center space-x-4 transition duration-200 py-2
                {{ request()->is('admin/user') ? 'text-orange-500' : 'hover:text-orange-500' }}">
                    <i class="fas fa-users {{ request()->is('admin/user') ? 'text-orange-500' : 'text-orange-500' }} text-2xl"></i>
                    <span>Pengguna</span>
                </a>
            </li>
            <li>
                <a href="/admin/berita"
                class="flex items-center space-x-3 transition duration-200 py-2
                {{ (request()->is('admin/berita') || request()->is('admin/berita/*') || request()->is('admin/tambah_berita') || request()->is('admin/edit_berita*')) ? 'text-orange-500' : 'hover:text-orange-500' }}">
                    <i class="fas fa-newspaper {{ (request()->is('admin/berita') || request()->is('admin/berita/*') || request()->is('admin/tambah_berita') || request()->is('admin/edit_berita*')) ? 'text-orange-500' : 'text-orange-500' }} text-2xl"></i>
                    <span>Berita</span>
                </a>
            </li>
            <li>
                <a href="{{ route('admin.faq.index') }}"
                class="flex items-center space-x-4 transition duration-200 py-2
                {{ request()->is('admin/faq*') ? 'text-orange-500' : 'hover:text-orange-500' }}">
                    <i class="fas fa-question-circle {{ request()->is('admin/faq*') ? 'text-orange-500' : 'text-orange-500' }} text-2xl"></i>
                    <span>FAQ</span>
                </a>
            </li>
           
            {{-- Tombol Akses Halaman User --}}
            <li class="pt-4 border-t border-gray-200 mt-4">
                <a href="{{ route('landing_page') }}" class="flex items-center space-x-3 transition duration-200 py-2 hover:text-orange-500">
                    <i class="fas fa-user-circle text-orange-500 text-2xl"></i>
                    <span>Halaman User</span>
                </a>
            </li>

        </ul>
    </nav>
</div>
