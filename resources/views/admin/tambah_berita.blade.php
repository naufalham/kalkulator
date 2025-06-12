@extends('layouts.head')

@section('content')
    <h1 class="text-xl font-semibold mb-4 text-center">Tambah Berita</h1>
    <form class="flex flex-col gap-6" method="POST" action="{{ route('admin.berita.store') }}" enctype="multipart/form-data">
        @csrf
        <div class="flex flex-col gap-1">
            <label class="text-black text-sm font-normal select-none" for="judul">
                Judul Berita
            </label>
            <input class="border border-gray-400 rounded-lg py-2 px-4 text-black text-sm focus:outline-none focus:ring-2 focus:ring-[#F87F1A]" id="judul" type="text" name="judul" value="{{ old('judul') }}" required />
        </div>
        <div class="flex flex-col gap-1">
            <label class="text-black text-sm font-normal select-none" for="gambar">
                Gambar Berita
            </label>
            {{-- Menampilkan pesan kesalahan jika ada --}}
            @if ($errors->any())
                <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-2 rounded mb-4">
                    <ul class="text-xs list-disc pl-5">
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
            <input class="border border-gray-400 rounded-lg py-2 px-4 text-black text-sm focus:outline-none focus:ring-2 focus:ring-[#F87F1A]" id="foto" type="file" name="foto" required />
        </div>
        <div class="flex flex-col gap-1">
            <label class="text-black text-sm font-normal select-none" for="isi">
                Isi Berita
            </label>
            <textarea class="border border-gray-400 rounded-lg py-2 px-4 text-black text-sm resize-none focus:outline-none focus:ring-2 focus:ring-[#F87F1A]" id="isi" rows="8" name="isi" required>{{ old('isi') }}</textarea>
        </div>
        <div class="flex gap-2 justify-end mt-4">
            <a href="{{ route('admin.berita.index') }}" class="bg-gray-300 text-gray-800 rounded-xl py-2 px-6 text-sm font-semibold select-none hover:bg-gray-400 transition">
                Batal
            </a>
            <button class="bg-[#F97316] text-white rounded-xl py-2 px-6 text-sm font-semibold select-none" type="submit">
                Kirim
            </button>
        </div>
    </form>
@endsection

{{-- <script src="https://cdn.ckeditor.com/ckeditor5/39.0.1/classic/ckeditor.js"></script>
<script>
    ClassicEditor
        .create(document.querySelector('#isi'))
        .catch(error => {
            console.error(error);
        });
</script> --}}

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/summernote@0.8.20/dist/summernote-lite.min.js"></script>
<script>
  document.addEventListener('DOMContentLoaded', function() {
    $('#isi').summernote({
      height: 200
    });
  });
</script>


</main>