@extends('layouts.navigation')

@section('title', 'Checkout - MilkeyBakery')

@push('styles')
<style>
body { background: #FFF8F0; }

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
        <form method="POST" action="{{ route('checkout.process') }}">
            @csrf

            <div class="row">
                {{-- LEFT --}}
                <div class="col-lg-7">
                    <div class="checkout-card">
                        <h3>Shipping Information</h3>

                        <div class="mb-3">
                            <label class="form-label">Full Name</label>
                            <input type="text" class="form-control" name="name"
                                value="{{ Auth::user()->name }}" required>
                        </div>

                        <div class="mb-3">
                            <label class="form-label">Phone</label>
                            <input type="text" class="form-control" name="phone" required>
                        </div>

                        <div class="mb-3">
                            <label class="form-label">Email</label>
                            <input type="email" class="form-control" name="email"
                                value="{{ Auth::user()->email }}" required>
                        </div>

                        <div class="mb-3">
                            <label class="form-label">Address</label>
                            <textarea class="form-control" name="address" rows="3" required></textarea>
                        </div>

                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <label class="form-label">City</label>
                                <select class="form-control" name="city" id="citySelect" required>
                                    <option value="">-- Pilih Kota --</option>
                                    <option value="South Jakarta">South Jakarta</option>
                                    <option value="Central Jakarta">Central Jakarta</option>
                                    <option value="West Jakarta">West Jakarta</option>
                                    <option value="North Jakarta">North Jakarta</option>
                                    <option value="East Jakarta">East Jakarta</option>
                                    <option value="Depok">Depok</option>
                                    <option value="Tangerang">Tangerang</option>
                                    <option value="Bekasi">Bekasi</option>
                                </select>
                            </div>

                            <div class="col-md-6 mb-3">
                                <label class="form-label">Postal Code</label>
                                <input type="text" class="form-control" name="postal_code" required>
                            </div>
                        </div>
                    </div>

                    <div class="checkout-card">
                        <h3>Payment Method</h3>

                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="payment_method" value="transfer" checked>
                            <label class="form-check-label">Bank Transfer</label>
                        </div>

                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="payment_method" value="cod">
                            <label class="form-check-label">Cash on Delivery</label>
                        </div>
                    </div>
                </div>

                {{-- RIGHT --}}
                <div class="col-lg-5">
                    <div class="checkout-card">
                        <h3>Order Summary</h3>

                        @foreach($cartItems as $item)
                        <div class="order-item">
                            <img src="{{ $item->image }}" alt="">
                            <div>
                                <strong>{{ $item->name }}</strong><br>
                                <small>{{ $item->menu->category->name ?? '-' }}</small><br>
                                x{{ $item->qty }}
                            </div>
                            <div class="ms-auto">
                                Rp {{ number_format($item->price * $item->qty,0,',','.') }}
                            </div>
                        </div>
                        @endforeach

                        <div class="summary-row">
                            <span>Subtotal</span>
                            <span id="subtotalDisplay">Rp {{ number_format($subtotal,0,',','.') }}</span>
                        </div>

                        <div class="summary-row">
                            <span>Tax (11%)</span>
                            <span>Rp {{ number_format($tax,0,',','.') }}</span>
                        </div>

                        <div class="summary-row">
                            <span>Delivery</span>
                            <span id="deliveryFeeDisplay">Rp {{ number_format($deliveryFee,0,',','.') }}</span>
                        </div>

                        <hr>

                        <div class="summary-row summary-total">
                            <span>Total</span>
                            <span id="totalDisplay">Rp {{ number_format($total,0,',','.') }}</span>
                        </div>

                        <button type="submit" class="btn-checkout mt-3">
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
<script>
document.addEventListener('DOMContentLoaded', function () {

    const subtotal = Number(@json($subtotal ?? 0));
    let deliveryFee = Number(@json($deliveryFee ?? 0));

    const fees = {
        "South Jakarta": 35000,
        "Central Jakarta": 40000,
        "West Jakarta": 45000,
        "North Jakarta": 50000,
        "East Jakarta": 60000,
        "Depok": 60000,
        "Tangerang": 70000,
        "Bekasi": 75000,
    };

    function updateTotal() {
        const tax = subtotal * 0.11;
        const total = subtotal + tax + deliveryFee;

        document.getElementById('deliveryFeeDisplay').innerText =
            'Rp ' + deliveryFee.toLocaleString('id-ID');

        document.getElementById('totalDisplay').innerText =
            'Rp ' + total.toLocaleString('id-ID');
    }

    updateTotal();

    const citySelect = document.getElementById('citySelect');
    if (citySelect) {
        citySelect.addEventListener('change', function () {
            if (fees[this.value]) {
                deliveryFee = fees[this.value];
                updateTotal();
            }
        });
    }

});
</script>
@endpush
