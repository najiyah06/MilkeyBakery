@extends('layouts.navigation')

@section('title', 'Checkout - MilkeyBakery')

@push('styles')
<link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />

<style>
body {
    background: #FFF8F0;
}

.checkout-header {
    background: linear-gradient(135deg, #8B6F47, #C9A57B);
    padding: 40px 0;
    margin-top: 56px;
    color: white;
}

.checkout-card {
    background: white;
    border-radius: 20px;
    padding: 30px;
    box-shadow: 0 10px 30px rgba(0,0,0,.1);
    margin-bottom: 25px;
}

.checkout-card h3 {
    color: #8B6F47;
    font-weight: 700;
    margin-bottom: 20px;
}

.form-label {
    font-weight: 600;
    color: #8B6F47;
}

.form-control {
    border-radius: 10px;
    padding: 12px;
}

.order-item {
    display: flex;
    gap: 15px;
    margin-bottom: 15px;
    padding-bottom: 15px;
    border-bottom: 1px solid #eee;
}

.order-item img {
    width: 70px;
    height: 70px;
    object-fit: cover;
    border-radius: 10px;
}

.summary-row {
    display: flex;
    justify-content: space-between;
    margin-bottom: 10px;
}

.summary-total {
    font-size: 1.3rem;
    font-weight: 700;
    color: #8B6F47;
}

.btn-checkout {
    background: linear-gradient(135deg, #C9A57B, #A0826D);
    color: white;
    border: none;
    width: 100%;
    padding: 15px;
    border-radius: 15px;
    font-weight: 700;
}

.btn-checkout:hover {
    opacity: 0.9;
}
</style>
@endpush

@section('content')

<section class="checkout-header">
    <div class="container">
        <h1>Checkout</h1>
    </div>
</section>

<section class="py-5">
<div class="container">

<form method="POST" action="{{ route('checkout.process') }}" id="checkoutForm">
@csrf

<!-- Hidden backend payment field -->
<input type="hidden" name="payment_method" id="paymentMethodInput">

<div class="row">

<!-- LEFT -->
<div class="col-lg-7">

    <div class="checkout-card">
        <h3>Shipping Information</h3>

        <div class="mb-3">
            <label class="form-label">Full Name</label>
            <input type="text" class="form-control" name="name" value="{{ Auth::user()->name }}" required>
        </div>

        <div class="mb-3">
            <label class="form-label">Phone</label>
            <input type="text" class="form-control" name="phone" required>
        </div>

        <div class="mb-3">
            <label class="form-label">Email</label>
            <input type="email" class="form-control" name="email" value="{{ Auth::user()->email }}" required>
        </div>

        <div class="mb-3">
            <label class="form-label">Address</label>
            <textarea class="form-control" name="address" rows="3" required></textarea>
        </div>

        <div class="row">
            <div class="col-md-6 mb-3">
                <label class="form-label">City (Surabaya)</label>
                <select class="form-control" name="city" id="citySelect" required>
                    <option value="">-- Pilih Kecamatan --</option>
                    @foreach([
                        "Tegalsari","Genteng","Gubeng","Wonokromo","Rungkut","Sukolilo",
                        "Mulyorejo","Kenjeran","Tambaksari","Sawahan","Tandes","Benowo",
                        "Lakarsantri","Dukuh Pakis","Wiyung","Gayungan","Jambangan"
                    ] as $city)
                        <option value="{{ $city }}">{{ $city }}</option>
                    @endforeach
                </select>
            </div>

            <div class="col-md-6 mb-3">
                <label class="form-label">Postal Code</label>
                <input type="text" class="form-control" name="postal_code" required>
            </div>
        </div>
    </div>

    <!-- PAYMENT -->
    <div class="checkout-card">
        <h3>Payment Method</h3>

        <div class="form-check">
            <input class="form-check-input" type="radio" name="payment_option" id="paymentTransfer" value="transfer" required>
            <label class="form-check-label" for="paymentTransfer">Bank Transfer (Midtrans)</label>
        </div>

        <div class="form-check mt-2">
            <input class="form-check-input" type="radio" name="payment_option" id="paymentCOD" value="cod" required>
            <label class="form-check-label" for="paymentCOD">Cash on Delivery</label>
        </div>
    </div>

</div>

<!-- RIGHT -->
<div class="col-lg-5">

    <div class="checkout-card">
        <h3>Order Summary</h3>

        @foreach($cartItems as $item)
        <div class="order-item">
            <img src="{{ $item->image }}" alt="">

            <div>
                <strong>{{ $item->name }}</strong><br>
                x{{ $item->qty }}
            </div>

            <div class="ms-auto">
                Rp {{ number_format($item->price * $item->qty,0,',','.') }}
            </div>
        </div>
        @endforeach

        <div class="summary-row">
            <span>Subtotal</span>
            <span>Rp {{ number_format($subtotal,0,',','.') }}</span>
        </div>

        <div class="summary-row">
            <span>Tax (11%)</span>
            <span>Rp {{ number_format($tax,0,',','.') }}</span>
        </div>

        <div class="summary-row">
            <span>Delivery</span>
            <span>Rp {{ number_format($deliveryFee,0,',','.') }}</span>
        </div>

        <hr>

        <div class="summary-row summary-total">
            <span>Total</span>
            <span>Rp {{ number_format($total,0,',','.') }}</span>
        </div>

        <button type="button" id="payButton" class="btn-checkout mt-3">
            Place Order
        </button>

        <a href="{{ route('cart.index') }}" class="btn btn-outline-secondary w-100 mt-2">
            Back to Cart
        </a>
    </div>

</div>

</div>
</form>

</div>
</section>

@endsection


@push('scripts')
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>

<script>
$('#citySelect').select2({ width: '100%' });
</script>

<!-- MIDTRANS -->
<script src="https://app.sandbox.midtrans.com/snap/snap.js"
    data-client-key="{{ config('services.midtrans.client_key') }}"></script>

<script>
document.addEventListener('DOMContentLoaded', function () {

    const form = document.getElementById('checkoutForm');
    const payButton = document.getElementById('payButton');

    function processPayment() {
        const selected = document.querySelector('input[name="payment_option"]:checked');

        if (!selected) {
            alert("Pilih metode pembayaran dulu!");
            return;
        }

        // Set payment method value
        document.getElementById('paymentMethodInput').value = selected.value;

        // Create FormData from form
        const formData = new FormData(form);

        // Disable button to prevent double submission
        payButton.disabled = true;
        payButton.textContent = 'Processing...';

        // Send request WITHOUT "Accept: application/json" header
        fetch("{{ route('checkout.process') }}", {
            method: "POST",
            headers: {
                "X-CSRF-TOKEN": "{{ csrf_token() }}"
            },
            body: formData
        })
        .then(res => {
            console.log('Response Status:', res.status);
            console.log('Response OK:', res.ok);
            
            // Get response as text first
            return res.text().then(text => {
                console.log('Raw Response:', text);
                
                try {
                    const data = JSON.parse(text);
                    return { ok: res.ok, status: res.status, data: data };
                } catch (e) {
                    console.error("Response is not JSON. Raw text:", text);
                    throw new Error('Server returned non-JSON response: ' + text.substring(0, 200));
                }
            });
        })
        .then(result => {
            // Re-enable button
            payButton.disabled = false;
            payButton.textContent = 'Place Order';

            console.log('Parsed Result:', result);

            if (!result.ok) {
                console.error("Server error response:", result.data);
                
                let errorMsg = 'Server error occurred';
                if (result.data.message) {
                    errorMsg = result.data.message;
                } else if (result.data.error) {
                    errorMsg = result.data.error;
                }
                
                alert("Error: " + errorMsg);
                return;
            }

            const data = result.data;
            console.log("SERVER SUCCESS RESPONSE:", data);

            // Handle COD
            if (data.cod) {
                window.location.href = data.redirect;
                return;
            }

            // Handle Midtrans
            if (!data.snapToken) {
                alert("Snap token gagal dibuat");
                return;
            }

            window.snap.pay(data.snapToken, {
                onSuccess: function(result) {
                    console.log('Payment success:', result);
                    window.location.href = "/orders/" + data.order_id;
                },
                onPending: function(result) {
                    console.log('Payment pending:', result);
                    alert("Menunggu pembayaran...");
                    window.location.href = "/orders/" + data.order_id;
                },
                onError: function(result) {
                    console.log('Payment error:', result);
                    alert("Payment gagal");
                },
                onClose: function() {
                    console.log('Customer closed the popup without finishing payment');
                }
            });
        })
        .catch(err => {
            // Re-enable button
            payButton.disabled = false;
            payButton.textContent = 'Place Order';
            
            console.error("Fetch error details:", err);
            alert("Server error — cek console untuk detail\n\n" + err.message);
        });
    }

    payButton.addEventListener('click', function (e) {
        e.preventDefault();

        const selected = document.querySelector('input[name="payment_option"]:checked');

        if (!selected) {
            alert("Pilih metode pembayaran dulu!");
            return;
        }

        if (selected.value === "transfer") {
            // Process with Midtrans
            processPayment();
        } else {
            // Process COD - submit form normally
            document.getElementById('paymentMethodInput').value = "cod";
            form.submit();
        }
    });

});
</script>

@endpush