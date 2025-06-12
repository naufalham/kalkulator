@vite(['resources/css/usaha.css','resources/js/app.js'])
<!-- Navbar -->
<x-navbar></x-navbar>

<!-- Main content -->
<main class="max-w-6xl mx-auto flex-grow w-full px-6 mt-10 pt-20">
    <form class="bg-white rounded-xl p-8 grid grid-cols-1 md:grid-cols-2 gap-x-12 gap-y-6" id="calcForm" onsubmit="return false">
        <div class="col-span-full flex items-center justify-between mb-4">
            <h1 class="font-bold text-lg text-black">
                {{ $kalkulator->nama }}
            </h1>
            <a href="{{ route ('user.hitung.index') }}" class="text-[#F97316] font-semibold hover:underline text-3xl leading-none">
                &times;
            </a>
        </div>
        @foreach($kalkulator->fields as $field)
            <div class="flex flex-col">
                <label class="text-sm mb-2 text-black" for="{{ $field->nama_field }}">
                    {{ $field->label }}
                </label>
                @if($field->keterangan)
                    <p class="text-xs text-gray-700 mb-2">{{ $field->keterangan }}</p>
                @endif

                @if($field->tipe === 'radio')
                    @php $opsi = json_decode($field->opsi, true); @endphp
                    <div class="flex flex-col space-y-2">
                        @foreach($opsi as $opt)
                            <label class="flex items-center space-x-2">
                                <input type="radio" name="{{ $field->nama_field }}" value="{{ $opt['value'] }}" class="focus:ring-[#F97316]" required>
                                <span class="text-sm text-black">{{ $opt['label'] }}</span>
                            </label>
                        @endforeach
                    </div>
                @else
                    <input class="border border-gray-400 rounded-lg px-4 py-2 text-sm focus:outline-none focus:ring-2 focus:ring-[#f47920]"
                        id="{{ $field->nama_field }}"
                        name="{{ $field->nama_field }}"
                        type="{{ $field->tipe }}"
                        required/>
                @endif
            </div>
        @endforeach
        <div class="col-span-full flex justify-end mt-4">
            <button class="bg-[#f47920] text-white rounded-lg px-6 py-2 text-sm font-normal hover:bg-[#db6e1a] focus:outline-none focus:ring-2 focus:ring-[#f47920]" type="submit">
                Hitung
            </button>
        </div>
    </form>
    <section class="bg-white rounded-xl p-6 mt-10 text-sm text-black max-w-full" id="resultSection">
        <p class="mb-3 font-semibold">Hasil Perhitungan</p>
        <p id="hasilLaba">Rp 0</p>
    </section>
</main>
<script>
    document.getElementById('calcForm').addEventListener('submit', function(e) {
        e.preventDefault();

        @if($kalkulator->slug === 'bep')
            const fixedCost = parseFloat(document.getElementById('fixedCost').value) || 0;
            const unitPrice = parseFloat(document.getElementById('unitPrice').value) || 0;
            const variableCost = parseFloat(document.getElementById('variableCost').value) || 0;
            const category = document.querySelector('input[name="category"]:checked')?.value;

            let result = 0;
            if (category === 'unit') {
                result = (unitPrice - variableCost) !== 0 ? fixedCost / (unitPrice - variableCost) : 0;
                result = Math.floor(result);
                document.getElementById('hasilLaba').textContent = result.toLocaleString('id-ID') + ' unit';
            } else if (category === 'revenue') {
                result = (unitPrice - variableCost) !== 0 ? fixedCost / ((unitPrice - variableCost) / unitPrice) : 0;
                result = Math.floor(result);
                let hasil = 'Rp ' + Math.abs(result).toLocaleString('id-ID');
                if (result < 0) {
                    hasil = '- ' + hasil;
                }
                document.getElementById('hasilLaba').textContent = hasil;
            } else {
                document.getElementById('hasilLaba').textContent = 'Pilih kategori terlebih dahulu.';
            }

        @elseif($kalkulator->slug === 'laba')
            const pendapatan = parseFloat(document.getElementById('pendapatan').value) || 0;
            const biaya = parseFloat(document.getElementById('totalBiaya').value) || 0;
            const laba = pendapatan - biaya;
            let hasil = 'Rp ' + Math.abs(laba).toLocaleString('id-ID');
            if (laba < 0) {
                hasil = '- ' + hasil;
            }
            document.getElementById('hasilLaba').textContent = hasil;

        @elseif($kalkulator->slug === 'modal')
            const sewa = parseFloat(document.getElementById('sewaTempat').value) || 0;
            const biayaAlat = parseFloat(document.getElementById('biayaOperasional').value) || 0;
            const stokBarang = parseFloat(document.getElementById('beliStokBarang').value) || 0;
            const biayaPromosi = parseFloat(document.getElementById('biayaPromosi').value) || 0;
            const total = sewa + biayaAlat + stokBarang + biayaPromosi;
            document.getElementById('hasilLaba').textContent = 'Rp ' + total.toLocaleString('id-ID');

        @elseif($kalkulator->slug === 'penjualan')
            const biayaTetap = parseFloat(document.getElementById('biayaTetap').value) || 0;
            const rasioMargin = parseFloat(document.getElementById('rasioMargin').value) || 0;
            const targetLaba = parseFloat(document.getElementById('targetLaba').value) || 0;
            let hasil = 0;
            if (rasioMargin !== 0) {
                hasil = (biayaTetap + targetLaba) / rasioMargin;
            }
            const hasilText = 'Rp ' + Math.round(hasil).toLocaleString('id-ID');
            document.getElementById('hasilLaba').textContent = hasilText;

        @elseif($kalkulator->slug === 'stok')
            const jumlahUnit = parseFloat(document.getElementById('jumlahUnit').value) || 0;
            const hargaBeli = parseFloat(document.getElementById('hargaBeliPerUnit').value) || 0;
            const total = jumlahUnit * hargaBeli;
            document.getElementById('hasilLaba').textContent = 'Rp ' + total.toLocaleString('id-ID');

        @else
            // Default: jumlahkan semua input number
            let total = 0;
            @foreach($kalkulator->fields as $field)
                total += parseFloat(document.getElementById('{{ $field->nama_field }}').value) || 0;
            @endforeach
            document.getElementById('hasilLaba').textContent = 'Rp ' + total.toLocaleString('id-ID');
        @endif
    });
</script>
<x-wa />
<div class="mt-10"></div>
<x-footer></x-footer>