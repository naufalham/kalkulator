@extends('layouts.head')

@section('content')

    <h1 class="text-xl font-semibold mb-4 text-center">
        Tambah Pertanyaan
    </h1>

    <form class="flex flex-col gap-6" action="{{ route('admin.faq.store') }}" method="POST">
        @csrf
        <div class="flex flex-col gap-1">
            <label class="block mb-1 text-sm">Pertanyaan</label>
            <input type="text" name="question" class="w-full border rounded px-3 py-2" required>
        </div>
        <div class="flex flex-col gap-1">
            <label class="block mb-1 text-sm">Jawaban</label>
            <textarea name="answer" class="w-full border rounded px-3 py-2" rows="5" required></textarea>
        </div>
        <div class="flex gap-2 justify-end mt-4">
            <a href="{{ route('admin.faq.index') }}" class="bg-gray-300 text-gray-800 rounded-xl py-2 px-6 text-sm font-semibold select-none hover:bg-gray-400 transition">
                Batal
            </a>
            <button class="bg-[#F97316] text-white rounded-xl py-2 px-6 text-sm font-semibold select-none" type="submit">
                Kirim
            </button>
        </div>
    </form>
@endsection