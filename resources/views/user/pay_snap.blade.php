<x-navbar></x-navbar>

<div class="container mt-5">
    <div class="card mx-auto" style="max-width: 400px;">
        <div class="card-body text-center">
            <h4 class="card-title mb-3">Pembayaran</h4>
            <p class="card-text mb-4">Klik tombol di bawah untuk melanjutkan pembayaran melalui Midtrans.</p>
            <button id="pay-button" class="btn btn-primary btn-block">Bayar Sekarang</button>
        </div>
    </div>
</div>


<x-footer></x-footer>

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