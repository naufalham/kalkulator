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
                    Analisis Kelayakan Usaha Fesyen
                </h1>
            </div>
            <a href="{{ route('user.usaha.index') }}" class="absolute right-0 text-[#F97316] font-semibold hover:underline text-base">
                Keluar
            </a>
        </div>

        <hr>
        <!-- Pendapatan -->
        <section>
            <h2 class="font-extrabold text-black text-base mb-6 mt-6 select-none">
                Pendapatan
            </h2>
            <div id="pendapatan-fields" class="grid grid-cols-1 sm:grid-cols-2 gap-x-12 gap-y-6">
                <div class="flex flex-col">
                    <label class="text-sm text-black mb-1 select-none" for="modal">
                        Modal (Rp)
                    </label>
                    <input class="border border-gray-300 rounded-md px-3 py-2 text-sm focus:outline-none focus:ring-2 focus:ring-[#F97316]" id="modal" name="modal" type="text"/>
                </div>
                <div class="flex flex-col">
                    <label class="text-sm text-black mb-1 select-none" for="jasa">
                        Jasa (Rp)
                    </label>
                    <input class="border border-gray-300 rounded-md px-3 py-2 text-sm focus:outline-none focus:ring-2 focus:ring-[#F97316]" id="jasa" name="jasa" type="text"/>
                </div>
                <div class="flex flex-col">
                    <label class="text-sm text-black mb-1 select-none" for="penjualan">
                        Penjualan (Rp)
                    </label>
                    <input class="border border-gray-300 rounded-md px-3 py-2 text-sm focus:outline-none focus:ring-2 focus:ring-[#F97316]" id="penjualan" name="penjualan" type="text"/>
                </div>
            </div>
            <div class="flex mt-6">
                <button type="button" id="add-pendapatan" class="bg-[#F97316] text-white text-xs font-semibold rounded-xl px-4 py-2 hover:bg-[#e06f11] transition-colors mr-2">
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
                    <input class="border border-gray-300 rounded-md px-3 py-2 text-sm focus:outline-none focus:ring-2 focus:ring-[#F97316]" id="bahan" name="bahan" type="text"/>
                </div>
                <div class="flex flex-col">
                    <label class="text-sm text-black mb-1 select-none" for="gaji-karyawan">
                        Gaji Karyawan (Rp)
                    </label>
                    <input class="border border-gray-300 rounded-md px-3 py-2 text-sm focus:outline-none focus:ring-2 focus:ring-[#F97316]" id="gaji-karyawan" name="gaji-karyawan" type="text"/>
                </div>
                <div class="flex flex-col">
                    <label class="text-sm text-black mb-1 select-none" for="banyak-karyawan">
                        Banyak Karyawan
                    </label>
                    <input class="border border-gray-300 rounded-md px-3 py-2 text-sm focus:outline-none focus:ring-2 focus:ring-[#F97316]" id="banyak-karyawan" name="banyak-karyawan" type="text"/>
                </div>
                <div class="flex flex-col">
                    <label class="text-sm text-black mb-1 select-none" for="sewa-tempat">
                        Sewa Tempat (Rp)
                    </label>
                    <input class="border border-gray-300 rounded-md px-3 py-2 text-sm focus:outline-none focus:ring-2 focus:ring-[#F97316]" id="sewa-tempat" name="sewa-tempat" type="text"/>
                </div>
                <div class="flex flex-col">
                    <label class="text-sm text-black mb-1 select-none" for="listrik">
                        Listrik (Rp)
                    </label>
                    <input class="border border-gray-300 rounded-md px-3 py-2 text-sm focus:outline-none focus:ring-2 focus:ring-[#F97316]" id="listrik" name="listrik" type="text"/>
                </div>
            </div>
            <div class="flex mt-6">
                <button type="button" id="add-pengeluaran" class="bg-[#F97316] text-white text-xs font-semibold rounded-xl px-4 py-2 hover:bg-[#e06f11] transition-colors mr-2">
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