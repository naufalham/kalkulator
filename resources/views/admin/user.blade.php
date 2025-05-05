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
        <p class="text-xs">
         1200 pengguna
        </p>
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
          Alamat
         </th>
         <th class="border border-gray-200 px-3 py-2 text-left font-semibold">
          No. Wa
         </th>
         <th class="border border-gray-200 px-3 py-2 text-left font-semibold">
          Action
         </th>
        </tr>
       </thead>
       <tbody>
        <tr class="border border-gray-200">
         <td class="border border-gray-200 px-3 py-2">
          1.
         </td>
         <td class="border border-gray-200 px-3 py-2">
          Robertson
         </td>
         <td class="border border-gray-200 px-3 py-2">
          Jalan Semeru
         </td>
         <td class="border border-gray-200 px-3 py-2">
          0857xxxxxxxx
         </td>
         <td class="border border-gray-200 px-3 py-2 space-x-2">
          <button class="bg-red-600 text-white text-[10px] font-semibold rounded px-2 py-0.5">
           Hapus
          </button>
          <button class="bg-yellow-400 text-black text-[10px] font-semibold rounded px-2 py-0.5">
           Update
          </button>
         </td>
        </tr>
        <tr class="border border-gray-200">
         <td class="border border-gray-200 px-3 py-2">
          2.
         </td>
         <td class="border border-gray-200 px-3 py-2">
          Andrew
         </td>
         <td class="border border-gray-200 px-3 py-2">
          Jalan Bromo
         </td>
         <td class="border border-gray-200 px-3 py-2">
          0852xxxxxxxx
         </td>
         <td class="border border-gray-200 px-3 py-2 space-x-2">
          <button class="bg-red-600 text-white text-[10px] font-semibold rounded px-2 py-0.5">
           Hapus
          </button>
          <button class="bg-yellow-400 text-black text-[10px] font-semibold rounded px-2 py-0.5">
           Update
          </button>
         </td>
        </tr>
        <tr class="border border-gray-200">
         <td class="border border-gray-200 px-3 py-2">
          3.
         </td>
         <td class="border border-gray-200 px-3 py-2">
          James
         </td>
         <td class="border border-gray-200 px-3 py-2">
          Jalan Wilis
         </td>
         <td class="border border-gray-200 px-3 py-2">
          0812xxxxxxxx
         </td>
         <td class="border border-gray-200 px-3 py-2 space-x-2">
          <button class="bg-red-600 text-white text-[10px] font-semibold rounded px-2 py-0.5">
           Hapus
          </button>
          <button class="bg-yellow-400 text-black text-[10px] font-semibold rounded px-2 py-0.5">
           Update
          </button>
         </td>
        </tr>
        <tr class="border border-gray-200">
         <td class="border border-gray-200 px-3 py-2">
          4.
         </td>
         <td class="border border-gray-200 px-3 py-2">
          James
         </td>
         <td class="border border-gray-200 px-3 py-2">
          Jalan Argopuro
         </td>
         <td class="border border-gray-200 px-3 py-2">
          0899xxxxxxxx
         </td>
         <td class="border border-gray-200 px-3 py-2 space-x-2">
          <button class="bg-red-600 text-white text-[10px] font-semibold rounded px-2 py-0.5">
           Hapus
          </button>
          <button class="bg-yellow-400 text-black text-[10px] font-semibold rounded px-2 py-0.5">
           Update
          </button>
         </td>
        </tr>
       </tbody>
      </table>
     </div>
    </section>
   </main>


<!-- Footer -->
<x-footer></x-footer>