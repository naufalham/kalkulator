<html lang="en">
<head>
    <meta charset="utf-8"/>
    <meta content="width=device-width, initial-scale=1" name="viewport"/>
    <title>AKUNaZma</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" rel="stylesheet"/>
    <!-- Tambahkan di <head> -->
        <link href="https://cdn.jsdelivr.net/npm/summernote@0.8.20/dist/summernote-lite.min.css" rel="stylesheet">
    <style>
        body {
            font-family: 'Poppins', sans-serif;
        }
    </style>
</head>

<!-- filepath: resources/views/admin/faq/edit.blade.php -->
<x-navmin></x-navmin>

 <body class="bg-[#f5f8ff] text-gray-900 pt-16">

    <main class="flex flex-col sm:flex-row min-h-[calc(100vh-56px)]">
        <x-sidemin></x-sidemin>
    
    <!-- News list -->
        <section class="bg-white flex-grow p-4 flex flex-col space-y-4">
            <h1 class="text-xl font-semibold mb-4 text-center">
                Edit Pertanyaan
            </h1>

            <form class="flex flex-col gap-6" action="{{ route('admin.faq.update', $faq) }}" method="POST">
                @csrf
                @method('PUT')
                <div class="flex flex-col gap-1">
                    <label class="block mb-1 text-sm">Pertanyaan</label>
                    <input type="text" name="question" value="{{ old('question', $faq->question) }}" class="w-full border rounded px-3 py-2 text-sm" required>
                </div>
                <div class="flex flex-col gap-1">
                    <label class="block mb-1 text-sm">Jawaban</label>
                    <textarea name="answer" class="w-full border rounded px-3 py-2 text-sm" rows="5" required>{{ old('answer', $faq->answer) }}</textarea>
                </div>
                <div class="flex gap-2 justify-end mt-4">
                    <a href="{{ route('admin.faq.index') }}" class="bg-gray-300 text-gray-800 rounded-xl py-2 px-6 text-sm font-semibold select-none hover:bg-gray-400 transition">
                        Batal
                    </a>
                    <button class="bg-[#F97316] text-white rounded-xl py-2 px-6 text-sm font-semibold select-none" type="submit">
                        Simpan
                    </button>
            </form>
        </section>
    </main>
</body>