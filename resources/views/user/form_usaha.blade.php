{{-- resources/views/user/form_usaha.blade.php --}}

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

        {{-- Tambahan dropdown usaha lain (jika layanan ID 5) --}}
             @if($layanan->id == 5)
            <section id="replikasi-usaha-section" class="mt-10 space-y-4">
                <h2 class="font-extrabold text-black text-base mb-4 select-none">Tambahkan Usaha Lain</h2>
                <div id="usaha-wrapper" class="space-y-6">
                    <!-- tempat usaha tambahan akan muncul -->
                </div>
                <button type="button" id="add-usaha-btn" class="bg-[#F97316] text-white font-semibold rounded-lg px-6 py-3 hover:bg-[#e06f11]">
                    Tambah Usaha
                </button>
            </section>
            @endif

         @unless($layanan->id == 5) {{-- <-- Tambahkan kondisi ini --}}
            {{-- Always include the main layanan_id --}}
            <input type="hidden" name="layanan_id" value="{{ $layanan->id }}">

            {{-- Tambahan dropdown usaha lain (jika layanan ID 5) --}}
            @if($layanan->id == 5)
                <section id="replikasi-usaha-section" class="mt-10 space-y-4">
                    <h2 class="font-extrabold text-black text-base mb-4 select-none">Tambahkan Usaha Lain</h2>
                    <div id="usaha-wrapper" class="space-y-6">
                        <!-- tempat usaha tambahan akan muncul -->
                    </div>
                    <button type="button" id="add-usaha-btn" class="bg-[#F97316] text-white font-semibold rounded-lg px-6 py-3 hover:bg-[#e06f11]">
                        Tambah Usaha
                    </button>
                </section>
            @endif

            {{-- Always display the main business fields --}}
            <section>
                <h2 class="font-extrabold text-black text-base mb-6 mt-6 select-none">
                    @if($layanan->id == 5)
                        Pendapatan Usaha Utama ({{ $layanan->nama_layanan ?? '' }})
                    @else
                        Pendapatan
                    @endif
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
                    @if($layanan->id == 5)
                        Pengeluaran Usaha Utama ({{ $layanan->nama_layanan ?? '' }})
                    @else
                        Pengeluaran
                    @endif
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
                                type="number" />
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
        @endunless

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

<script>
    const usahaList = @json($semuaLayanan->where('id', '!=', 5)->values()); // ID 5 is excluded here
    // const usahaList = @json($semuaLayanan->values());
    let usahaCount = 0;

    document.getElementById('add-usaha-btn')?.addEventListener('click', function () {
        const wrapper = document.getElementById('usaha-wrapper');
        const currentIndex = usahaCount; // Tangkap nilai usahaCount saat ini untuk blok ini


        const usahaDiv = document.createElement('div');
        usahaDiv.classList.add('bg-gray-50', 'p-4', 'rounded-lg', 'border');

        const dropdownId = `usaha_dropdown_${usahaCount}`;
        const formId = `usaha_form_${usahaCount}`;

        let dropdownHtml = `<label class="block mb-2 font-semibold">Pilih Usaha</label>`;
        dropdownHtml += `<select id="${dropdownId}" name="usaha_tambahan[${currentIndex}][id]" class="w-full border rounded-md px-3 py-2 mb-4" data-index="${currentIndex}">`;
        dropdownHtml += `<option value="">-- Pilih Usaha --</option>`;
        usahaList.forEach(usaha => {
            dropdownHtml += `<option value="${usaha.id}">${usaha.nama_layanan}</option>`;
        });
        dropdownHtml += `</select>`;

        dropdownHtml += `<div id="${formId}" class="space-y-4 usaha-form"></div>`;

        usahaDiv.innerHTML = dropdownHtml;
        wrapper.appendChild(usahaDiv);

        // Di dalam addEventListener untuk dropdownId
        document.getElementById(dropdownId).addEventListener('change', function () {
            const usahaId = this.value;
            const itemIndex = parseInt(this.dataset.index); // Ambil index dari atribut data
            const targetForm = document.getElementById(`usaha_form_${itemIndex}`); // Pastikan targetForm juga benar
            if (usahaId) {
                // Pastikan usahaCount dikirim sebagai query parameter 'index'
                fetch(`/user/get-usaha-form/${usahaId}?index=${itemIndex}`)
                    .then(res => res.text())
                    .then(html => {
                        targetForm.innerHTML = html;
                    });
            } else {
                targetForm.innerHTML = '';
            }
        });
        usahaCount++;
    });
</script>


<x-wa />

<!-- Footer -->
<div class="mt-10"></div>
<x-footer></x-footer>
