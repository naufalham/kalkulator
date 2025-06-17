@extends('layouts.head')

@section('content')
    <!-- Header Section -->
    <div class="flex flex-col md:flex-row md:justify-between md:items-center gap-4 mb-10">

        <!-- Card Total Pengguna -->
        <div class="bg-white rounded-lg px-4 py-3 flex items-center gap-3 max-w-xs shadow">
            <i class="fas fa-user text-black text-lg"></i>
            <div class="w-full">
                <p class="text-sm font-semibold">Total Pengguna</p>
                <p class="text-sm">Total: {{ $users->total() }}</p> {{-- Menggunakan total dari paginator --}}
            </div>
        </div>

        @if (session('success'))
            <div class="md:col-span-2 bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded relative" role="alert">
                <span class="block sm:inline">{{ session('success') }}</span>
            </div>
        @endif

        <!-- Form Pencarian -->
        <form method="GET" action="{{ route('admin.user') }}" id="searchForm"
            class="bg-white rounded-lg px-4 py-3 max-w-md w-full flex items-center gap-2 shadow">
            <i class="fas fa-search text-black text-bs"></i>
            <input type="text" name="q" value="{{ request('q') }}"
                placeholder="Cari Pengguna"
                class="bg-transparent text-sm outline-none w-full"
            />
            <button type="submit" class="bg-[#F97316] text-white text-xs font-semibold rounded px-3 py-1.5 hover:bg-[#e06f11] transition-colors">
                Cari
            </button>
        </form>
    </div>

    <!-- Tabel Daftar Pengguna -->
    <h2 class="text-base font-semibold mb-2">Daftar Pengguna</h2>
    <div class="overflow-x-auto bg-white rounded-lg shadow">
        <table class="w-full border-collapse border border-gray-200 text-sm min-w-[600px]">
            <thead>
                <tr class="bg-[#f5f8ff] border-b border-gray-200">
                    <th class="border px-3 py-2 text-left font-semibold">No</th>
                    <th class="border px-3 py-2 text-left font-semibold">Nama</th>
                    <th class="border px-3 py-2 text-left font-semibold">Email</th>
                    <th class="border px-3 py-2 text-left font-semibold">Role</th>
                    <th class="border px-3 py-2 text-left font-semibold">Password</th>
                    <th class="border px-3 py-2 text-left font-semibold">Status</th>
                    <th class="border px-3 py-2 text-left font-semibold">Action</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($users as $index => $user)
                    <tr class="border-t">
                        <td class="border px-3 py-2">{{ $users->firstItem() + $index }}</td>
                        <td class="border px-3 py-2">{{ $user->name }}</td>
                        <td class="border px-3 py-2">{{ $user->email }}</td>
                        <td class="border px-3 py-2 capitalize">{{ $user->role }}</td>
                        <td class="border px-3 py-2">
                            {{-- Tombol untuk reset password per user --}}
                            <form action="{{ route('admin.user.resetPassword', $user->id) }}" method="POST" class="inline">
                                @csrf
                                @method('PATCH')
                                <button type="submit"
                                        onclick="return confirm('Anda yakin ingin mereset password pengguna ini menjadi default (password)?')"
                                        class="bg-orange-500 text-white text-xs font-semibold rounded px-2 py-1 hover:bg-orange-600 transition-colors">
                                    Reset Password
                                </button>
                            </form>
                        </td>
                        <td class="border px-3 py-2">
                            @if ($user->aktif)
                                <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-green-100 text-green-800">
                                    Aktif
                                </span>
                            @else
                                <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-red-100 text-red-800">
                                    Tidak Aktif
                                </span>
                            @endif
                        </td>
                        <td class="border px-3 py-2">
                            <div class="flex gap-2">
                                <form action="{{ route('admin.user.toggleStatus', $user->id) }}" method="POST" class="inline">
                                    @csrf
                                    @method('PATCH')
                                    <button type="submit"
                                        class="{{ $user->aktif ? 'bg-yellow-500 hover:bg-yellow-600' : 'bg-green-500 hover:bg-green-600' }} text-white text-xs font-semibold rounded px-2 py-1">
                                        {{ $user->aktif ? 'Nonaktifkan' : 'Aktifkan' }}
                                    </button>
                                </form>
                            </div>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="7" class="text-center py-4">Tidak ada pengguna ditemukan.</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
    <div class="mt-4">
        {{ $users->links() }}
    </div>

    {{-- AlpineJS sudah di-load melalui layouts.head atau komponen sidemin, jadi @once di sini tidak diperlukan lagi --}}
    {{-- Jika belum, pastikan AlpineJS di-include di layout utama Anda (layouts.head.blade.php) --}}
@endsection