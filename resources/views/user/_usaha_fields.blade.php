{{-- resources/views/user/_usaha_fields.blade.php --}}

<h3 class="font-semibold text-black text-sm mb-4 select-none">Pendapatan</h3>
<div class="grid grid-cols-1 sm:grid-cols-2 gap-x-12 gap-y-6">
    @foreach ($fieldsPendapatan as $i => $field)
        <div class="flex flex-col">
            <label class="text-sm text-black mb-1 select-none"
                for="usaha_{{ $index }}_pendapatan_{{ $i }}">
                {{ $field->nama_pendapatan }} (Rp)
            </label>
            <input type="hidden"
                name="usaha_tambahan[{{ $index }}][pendapatan_statis][{{ $i }}][label]"
                value="{{ $field->nama_pendapatan }}">
            <input
                class="border border-gray-300 rounded-md px-3 py-2 text-sm focus:outline-none focus:ring-2 focus:ring-[#F97316]"
                id="usaha_{{ $index }}_pendapatan_{{ $i }}"
                name="usaha_tambahan[{{ $index }}][pendapatan_statis][{{ $i }}][value]"
                type="number" />
        </div>
    @endforeach
</div>

<h3 class="font-semibold text-black text-sm mb-4 mt-6 select-none">Pengeluaran</h3>
<div class="grid grid-cols-1 sm:grid-cols-2 gap-x-12 gap-y-6">
    @foreach ($fieldsPengeluaran as $i => $field)
        <div class="flex flex-col">
            <label class="text-sm text-black mb-1 select-none"
                for="usaha_{{ $index }}_pengeluaran_{{ $i }}">
                {{ $field->nama_pengeluaran }} (Rp)
            </label>
            <input type="hidden"
                name="usaha_tambahan[{{ $index }}][pengeluaran_statis][{{ $i }}][label]"
                value="{{ $field->nama_pengeluaran }}">
            <input
                class="border border-gray-300 rounded-md px-3 py-2 text-sm focus:outline-none focus:ring-2 focus:ring-[#F97316]"
                id="usaha_{{ $index }}_pengeluaran_{{ $i }}"
                name="usaha_tambahan[{{ $index }}][pengeluaran_statis][{{ $i }}][value]"
                type="number" />
        </div>
    @endforeach
</div>

{{-- Jika Anda ingin menambahkan tombol "Tambah Pendapatan/Pengeluaran" dinamis untuk setiap usaha tambahan,
     Anda perlu menambahkan HTML dan JavaScript yang sesuai di sini dan menyesuaikan logika JavaScript utama.
     Untuk saat ini, kita hanya menampilkan field statis. --}}
