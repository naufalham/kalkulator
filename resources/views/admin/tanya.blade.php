@extends('layouts.head')

@section('content')

<h1 class="text-xl font-semibold mb-4">Daftar FAQ</h1>

    <div class="flex justify-between items-center flex-wrap gap-4 mb-10">
        <form method="GET" action="{{ route('admin.faq.index') }}"
            class="bg-white rounded-lg px-4 py-3 w-full sm:max-w-md flex items-center gap-2 shadow">
            <i class="fas fa-search text-black text-sm"></i>
            <input type="text" name="q" value="{{ request('q') }}"
                placeholder="Cari Pertanyaan"
                class="bg-transparent text-sm outline-none w-full"
            />
        </form>

        <a href="{{ route('admin.faq.create') }}" class="bg-[#F97316] text-white px-4 py-2 rounded-lg text-sm font-semibold hover:bg-[#d96c13] transition">
            Tambah FAQ
        </a>
    </div>

    <div class="overflow-x-auto bg-white rounded-lg shadow cursor-pointer">
        <table class="w-full border-collapse border border-gray-200 text-sm min-w-[600px]">
            <thead>
                <tr class="bg-[#f5f8ff] border-b border-gray-200">
                    <th class="border px-3 py-2 text-left font-semibold">No</th>
                    <th class="border px-3 py-2 text-left font-semibold">Pertanyaan</th>
                    <th class="border px-3 py-2 text-left font-semibold">Jawaban</th>
                    <th class="border px-3 py-2 text-left font-semibold">Aksi</th>
                </tr>
            </thead>
            <tbody>
                @foreach($faqs as $faq)
                <tr class="border-t hover:bg-gray-50">
                    <td class="border px-3 py-2">{{ $loop->iteration }}</td>
                    <td class="border px-3 py-2">{{ $faq->question }}</td>
                    <td class="border px-3 py-2">{{ $faq->answer }}</td>
                    <td class="border px-3 py-2">
                        <div class="flex gap-2">
                            <form action="{{ route('admin.faq.edit', $faq) }}" method="GET">
                                <button class="bg-yellow-400 text-black text-sm font-semibold px-3 py-1 rounded hover:bg-yellow-500">
                                    Edit
                                </button>
                            </form>

                            <form action="{{ route('admin.faq.destroy', $faq) }}" method="POST" onsubmit="return confirm('Yakin ingin menghapus?')">
                                @csrf
                                @method('DELETE')
                                <button class="bg-red-600 text-white text-sm font-semibold px-3 py-1 rounded hover:bg-red-700">
                                    Hapus
                                </button>
                            </form>
                        </div>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection