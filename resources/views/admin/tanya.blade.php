<x-navmin></x-navmin>

 <body class="bg-[#f5f8ff] text-gray-900 pt-16">

    <main class="flex flex-col sm:flex-row min-h-[calc(100vh-56px)]">
    <x-sidemin></x-sidemin>
    
    <!-- News list -->
    <section class="flex-1 p-4 sm:p-6 overflow-x-auto">

        <h1 class="font-semibold text-gray-900 text-base mb-4">
            Pertinyiinnyi
        </h1>

<a href="{{ route('admin.faq.create') }}">Tambah FAQ</a>

<table>
    <tr><th>Pertanyaan</th><th>Aksi</th></tr>
    @foreach($faqs as $faq)
    <tr>
        <td>{{ $faq->question }}</td>
        <td>
            <a href="{{ route('admin.faq.edit', $faq) }}">Edit</a>
            <form action="{{ route('admin.faq.destroy', $faq) }}" method="POST" style="display:inline">
                @csrf @method('DELETE')
                <button type="submit">Hapus</button>
            </form>
        </td>
    </tr>
    @endforeach
</table>

</section>

    </main>

 </body>

<x-footer></x-footer>