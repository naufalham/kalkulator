<x-navmin></x-navmin>

 <body class="bg-[#f5f8ff] text-gray-900 pt-16">

    <main class="flex flex-col sm:flex-row min-h-[calc(100vh-56px)]">
    <x-sidemin></x-sidemin>
    
    <!-- News list -->
    <section class="flex-1 p-4 sm:p-6 overflow-x-auto">

        <h1 class="font-semibold text-gray-900 text-base mb-4">
            Tambah Pertinyiinnyi
        </h1>

    <form action="{{ route('admin.faq.store') }}" method="POST">
        @csrf
        <div class="mb-4">
            <label class="block mb-1">Pertanyaan</label>
            <input type="text" name="question" class="w-full border rounded px-3 py-2" required>
        </div>
        <div class="mb-4">
            <label class="block mb-1">Jawaban</label>
            <textarea name="answer" class="w-full border rounded px-3 py-2" rows="5" required></textarea>
        </div>
        <button type="submit" class="bg-[#F97316] text-white px-4 py-2 rounded">Simpan</button>
        <a href="{{ route('admin.faq.index') }}" class="ml-2 text-gray-600">Batal</a>
    </form>
    </section>
</main>

 </body>
<x-footer></x-footer>