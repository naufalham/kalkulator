
<x-navbar></x-navbar>

<link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600;700&display=swap" rel="stylesheet">
<style>
    body, .font-poppins {
        font-family: 'Poppins', Arial, sans-serif !important;
    }
</style>

<main class="flex flex-col justify-center items-center min-h-[70vh] px-2 sm:px-4 pt-12 font-poppins">
    <div class="w-full max-w-xs">
        <div class="bg-white rounded-2xl shadow-sm p-6 flex flex-col items-center">
            <h1 class="font-semibold text-center text-lg mb-2">Pembayaran!</h1>
            <p class="card-text text-sm mb-4 text-center">Klik tombol di bawah untuk melanjutkan pembayaran melalui Midtrans.</p>
            <button id="pay-button" class="bg-[#F97316] text-white font-semibold rounded-lg py-3 px-8 hover:bg-[#e06f11] transition-colors text-sm">Bayar Sekarang</button>
        </div>
    </div>
</main>



<script src="https://app.sandbox.midtrans.com/snap/snap.js" data-client-key="{{ config('midtrans.client_key') }}"></script>
<script type="text/javascript">
    document.getElementById('pay-button').addEventListener('click', function () {

        window.snap.pay('{{ $snapToken }}', {
            onSuccess: function(result){
                // Setelah sukses bayar, submit form hidden ke export dengan is_paid=1
                var form = document.createElement('form');
                form.method = 'POST';
                form.action = "{{ route('user.usaha.export') }}";
                form.innerHTML = '@csrf<input type="hidden" name="is_paid" value="1">';
                document.body.appendChild(form);
                form.submit();
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