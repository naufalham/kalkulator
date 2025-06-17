@vite(['resources/css/pay.css','resources/js/app.js'])
<x-navbar></x-navbar>

<main class="flex flex-col justify-center items-center min-h-[70vh] px-2 sm:px-4 mt-20 pt-12 mb-12">
    <div class="w-full max-w-xs">
        <div class="nota-box rounded-2xl p-6 flex flex-col items-center relative">
            <h1 class="font-bold text-center text-xl mb-2 tracking-wide">Nota Pembayaran</h1>
            <div class="w-full border-b border-dashed border-gray-300 mb-4"></div>
            <div class="w-full flex flex-col items-center mb-4">
                <span class="text-gray-500 text-sm">Harga Normal</span>
                <span class="text-2xl font-semibold text-gray-400 line-through select-none">Rp100.000</span>
                <span class="text-[#F97316] text-4xl font-extrabold mt-1 mb-2 drop-shadow">Rp10.000</span>
                <span class="bg-green-100 text-green-700 text-xs px-3 py-1 rounded-full font-semibold mb-2">Diskon Spesial!</span>
            </div>
            <div class="w-full border-b border-dashed border-gray-300 mb-4"></div>
            <p class="text-sm mb-4 text-center text-gray-700">Klik tombol di bawah untuk melanjutkan pembayaran melalui Midtrans.</p>
            <button id="pay-button" class="bg-[#F97316] text-white font-semibold rounded-lg py-3 px-8 hover:bg-[#e06f11] transition-colors text-sm w-full mb-2 shadow">Bayar Sekarang</button>
            <a href="{{ route('user.usaha.index') }}" class="block w-full text-center bg-gray-200 text-gray-700 font-semibold rounded-lg py-3 px-8 hover:bg-gray-300 transition-colors text-sm">Batal</a>
        </div>
    </div>
    <!-- Popup pembayaran berhasil -->
    <div id="success-popup" class="fixed inset-0 bg-black bg-opacity-40 flex items-center justify-center z-50 hidden">
        <div class="bg-white rounded-xl shadow-lg p-8 flex flex-col items-center">
            <svg class="w-16 h-16 text-green-500 mb-4" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                <circle cx="12" cy="12" r="10" stroke="currentColor" stroke-width="2" fill="none"/>
                <path stroke="currentColor" stroke-width="2" d="M8 12l2 2l4-4"/>
            </svg>
            <h2 class="text-xl font-bold mb-2 text-green-600">Pembayaran Berhasil!</h2>
            <p class="text-gray-700 mb-2 text-center">File akan segera diunduh.</p>
        </div>
    </div>
</main>  
    
<x-wa />

<script src="https://app.sandbox.midtrans.com/snap/snap.js" data-client-key="{{ config('midtrans.client_key') }}"></script>
<script type="text/javascript">
    document.getElementById('pay-button').addEventListener('click', function () {
        window.snap.pay('{{ $snapToken }}', {
            onSuccess: function(result){
                // Tampilkan popup sukses
                document.getElementById('success-popup').classList.remove('hidden');
                // Submit form download
                var form = document.createElement('form');
                form.method = 'POST';
                form.action = "{{ route('user.usaha.export') }}";
                form.innerHTML = '@csrf<input type="hidden" name="is_paid" value="1">';
                document.body.appendChild(form);
                form.submit();
                // Redirect ke halaman usaha setelah 3 detik
                setTimeout(function() {
                    window.location.href = "{{ route('user.usaha.index') }}";
                }, 3000);
            },
            onError: function(result){
                alert('Pembayaran gagal, silakan coba lagi.');
            },
            onClose: function(){
                alert('Kamu belum menyelesaikan pembayaran!');
            }
        });
    });
</script>

<x-footer></x-footer>