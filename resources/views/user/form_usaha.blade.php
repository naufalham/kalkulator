@vite(['resources/css/form_usaha.css','resources/js/app.js'])
<!-- Navbar -->
<x-navbar></x-navbar>

<!-- Main content -->
<main class="flex-grow max-w-7xl mx-auto px-8 sm:px-16 lg:px-24 py-8 w-full pt-32">
    <form autocomplete="off" class="bg-white rounded-xl p-8 max-w-6xl w-full mx-auto space-y-2" novalidate="" method="POST" action="{{ route('user.usaha.export') }}">
        @csrf
        <!-- Header -->
        <div class="col-span-full mb-6 flex items-center justify-between relative">
            <div class="flex-1 flex justify-center">
                <h1 class="font-extrabold text-black text-lg select-none text-center">
                    Analisis Kelayakan Usaha {{ $layanan->nama_layanan ?? '' }}
                </h1>
            </div>
            <a href="{{ route ('user.usaha.index') }}" class="text-[#F97316] font-semibold hover:underline text-3xl leading-none">
                &times;
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
                @foreach($fieldsPendapatan as $i => $field)
                    <div class="flex flex-col">
                        <label class="text-sm text-black mb-1 select-none" for="pendapatan_{{ $i }}">
                            @if(($layanan->tipe ?? '') === 'campuran' && $field->layanan)
                                [{{ $field->layanan->nama_layanan }}]
                            @endif
                            {{ $field->nama_pendapatan }} (Rp)
                        </label>
                        <input type="hidden" name="pendapatan_statis[{{ $i }}][label]" value="{{ $field->nama_pendapatan }}">
                        <input class="border border-gray-300 rounded-md px-3 py-2 text-sm focus:outline-none focus:ring-2 focus:ring-[#F97316]"
                            id="pendapatan_{{ $i }}"
                            name="pendapatan_statis[{{ $i }}][value]"
                            type="number"/>
                    </div>
                @endforeach
            </div>
            <div class="flex mt-6">
                <button type="button" id="add-field" class="bg-[#F97316] text-white text-sm font-semibold rounded-lg px-4 py-3 hover:bg-[#e06f11] transition-colors mr-2">
                    Tambah Pendapatan
                </button>
            </div>
            <div id="dynamic-fields" class="space-y-4">
            </div>
        </section>

        <!-- Pengeluaran -->
        <section>
            <h2 class="font-extrabold text-black text-base mb-6 mt-6 select-none">
                Pengeluaran
            </h2>
            <div id="pengeluaran-fields" class="grid grid-cols-1 sm:grid-cols-2 gap-x-12 gap-y-6">
                @foreach($fieldsPengeluaran as $i => $field)
                    <div class="flex flex-col">
                        <label class="text-sm text-black mb-1 select-none" for="pengeluaran_{{ $i }}">
                            @if(($layanan->tipe ?? '') === 'campuran' && $field->layanan)
                                [{{ $field->layanan->nama_layanan }}]
                            @endif
                            {{ $field->nama_pengeluaran }} (Rp)
                        </label>
                        <input type="hidden" name="pengeluaran_statis[{{ $i }}][label]" value="{{ $field->nama_pengeluaran }}">
                        <input class="border border-gray-300 rounded-md px-3 py-2 text-sm focus:outline-none focus:ring-2 focus:ring-[#F97316]"
                            id="pengeluaran_{{ $i }}"
                            name="pengeluaran_statis[{{ $i }}][value]"
                            type="number"/>
                    </div>
                @endforeach
            </div>
            <div class="flex mt-6">

                <button type="button" id="add-field-pengeluaran" class="bg-[#F97316] text-white text-sm font-semibold rounded-lg px-4 py-3 hover:bg-[#e06f11] transition-colors mr-2">
                    Tambah Pengeluaran
                </button>
            </div>
            <div id="dynamic-fields" class="space-y-4">
            </div>
        </section>

        <div class="flex justify-end">
            <button class="bg-[#F97316] text-white text-sm font-semibold rounded-full px-6 py-3 hover:bg-[#e06f11] transition-colors" type="submit">
                Unduh Hasil
            </button>
        </div>
    </form>
</main>

<script>
    const isCampuran = "{{ $layanan->tipe ?? '' }}" === "campuran";
    let pendapatanCount = 0;
    const maxPendapatan = 3;
    document.getElementById('add-field').onclick = function() {
        if (isCampuran || pendapatanCount < maxPendapatan) {
            pendapatanCount++;
            const container = document.getElementById('pendapatan-fields');
            const div = document.createElement('div');
            div.className = "flex flex-col mb-2";
            div.innerHTML = `
                <div class="flex items-center mb-1">
                    <input class="border border-gray-300 rounded-md px-3 py-2 text-sm flex-1 focus:outline-none focus:ring-2 focus:ring-[#F97316]"
                        name="pendapatan_tambahan_label[]"
                        type="text"
                        placeholder="Nama Pendapatan (misal: Pendapatan Lain)"
                        required
                    />
                    <input class="border border-gray-300 rounded-md px-3 py-2 text-sm ml-2 focus:outline-none focus:ring-2 focus:ring-[#F97316]"
                        name="pendapatan_tambahan[]"
                        type="number"
                        placeholder="Nominal (Rp)"
                        required
                    />
                    <button type="button" class="ml-2 text-red-500 font-bold remove-pendapatan">×</button>
                </div>
            `;
            container.appendChild(div);
            updateRemovePendapatan();
        }
    };

    function updateRemovePendapatan() {
        document.querySelectorAll('.remove-pendapatan').forEach(btn => {
            btn.onclick = function() {
                this.closest('.flex.flex-col').remove();
                pendapatanCount--;
            }
        });
    }

    // Pengeluaran
    let pengeluaranCount = 0;
    const maxPengeluaran = 3;
    document.getElementById('add-field-pengeluaran').onclick = function() {
        if (isCampuran || pengeluaranCount < maxPengeluaran) {
            pengeluaranCount++;
            const container = document.getElementById('pengeluaran-fields');
            const div = document.createElement('div');
            div.className = "flex flex-col mb-2";
            div.innerHTML = `
                <div class="flex items-center mb-1">
                    <input class="border border-gray-300 rounded-md px-3 py-2 text-sm flex-1 focus:outline-none focus:ring-2 focus:ring-[#F97316]"
                        name="pengeluaran_tambahan_label[]"
                        type="text"
                        placeholder="Nama Pengeluaran (misal: Biaya Lain)"
                        required
                    />
                    <input class="border border-gray-300 rounded-md px-3 py-2 text-sm ml-2 focus:outline-none focus:ring-2 focus:ring-[#F97316]"
                        name="pengeluaran_tambahan[]"
                        type="number"
                        placeholder="Nominal (Rp)"
                        required
                    />
                    <button type="button" class="ml-2 text-red-500 font-bold remove-pengeluaran">×</button>
                </div>
            `;
            container.appendChild(div);
            updateRemovePengeluaran();
        }
    };

    function updateRemovePengeluaran() {
        document.querySelectorAll('.remove-pengeluaran').forEach(btn => {
            btn.onclick = function() {
                this.closest('.flex.flex-col').remove();
                pengeluaranCount--;
            }
        });
    }
</script>

<x-wa />

<!-- Footer -->
<div class="mt-10"></div>
<x-footer></x-footer>
