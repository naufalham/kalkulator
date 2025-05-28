@vite(['resources/css/form_usaha.css','resources/js/app.js'])
<!-- Navbar -->
<x-navbar></x-navbar>

<!-- Main content -->
<main class="flex-grow max-w-7xl mx-auto px-8 sm:px-16 lg:px-24 py-8 w-full pt-32">
    <form autocomplete="off" class="bg-white rounded-xl p-8 max-w-6xl w-full mx-auto space-y-2" novalidate="" method="POST" action="{{ route('export.analisis.usaha') }}">
        @csrf
        <!-- Header -->
        <div class="col-span-full mb-6 flex items-center justify-between relative">
            <div class="flex-1 flex justify-center">
                <h1 class="font-extrabold text-black text-lg select-none text-center">
                    Analisis Kelayakan Usaha {{ $layanan->nama_layanan ?? '' }}
                </h1>
            </div>
            <a href="{{ route('user.usaha.index') }}" class="absolute right-0 text-[#F97316] font-semibold hover:underline text-base">
                Keluar
            </a>
        </div>

        <hr>
        <!-- Pendapatan -->
        <input type="hidden" name="layanan_id" value="{{ $layanan->id }}">
        
        <section>
            <h2 class="font-extrabold text-black text-base mb-6 mt-6 select-none">
                Pendapatan
            </h2>
            <div id="pendapatan-fields" class="grid grid-cols-1 sm:grid-cols-2 gap-x-12 gap-y-6">
                <div class="flex flex-col">
                    <label class="text-sm text-black mb-1 select-none" for="modal">
                        Modal (Rp)
                    </label>
                    <input type="hidden" name="pendapatan_statis[0][label]" value="Modal">
                    <input class="border border-gray-300 rounded-md px-3 py-2 text-sm focus:outline-none focus:ring-2 focus:ring-[#F97316]" id="modal" name="pendapatan_statis[0][value]" type="number"/>
                </div>
                <div class="flex flex-col">
                    <label class="text-sm text-black mb-1 select-none" for="jasa">
                        Jasa (Rp)
                    </label>
                    <input type="hidden" name="pendapatan_statis[1][label]" value="Jasa">
                    <input class="border border-gray-300 rounded-md px-3 py-2 text-sm focus:outline-none focus:ring-2 focus:ring-[#F97316]" id="jasa" name="pendapatan_statis[1][value]" type="number"/>
                </div>
                <div class="flex flex-col">
                    <label class="text-sm text-black mb-1 select-none" for="penjualan">
                        Penjualan (Rp)
                    </label>
                    <input type="hidden" name="pendapatan_statis[2][label]" value="Penjualan">
                    <input class="border border-gray-300 rounded-md px-3 py-2 text-sm focus:outline-none focus:ring-2 focus:ring-[#F97316]" id="penjualan" name="pendapatan_statis[2][value]" type="number"/>
                </div>
            </div>
            <div class="flex mt-6">
                <div id="dynamic-fields" class="space-y-4">
                    <div class="flex gap-2">
                        <input type="text" name="fields_pendapatan[0][label]" ...>
                        <input type="number" name="fields_pendapatan[0][value]" ...>
                        <button type="button" class="remove-field bg-red-500 text-white px-2 rounded">Hapus</button>
                    </div>
                </div>
                <button type="button" id="add-field" class="bg-[#F97316] text-white text-xs font-semibold rounded-xl px-4 py-2 hover:bg-[#e06f11] transition-colors mr-2">
                    + Tambah Pendapatan
                </button>
            </div>
        </section>

        <!-- Pengeluaran -->
        <section>
            <h2 class="font-extrabold text-black text-base mb-6 mt-6 select-none">
                Pengeluaran
            </h2>
            <div id="pengeluaran-fields" class="grid grid-cols-1 sm:grid-cols-2 gap-x-12 gap-y-6">
                <div class="flex flex-col">
                    <label class="text-sm text-black mb-1 select-none" for="bahan">
                        Bahan (Rp)
                    </label>
                    <input type="hidden" name="pengeluaran_statis[0][label]" value="Bahan">
                    <input class="border border-gray-300 rounded-md px-3 py-2 text-sm focus:outline-none focus:ring-2 focus:ring-[#F97316]" id="bahan" name="pengeluaran_statis[0][value]" type="text"/>
                </div>
                <div class="flex flex-col">
                    <label class="text-sm text-black mb-1 select-none" for="gaji-karyawan">
                        Gaji Karyawan (Rp)
                    </label>
                    <input type="hidden" name="pengeluaran_statis[1][label]" value="Gaji Karyawan">
                    <input class="border border-gray-300 rounded-md px-3 py-2 text-sm focus:outline-none focus:ring-2 focus:ring-[#F97316]" id="gaji-karyawan" name="pengeluaran_statis[1][value]" type="text"/>
                </div>
                <div class="flex flex-col">
                    <label class="text-sm text-black mb-1 select-none" for="banyak-karyawan">
                        Banyak Karyawan
                    </label>
                    <input type="hidden" name="pengeluaran_statis[2][label]" value="Banyak Karyawan">
                    <input class="border border-gray-300 rounded-md px-3 py-2 text-sm focus:outline-none focus:ring-2 focus:ring-[#F97316]" id="banyak-karyawan" name="pengeluaran_statis[2][value]" type="text"/>
                </div>
                <div class="flex flex-col">
                    <label class="text-sm text-black mb-1 select-none" for="sewa-tempat">
                        Sewa Tempat (Rp)
                    </label>
                    <input type="hidden" name="pengeluaran_statis[3][label]" value="Sewa Tempat">
                    <input class="border border-gray-300 rounded-md px-3 py-2 text-sm focus:outline-none focus:ring-2 focus:ring-[#F97316]" id="sewa-tempat" name="pengeluaran_statis[3][value]" type="text"/>
                </div>
                <div class="flex flex-col">
                    <label class="text-sm text-black mb-1 select-none" for="listrik">
                        Listrik (Rp)
                    </label>
                    <input type="hidden" name="pengeluaran_statis[4][label]" value="Listrik">
                    <input class="border border-gray-300 rounded-md px-3 py-2 text-sm focus:outline-none focus:ring-2 focus:ring-[#F97316]" id="listrik" name="pengeluaran_statis[4][value]" type="text"/>
                </div>
            </div>
            <div class="flex mt-6">
                <!-- Pengeluaran Dinamis -->
                <div id="dynamic-fields-pengeluaran" class="space-y-4">
                    <div class="flex gap-2">
                        <input type="text" name="fields_pengeluaran[0][label]" placeholder="Label" class="border rounded px-2 py-1" required>
                        <input type="number" name="fields_pengeluaran[0][value]" placeholder="Nilai" class="border rounded px-2 py-1" required>
                        <button type="button" class="remove-field-pengeluaran bg-red-500 text-white px-2 rounded">Hapus</button>
                    </div>
                </div>
                <button type="button" id="add-field-pengeluaran" class="bg-[#F97316] text-white text-xs font-semibold rounded-xl px-4 py-2 hover:bg-[#e06f11] transition-colors mr-2">
                    + Tambah Pengeluaran
                </button>
            </div>
        </section>

        <div class="flex justify-end">
            <button class="bg-[#F97316] text-white text-sm font-semibold rounded-lg px-6 py-3 hover:bg-[#e06f11] transition-colors" type="submit">
                Unduh Hasil
            </button>
        </div>
    </form>
