@extends('layouts.navigation')

@section('title', 'Payment')

@section('content')
<div class="container py-5 text-center">
    <h2 class="fw-bold">Complete Your Payment</h2>
    <p>Total: <strong>Rp {{ number_format($total,0,',','.') }}</strong></p>

    <button id="pay-button" class="btn btn-primary btn-lg mt-3">
        Pay Now
    </button>
</div>

<script src="https://app.sandbox.midtrans.com/snap/snap.js"
        data-client-key="{{ config('services.midtrans.client_key') }}"></script>

<script>
document.getElementById('pay-button').addEventListener('click', function () {
    window.snap.pay('{{ $snapToken }}', {
        onSuccess: function(result) {
            alert('Payment Success!');
            window.location.href = "{{ route('checkout.success') }}";
        },
        onPending: function(result) {
            alert('Waiting for payment...');
        },
        onError: function(result) {
            alert('Payment Failed!');
        }
    });
});
</script>
@endsection
