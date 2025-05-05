<x-navmin></x-navmin>

<x-sidemin></x-sidemin>

<!-- Form -->
<section class="bg-white rounded-2xl flex-grow p-4 flex flex-col space-y-4">
    <form class="flex flex-col gap-6">
     <div class="flex flex-col gap-1">
      <label class="text-black text-sm font-normal select-none" for="judul">
       Judul Berita
      </label>
      <input class="border border-gray-400 rounded-lg py-2 px-4 text-black text-sm focus:outline-none focus:ring-2 focus:ring-[#F87F1A]" id="judul" type="text"/>
     </div>
     <div class="flex flex-col gap-1">
      <label class="text-black text-sm font-normal select-none" for="gambar">
       Gambar Berita
      </label>
      <input class="border border-gray-400 rounded-lg py-2 px-4 text-black text-sm focus:outline-none focus:ring-2 focus:ring-[#F87F1A]" id="gambar" type="text"/>
     </div>
     <div class="flex flex-col gap-1">
      <label class="text-black text-sm font-normal select-none" for="isi">
       Isi Berita
      </label>
      <textarea class="border border-gray-400 rounded-lg py-2 px-4 text-black text-sm resize-none focus:outline-none focus:ring-2 focus:ring-[#F87F1A]" id="isi" rows="8"></textarea>
     </div>
     <div class="flex justify-end">
      <button class="bg-[#F87F1A] text-white rounded-xl py-3 px-10 text-sm font-semibold select-none" type="submit">
       Kirim
      </button>
     </div>
    </form>
</section>
</main>


<x-footer></x-footer>