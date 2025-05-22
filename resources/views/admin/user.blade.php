<x-navmin></x-navmin>

<main class="flex min-h-screen bg-[#f5f8ff] pt-20">
    <!-- Sidebar -->
    <div class="hidden md:block md:w-72 mr-6">
        <x-sidemin />
    </div>
    <!-- Content area -->
    <section class="flex-1 flex flex-col space-y-6 p-4 md:p-8">
        <div class="flex flex-col md:flex-row md:justify-between md:items-center gap-4">
            <div class="bg-white rounded-lg px-4 py-3 flex items-center space-x-3 max-w-xs shadow">
                <i class="fas fa-user text-black text-lg"></i>
                <div>
                    <p class="font-semibold text-sm">Total Pengguna</p>
                    @if(isset($users))
                        <p>Total: {{ count($users) }}</p>
                    @else
                        <p><strong>$users tidak tersedia!</strong></p>
                    @endif
                </div>
            </div>
            <form class="bg-white rounded-lg px-4 py-3 max-w-xs w-full md:w-auto flex items-center space-x-2 shadow">
                <i class="fas fa-search text-black text-sm"></i>
                <input class="bg-transparent text-xs outline-none w-full" placeholder="Cari Pengguna" type="text"/>
            </form>
        </div>
        <h2 class="font-semibold text-sm mb-2 mt-4">Daftar Pengguna</h2>
        <div class="overflow-x-auto bg-white rounded-lg shadow">
            <table class="w-full border-collapse border border-gray-200 text-xs min-w-[600px]">
                <thead>
                    <tr class="bg-[#f5f8ff] border-b border-gray-200">
                        <th class="border border-gray-200 px-3 py-2 text-left font-semibold">No</th>
                        <th class="border border-gray-200 px-3 py-2 text-left font-semibold">Nama</th>
                        <th class="border border-gray-200 px-3 py-2 text-left font-semibold">Email</th>
                        <th class="border border-gray-200 px-3 py-2 text-left font-semibold">Role</th>
                        <th class="border border-gray-200 px-3 py-2 text-left font-semibold">Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($users as $index => $user)
                        <tr>
                            <td class="border border-gray-200 px-3 py-2">{{ $index + 1 }}</td>
                            <td class="border border-gray-200 px-3 py-2">{{ $user->name }}</td>
                            <td class="border border-gray-200 px-3 py-2">{{ $user->email }}</td>
                            <td class="border border-gray-200 px-3 py-2">{{ $user->role }}</td>
                            <td class="border border-gray-200 px-3 py-2">
                                <form action="{{ route('admin.user.destroy', $user->id) }}" method="POST" style="display:inline;">
                                    @csrf
                                    @method('DELETE')
                                    <button class="bg-red-600 text-white text-[10px] font-semibold rounded px-2 py-0.5" onclick="return confirm('Yakin ingin menghapus user ini?')">
                                        Hapus
                                    </button>
                                </form>
                                <button class="bg-yellow-400 text-black text-[10px] font-semibold rounded px-2 py-0.5 ml-1">
                                    Update
                                </button>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </section>
</main>

<x-footer />