</main>

{{-- Scripts for dynamic fields --}}
<script>
let fieldIndex = 1;
document.getElementById('add-field').onclick = function() {
    const container = document.getElementById('dynamic-fields');
    const div = document.createElement('div');
    div.className = 'flex gap-2 mt-2';
    div.innerHTML = `
        <input type="text" name="fields_pendapatan[${fieldIndex}][label]" placeholder="Label" class="border rounded px-2 py-1" required>
        <input type="number" name="fields_pendapatan[${fieldIndex}][value]" placeholder="Nilai" class="border rounded px-2 py-1" required>
        <button type="button" class="remove-field bg-red-500 text-white px-2 rounded">Hapus</button>
    `;
    container.appendChild(div);
    fieldIndex++;
};

document.addEventListener('click', function(e) {
    if (e.target.classList.contains('remove-field')) {
        e.target.parentElement.remove();
    }
});
</script>

{{-- script dinamis pengeluaran --}}
<script>
let pengeluaranIndex = 1;
document.getElementById('add-field-pengeluaran').onclick = function() {
    const container = document.getElementById('dynamic-fields-pengeluaran');
    const div = document.createElement('div');
    div.className = 'flex gap-2 mt-2';
    div.innerHTML = `
        <input type="text" name="fields_pengeluaran[${pengeluaranIndex}][label]" placeholder="Label" class="border rounded px-2 py-1" required>
        <input type="number" name="fields_pengeluaran[${pengeluaranIndex}][value]" placeholder="Nilai" class="border rounded px-2 py-1" required>
        <button type="button" class="remove-field-pengeluaran bg-red-500 text-white px-2 rounded">Hapus</button>
    `;
    container.appendChild(div);
    pengeluaranIndex++;
};

