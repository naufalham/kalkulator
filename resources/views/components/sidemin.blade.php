{{-- <!-- Sidebar -->
<aside class="bg-white rounded-2xl w-full md:w-72 p-6 flex flex-col space-y-4">
    <a href="/admin/user" class="text-[#F57C20] text-sm font-semibold rounded-xl py-2 px-6 bg-[#F5F8FF] select-none">
        Pengguna
    </a>
    <a href="/admin/berita" class="text-white text-sm font-semibold rounded-xl py-2 px-6 bg-[#F57C20] select-none">
        Berita
    </a>
    <a href="{{ route('admin.berita.create') }}" class="text-[#F57C20] text-sm font-semibold rounded-xl py-2 px-6 bg-[#F5F8FF] select-none">
        Tambah Berita
    </a>
    <a href="/admin/kalkulator" class="text-[#F57C20] text-sm font-semibold rounded-xl py-2 px-6 bg-[#F5F8FF] select-none">
        Penggunaan Kalkulator
    </a>
</aside> --}}


<nav class=" bg-white w-full sm:w-60 border-b border-gray-200 sm:border-b-0 sm:border-r px-4 py-4 sm:py-6 select-none">
    <ul class="space-y-4 text-sm font-semibold text-gray-900">
     <li class="flex items-center space-x-2 cursor-pointer">
      <i class="fas fa-home text-orange-500">
      </i>
        <a href="/admin/user">
            Pengguna
        </a>
     </li>
     <li class="flex items-center space-x-2 cursor-pointer">
      <i class="fas fa-users text-orange-500">
      </i>
        <a href="/admin/berita">
            Berita
        </a>
     </li>
     <li class="flex items-center space-x-2 cursor-pointer">
      <i class="fas fa-users text-orange-500">
      </i>
        <a href="/admin/kalkulator">
            Penggunaan Kalkulator
        </a>
     </li>
     {{-- <li>
      <button aria-expanded="true" class="flex items-center justify-between w-full bg-orange-100 rounded-md px-3 py-2 font-semibold text-orange-600" type="button">
       <span class="flex items-center space-x-2">
        <i class="fas fa-chalkboard-teacher">
        </i>
        <span>
         Training
        </span>
       </span>
       <i class="fas fa-chevron-down text-orange-600">
       </i>
      </button>
      <ul class="mt-2 ml-6 space-y-2 text-gray-900 font-bold text-sm">
       <li>
        <button class="block w-full text-left rounded-md bg-orange-100 px-3 py-1.5" type="button">
         Training Transaction
        </button>
       </li>
       <li>
        <button class="block w-full text-left rounded-md px-3 py-1.5 hover:bg-gray-100" type="button">
         Training Ticket
        </button>
       </li>
       <li>
        <button class="block w-full text-left rounded-md px-3 py-1.5 hover:bg-gray-100" type="button">
         Trainee
        </button>
       </li>
       <li>
        <button class="block w-full text-left rounded-md px-3 py-1.5 hover:bg-gray-100" type="button">
         Training Region
        </button>
       </li>
      </ul>
     </li>
     <li>
      <button aria-expanded="false" class="flex items-center justify-between w-full px-3 py-2 font-semibold text-gray-900 hover:bg-gray-100 rounded-md" type="button">
       <span class="flex items-center space-x-2">
        <i class="fas fa-box text-orange-500">
        </i>
        <span>
         Product
        </span>
       </span>
       <i class="fas fa-chevron-up text-orange-500">
       </i>
      </button>
      <ul class="mt-2 ml-6 space-y-2 text-gray-900 font-bold text-sm">
       <li>
        <button class="block w-full text-left rounded-md px-3 py-1.5 hover:bg-gray-100" type="button">
         Product Regions
        </button>
       </li>
       <li>
        <button class="block w-full text-left rounded-md px-3 py-1.5 hover:bg-gray-100" type="button">
         Product Catalog
        </button>
       </li>
       <li>
        <button class="block w-full text-left rounded-md px-3 py-1.5 hover:bg-gray-100" type="button">
         Products
        </button>
       </li>
       <li>
        <button class="block w-full text-left rounded-md px-3 py-1.5 hover:bg-gray-100" type="button">
         Product Transaction
        </button>
       </li>
      </ul>
     </li> --}}
    </ul>
   </nav>