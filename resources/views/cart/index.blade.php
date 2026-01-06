@extends('layouts.navigation')

@section('title', 'Cart - MilkeyBakery')

@push('styles')
<style>
    .cart-header {
        background: linear-gradient(135deg, #C9A57B 0%, #A0826D 100%);
        padding: 60px 0;
        color: white;
        margin-top: 56px;
        margin-bottom: 40px;
    }

    .cart-container {
        max-width: 1200px;
        margin: 0 auto;
        padding: 0 15px 80px;
    }

    .cart-empty {
        text-align: center;
        padding: 80px 20px;
    }

    .cart-empty i {
        font-size: 5rem;
        color: #C9A57B;
        margin-bottom: 20px;
    }

    .cart-empty h3 {
        color: #8B6F47;
        margin-bottom: 15px;
    }

    .cart-empty p {
        color: #666;
        margin-bottom: 30px;
    }

    .cart-item {
        background: white;
        border-radius: 15px;
        padding: 25px;
        margin-bottom: 20px;
        box-shadow: 0 2px 10px rgba(0,0,0,0.08);
        transition: all 0.3s ease;
    }

    .cart-item:hover {
        box-shadow: 0 5px 20px rgba(201, 165, 123, 0.2);
    }

    .cart-item-image {
        width: 120px;
        height: 120px;
        object-fit: cover;
        border-radius: 10px;
    }

    .cart-item-details {
        flex: 1;
        padding: 0 20px;
    }

    .cart-item-name {
        font-size: 1.2rem;
        font-weight: 600;
        color: #8B6F47;
        margin-bottom: 8px;
    }

    .cart-item-price {
        color: #C9A57B;
        font-size: 1.1rem;
        font-weight: 600;
    }

    .quantity-control {
        display: flex;
        align-items: center;
        gap: 10px;
    }

    .qty-btn {
        background: #F5E6D3;
        border: none;
        width: 35px;
        height: 35px;
        border-radius: 8px;
        color: #8B6F47;
        font-weight: 600;
        cursor: pointer;
        transition: all 0.3s ease;
    }

    .qty-btn:hover {
        background: #C9A57B;
        color: white;
    }

    .qty-input {
        width: 60px;
        height: 35px;
        text-align: center;
        border: 2px solid #F5E6D3;
        border-radius: 8px;
        font-weight: 600;
        color: #8B6F47;
    }

    .btn-remove {
        background: transparent;
        border: 2px solid #ff6b6b;
        color: #ff6b6b;
        padding: 8px 20px;
        border-radius: 20px;
        font-weight: 500;
        transition: all 0.3s ease;
    }

    .btn-remove:hover {
        background: #ff6b6b;
        color: white;
    }

    .cart-summary {
        background: white;
        border-radius: 15px;
        padding: 30px;
        box-shadow: 0 2px 10px rgba(0,0,0,0.08);
        position: sticky;
        top: 80px;
    }

    .cart-summary h4 {
        color: #8B6F47;
        margin-bottom: 25px;
        padding-bottom: 15px;
        border-bottom: 2px solid #F5E6D3;
    }

    .summary-row {
        display: flex;
        justify-content: space-between;
        margin-bottom: 15px;
        color: #666;
    }

    .summary-row.total {
        font-size: 1.3rem;
        font-weight: 700;
        color: #8B6F47;
        margin-top: 20px;
        padding-top: 20px;
        border-top: 2px solid #F5E6D3;
    }

    .btn-checkout {
        background: linear-gradient(135deg, #C9A57B 0%, #A0826D 100%);
        color: white;
        border: none;
        padding: 15px;
        border-radius: 10px;
        width: 100%;
        font-weight: 600;
        font-size: 1.1rem;
        margin-top: 20px;
        transition: all 0.3s ease;
    }

    .btn-checkout:hover {
        transform: translateY(-2px);
        box-shadow: 0 5px 15px rgba(201, 165, 123, 0.4);
        color: white;
    }

    .btn-continue {
        background: transparent;
        border: 2px solid #C9A57B;
        color: #C9A57B;
        padding: 12px 30px;
        border-radius: 25px;
        font-weight: 600;
        transition: all 0.3s ease;
        text-decoration: none;
        display: inline-block;
    }

    .btn-continue:hover {
        background: #C9A57B;
        color: white;
    }

    @media (max-width: 768px) {
        .cart-item {
            padding: 15px;
        }

        .cart-item-image {
            width: 80px;
            height: 80px;
        }

        .cart-item-details {
            padding: 0 10px;
        }

        .cart-summary {
            position: static;
            margin-top: 30px;
        }
    }
</style>
@endpush

@section('content')
    <!-- Cart Header -->
    <section class="cart-header">
        <div class="container text-center">
            <h1 class="display-5 fw-bold">
                <i class="fas fa-shopping-cart me-3"></i>Shopping Cart
            </h1>
            <p class="lead mb-0">Review your items before checkout</p>
        </div>
    </section>

    <div class="cart-container">
        @if(count($cart) === 0)
            <!-- Empty Cart -->
            <div class="cart-empty">
                <i class="fas fa-shopping-basket"></i>
                <h3>Your Cart is Empty</h3>
                <p>Looks like you haven't added any items to your cart yet.</p>
                <a href="{{ url('/') }}#products" class="btn btn-hero-brown btn-lg">
                    <i class="fas fa-arrow-left me-2"></i>Start Shopping
                </a>
            </div>
        @else
            <div class="row">
                <!-- Cart Items -->
                <div class="col-lg-8">
                    <div class="mb-3">
                        <a href="{{ url('/') }}#products" class="btn-continue">
                            <i class="fas fa-arrow-left me-2"></i>Continue Shopping
                        </a>
                    </div>

                    @php $total = 0; @endphp

                    @foreach($cart as $id => $item)
                        @php 
                            $subtotal = $item['price'] * $item['qty'];
                            $total += $subtotal;
                        @endphp

                        <div class="cart-item">
                            <div class="d-flex align-items-center flex-wrap">
                                <!-- Product Image -->
                                <img src="{{ $item['image'] }}" alt="{{ $item['name'] }}" class="cart-item-image">

                                <!-- Product Details -->
                                <div class="cart-item-details">
                                    <h5 class="cart-item-name">{{ $item['name'] }}</h5>
                                    <p class="cart-item-price">Rp {{ number_format($item['price'], 0, ',', '.') }}</p>
                                </div>

                                <!-- Quantity Control -->
                                <div class="quantity-control me-3 mb-2">
                                    <button class="qty-btn" onclick="updateQty('{{ $id }}', -1)">
                                        <i class="fas fa-minus"></i>
                                    </button>
                                    <input type="number" class="qty-input" value="{{ $item['qty'] }}" readonly>
                                    <button class="qty-btn" onclick="updateQty('{{ $id }}', 1)">
                                        <i class="fas fa-plus"></i>
                                    </button>
                                </div>

                                <!-- Subtotal & Remove -->
                                <div class="text-end">
                                    <p class="fw-bold text-dark mb-2" style="font-size: 1.2rem;">
                                        Rp {{ number_format($subtotal, 0, ',', '.') }}
                                    </p>
                                    <button class="btn-remove btn-sm" onclick="removeItem('{{ $id }}')">
                                        <i class="fas fa-trash-alt me-1"></i>Remove
                                    </button>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>

                <!-- Cart Summary -->
                <div class="col-lg-4">
                    <div class="cart-summary">
                        <h4>Order Summary</h4>
                        
                        <div class="summary-row">
                            <span>Subtotal</span>
                            <span>Rp {{ number_format($total, 0, ',', '.') }}</span>
                        </div>
                        
                        <div class="summary-row">
                            <span>Shipping</span>
                            <span>Free</span>
                        </div>
                        
                        <div class="summary-row">
                            <span>Tax (11%)</span>
                            <span>Rp {{ number_format($total * 0.11, 0, ',', '.') }}</span>
                        </div>
                        
                        <div class="summary-row total">
                            <span>Total</span>
                            <span>Rp {{ number_format($total + ($total * 0.11), 0, ',', '.') }}</span>
                        </div>

                        <button class="btn-checkout">
                            <i class="fas fa-lock me-2"></i>Proceed to Checkout
                        </button>

                        <div class="text-center mt-3">
                            <small class="text-muted">
                                <i class="fas fa-shield-alt me-1"></i>Secure Checkout
                            </small>
                        </div>
                    </div>
                </div>
            </div>
        @endif
    </div>
@endsection

@push('scripts')
<script>
    function updateQty(id, change) {
        // Implementasi update quantity via AJAX
        console.log('Update qty for item:', id, 'Change:', change);
        // location.href = `/cart/update/${id}?qty=${change}`;
    }

    function removeItem(id) {
        if (confirm('Are you sure you want to remove this item from cart?')) {
            // Implementasi remove item via AJAX
            console.log('Remove item:', id);
            // location.href = `/cart/remove/${id}`;
        }
    }
</script>
@endpush