document.addEventListener('click', function(e) {
    if (e.target.classList.contains('remove-field-pengeluaran')) {
        e.target.parentElement.remove();
    }
});
</script>

<!-- Footer -->
<div class="mt-10"></div>
<x-footer></x-footer>

<script>
// Pendapatan
let pendapatanCount = 0;
const maxPendapatan = 5;
document.getElementById('add-pendapatan').onclick = function() {
    if (pendapatanCount < maxPendapatan) {
        pendapatanCount++;
        const container = document.getElementById('pendapatan-fields');
        const div = document.createElement('div');
        div.className = "flex flex-col";
        div.innerHTML = `
            <div class="flex items-center mb-1">
                <input class="border border-gray-300 rounded-md px-3 py-2 text-sm flex-1 focus:outline-none focus:ring-2 focus:ring-[#F97316]" 
                    name="pendapatan_tambahan_label[]" 
                    type="text" 
                    placeholder="Nama Pendapatan (misal: Pendapatan Lain)" 
                    required
                />
                <button type="button" class="ml-2 text-red-500 font-bold remove-pendapatan">×</button>
            </div>
            <input class="border border-gray-300 rounded-md px-3 py-2 text-sm focus:outline-none focus:ring-2 focus:ring-[#F97316]" 
                name="pendapatan_tambahan[]" 
                type="text" 
                placeholder="Nominal (Rp)" 
                required
            />
        `;
        container.appendChild(div);
        updateRemovePendapatan();
    }
    if (pendapatanCount >= maxPendapatan) {
        this.disabled = true;
        this.classList.add('opacity-50', 'cursor-not-allowed');
    }
};
function updateRemovePendapatan() {
    document.querySelectorAll('.remove-pendapatan').forEach(btn => {
        btn.onclick = function() {
            this.closest('.flex.flex-col').remove();
            pendapatanCount--;
            const addBtn = document.getElementById('add-pendapatan');
            addBtn.disabled = false;
            addBtn.classList.remove('opacity-50', 'cursor-not-allowed');
        }
    });
}

// Pengeluaran
let pengeluaranCount = 0;
const maxPengeluaran = 3;
document.getElementById('add-pengeluaran').onclick = function() {
    if (pengeluaranCount < maxPengeluaran) {
        pengeluaranCount++;
        const container = document.getElementById('pengeluaran-fields');
        const div = document.createElement('div');
        div.className = "flex flex-col";
        div.innerHTML = `
            <div class="flex items-center mb-1">
                <input class="border border-gray-300 rounded-md px-3 py-2 text-sm flex-1 focus:outline-none focus:ring-2 focus:ring-[#F97316]" 
                    name="pengeluaran_tambahan_label[]" 
                    type="text" 
                    placeholder="Nama Pengeluaran (misal: Biaya Lain)" 
                    required
                />
                <button type="button" class="ml-2 text-red-500 font-bold remove-pengeluaran">×</button>
            </div>
            <input class="border border-gray-300 rounded-md px-3 py-2 text-sm focus:outline-none focus:ring-2 focus:ring-[#F97316]" 
                name="pengeluaran_tambahan[]" 
                type="text" 
                placeholder="Nominal (Rp)" 
                required
            />
        `;
        container.appendChild(div);
        updateRemovePengeluaran();
    }
    if (pengeluaranCount >= maxPengeluaran) {
        this.disabled = true;
        this.classList.add('opacity-50', 'cursor-not-allowed');
    }
};
function updateRemovePengeluaran() {
    document.querySelectorAll('.remove-pengeluaran').forEach(btn => {
        btn.onclick = function() {
            this.closest('.flex.flex-col').remove();
            pengeluaranCount--;
            const addBtn = document.getElementById('add-pengeluaran');
            addBtn.disabled = false;
            addBtn.classList.remove('opacity-50', 'cursor-not-allowed');
        }
    });
}
</script>