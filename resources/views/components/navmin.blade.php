<nav x-data="{ 
        open: false, 
        adminProfileModalOpen: {{ $errors->hasBag('adminProfileUpdate') ? 'true' : 'false' }} 
     }" class="fixed top-0 left-0 right-0 z-50 flex items-center justify-between h-16 px-4 sm:px-8 md:px-12 bg-white shadow font-['Poppins',sans-serif]">
    <div class="flex items-center space-x-2">
        <img alt="NaZMaLogy logo" class="w-8 h-8" height="32" src="{{ asset('asset/logo.png') }}"/>
        <span class="font-semibold text-xl text-black select-none">AKUNaZMa</span>
    </div>
    <!-- Hamburger button -->
    <button @click="open = !open" class="md:hidden focus:outline-none">
        <svg class="w-7 h-7 text-[#F97316]" fill="none" stroke="currentColor" viewBox="0 0 24 24">
            <path :class="{'hidden': open, 'inline-flex': !open }" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"/>
            <path :class="{'inline-flex': open, 'hidden': !open }" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"/>
        </svg>
    </button>
    <!-- Menu -->
    <ul class="hidden md:flex space-x-10 font-semibold text-black text-sm items-center tracking-tight">
        @auth
        <li>
            <button @click="adminProfileModalOpen = true" type="button" class="text-[#F97316] hover:underline flex items-center gap-1 focus:outline-none">
                <svg class="w-4 h-4 text-[#F97316]" fill="currentColor" viewBox="0 0 24 24">
                    <path d="M12 12c2.7 0 4.5-1.8 4.5-4.5S14.7 3 12 3 7.5 4.8 7.5 7.5 9.3 12 12 12zm0 2c-3 0-9 1.5-9 4.5V21h18v-2.5c0-3-6-4.5-9-4.5z"/>
                </svg>
                {{ Auth::user()->name }}
            </button>
        </li>
        <li>
            <form method="POST" action="{{ route('logout') }}" class="contents">
                @csrf
                <button type="submit" class="text-[#F97316] inline-flex items-center gap-1 hover:underline">
                    <i class="fas fa-sign-out-alt"></i>
                    Logout
                </button>
            </form>
        </li>
        @else
        <li>
            <a href="/login" class="text-[#F97316] hover:underline">Masuk</a>
        </li>
        @endauth
    </ul>
    <div x-show="open" @click.away="open = false" class="md:hidden absolute top-16 left-0 w-full bg-white shadow-lg border-t z-50 font-['Poppins',sans-serif]">
        <ul class="flex flex-col py-4 px-6 space-y-4 font-semibold text-black text-base tracking-tight">
            @auth
            <li>
                <button @click="adminProfileModalOpen = true; open = false" type="button" class="text-[#F97316] hover:underline focus:outline-none w-full text-left">
                    {{ Auth::user()->name }}
                </button>
            </li>
            <li>
                <form method="POST" action="{{ route('logout') }}">
                    @csrf
                    <button type="submit" class="text-[#F97316] inline-flex items-center gap-1 hover:underline">
                        <i class="fas fa-sign-out-alt"></i>
                        Logout
                    </button>
                </form>
            </li>
            @else
            <li>
                <a href="/login" class="text-[#F97316] hover:underline">Masuk</a>
            </li>
            @endauth
        </ul>
    </div>

    <!-- Admin Profile Edit Modal -->
    @auth
    <div x-show="adminProfileModalOpen" 
         class="fixed inset-0 z-[60] flex items-center justify-center bg-black bg-opacity-50 p-4"
         x-transition:enter="ease-out duration-300"
         x-transition:enter-start="opacity-0"
         x-transition:enter-end="opacity-100"
         x-transition:leave="ease-in duration-200"
         x-transition:leave-start="opacity-100"
         x-transition:leave-end="opacity-0"
         x-cloak>
        <div @click.away="adminProfileModalOpen = false" 
             class="bg-white rounded-lg shadow-xl p-6 w-full max-w-md"
             x-transition:enter="ease-out duration-300"
             x-transition:enter-start="opacity-0 scale-95"
             x-transition:enter-end="opacity-100 scale-100"
             x-transition:leave="ease-in duration-200"
             x-transition:leave-start="opacity-100 scale-100"
             x-transition:leave-end="opacity-0 scale-95">
            
            <div class="flex justify-between items-center mb-4">
                <h3 class="text-lg font-semibold text-gray-900">Edit Profil Admin</h3>
                <button @click="adminProfileModalOpen = false" class="text-gray-400 hover:text-gray-600">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path></svg>
                </button>
            </div>

            <form method="POST" action="{{ route('admin.profile.update') }}">
                @csrf
                @method('PATCH')

                <div class="mb-4">
                    <label for="admin_name" class="block text-sm font-medium text-gray-700">Nama</label>
                    <input type="text" name="name" id="admin_name" value="{{ old('name', Auth::user()->name) }}" 
                           class="mt-1 block w-full px-3 py-2 border {{ $errors->adminProfileUpdate->has('name') ? 'border-red-500' : 'border-gray-300' }} rounded-md shadow-sm focus:outline-none focus:ring-[#F97316] focus:border-[#F97316] sm:text-sm">
                    @error('name', 'adminProfileUpdate')
                        <p class="mt-1 text-xs text-red-500">{{ $message }}</p>
                    @enderror
                </div>

                <div class="mb-4">
                    <label for="admin_email" class="block text-sm font-medium text-gray-700">Email</label>
                    <input type="email" name="email" id="admin_email" value="{{ old('email', Auth::user()->email) }}"
                           class="mt-1 block w-full px-3 py-2 border {{ $errors->adminProfileUpdate->has('email') ? 'border-red-500' : 'border-gray-300' }} rounded-md shadow-sm focus:outline-none focus:ring-[#F97316] focus:border-[#F97316] sm:text-sm">
                    @error('email', 'adminProfileUpdate')
                        <p class="mt-1 text-xs text-red-500">{{ $message }}</p>
                    @enderror
                </div>

                <div class="mb-4">
                    <label for="admin_password" class="block text-sm font-medium text-gray-700">Password Baru (Opsional)</label>
                    <input type="password" name="password" id="admin_password"
                           class="mt-1 block w-full px-3 py-2 border {{ $errors->adminProfileUpdate->has('password') ? 'border-red-500' : 'border-gray-300' }} rounded-md shadow-sm focus:outline-none focus:ring-[#F97316] focus:border-[#F97316] sm:text-sm"
                           placeholder="Kosongkan jika tidak ingin diubah">
                    @error('password', 'adminProfileUpdate')
                        <p class="mt-1 text-xs text-red-500">{{ $message }}</p>
                    @enderror
                </div>

                <div class="mb-6">
                    <label for="admin_password_confirmation" class="block text-sm font-medium text-gray-700">Konfirmasi Password Baru</label>
                    <input type="password" name="password_confirmation" id="admin_password_confirmation"
                           class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-[#F97316] focus:border-[#F97316] sm:text-sm">
                </div>

                <div class="flex justify-end space-x-3">
                    <button type="button" @click="adminProfileModalOpen = false" class="px-4 py-2 text-sm font-medium text-gray-700 bg-gray-100 hover:bg-gray-200 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-gray-500">
                        Batal
                    </button>
                    <button type="submit" class="px-4 py-2 text-sm font-medium text-white bg-[#F97316] hover:bg-[#e06f11] rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-[#F97316]">
                        Simpan Perubahan
                    </button>
                </div>
            </form>
        </div>
    </div>
    @endauth
</nav>

<!-- Tambahkan Alpine.js CDN di layout utama jika belum ada -->
<script src="//unpkg.com/alpinejs" defer></script>