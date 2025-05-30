<script src="https://app.sandbox.midtrans.com/snap/snap.js" data-client-key="{{ config('midtrans.client_key') }}"></script>
<script type="text/javascript">
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
</script>