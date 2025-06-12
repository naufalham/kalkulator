@extends('layouts.head')

@section('content')
    <!-- Header Section -->
    <div class="flex flex-col md:flex-row md:justify-between md:items-center gap-4 mb-10">

        <!-- Card Total Pengguna -->
        <div class="bg-white rounded-lg px-4 py-3 flex items-center gap-3 max-w-xs shadow">
            <i class="fas fa-user text-black text-lg"></i>
            <div>
                <p class="text-sm font-semibold">Total Pengguna</p>
                <p class="text-sm">Total: {{ isset($users) ? count($users) : '0' }}</p>
            </div>
        </div>

        <!-- Form Pencarian -->
        <form method="GET" action="{{ route('admin.user') }}"
            class="bg-white rounded-lg px-4 py-3 max-w-md w-full flex items-center gap-2 shadow">
            <i class="fas fa-search text-black text-bs"></i>
            <input type="text" name="q" value="{{ request('q') }}"
                placeholder="Cari Pengguna"
                class="bg-transparent text-sm outline-none w-full"
            />
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
                    <th class="border px-3 py-2 text-left font-semibold">Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($users as $index => $user)
                    <tr class="border-t">
                        <td class="border px-3 py-2">{{ $index + 1 }}</td>
                        <td class="border px-3 py-2">{{ $user->name }}</td>
                        <td class="border px-3 py-2">{{ $user->email }}</td>
                        <td class="border px-3 py-2 capitalize">{{ $user->role }}</td>
                        <td class="border px-3 py-2">
                            <form action="{{ route('admin.user.destroy', $user->id) }}" method="POST" class="inline">
                                @csrf
                                @method('DELETE')
                                <button onclick="return confirm('Yakin ingin menghapus user ini?')"
                                    class="bg-red-600 text-white text-sm font-semibold rounded px-2 py-1">
                                    Hapus
                                </button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection