<x-navmin></x-navmin>

<!-- Main content -->

    <x-sidemin></x-sidemin>

    <!-- Content area -->
    <section class="bg-white rounded-2xl flex-grow p-6 flex flex-col space-y-6 overflow-x-auto">
     <div class="flex flex-col md:flex-row md:justify-between md:items-center gap-4">
      <div class="bg-[#f5f8ff] rounded-lg px-4 py-3 flex items-center space-x-3 max-w-xs">
       <i class="fas fa-user text-black text-lg">
       </i>
       <div>
        <p class="font-semibold text-sm">
         Total Pengguna
        </p>
        @if(isset($users))
            <p>Total: {{ count($users) }}</p>
        @else
            <p><strong>$users tidak tersedia!</strong></p>
        @endif
       </div>
      </div>
      <form class="bg-[#f5f8ff] rounded-lg px-4 py-3 max-w-xs w-full md:w-auto flex items-center space-x-2">
       <i class="fas fa-search text-black text-sm">
       </i>
       <input class="bg-transparent text-xs outline-none w-full" placeholder="Cari Pengguna" type="text"/>
      </form>
     </div>
     <h2 class="font-semibold text-sm mb-2">
      Daftar Pengguna
     </h2>
     <div class="overflow-x-auto">
      <table class="w-full border-collapse border border-gray-200 text-xs min-w-[600px]">
       <thead>
        <tr class="bg-white border border-gray-200">
         <th class="border border-gray-200 px-3 py-2 text-left font-semibold">
          No
         </th>
         <th class="border border-gray-200 px-3 py-2 text-left font-semibold">
          Nama
         </th>
         <th class="border border-gray-200 px-3 py-2 text-left font-semibold">
          Email
         </th>
         <th class="border border-gray-200 px-3 py-2 text-left font-semibold">
          Role
         </th>
         <th class="border border-gray-200 px-3 py-2 text-left font-semibold">
          Action
         </th>
        </tr>
       </thead>
       <tbody>
        @foreach ($users as $index => $user)
            <tr>
                <td>{{ $index + 1 }}</td>
                <td>{{ $user->name }}</td>
                <td>{{ $user->email }}</td>
                <td>{{ $user->role }}</td>
                <td>
                    <form action="{{ route('admin.user.destroy', $user->id) }}" method="POST" style="display:inline;">
                        @csrf
                        @method('DELETE')
                        <button class="bg-red-600 text-white text-[10px] font-semibold rounded px-2 py-0.5" onclick="return confirm('Yakin ingin menghapus user ini?')">
                            Hapus
                        </button>
                    </form>
                    <button class="bg-yellow-400 text-black text-[10px] font-semibold rounded px-2 py-0.5">
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


<!-- Footer -->
<x-footer></x-footer>