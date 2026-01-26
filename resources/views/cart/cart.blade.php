@extends('layouts.navigation')

@section('title', 'Shopping Cart - MilkeyBakery')

@push('styles')
<style>
    .cart-header {
        background: linear-gradient(135deg, #8B6F47 0%, #C9A57B 100%);
        padding: 40px 0;
        margin-top: 56px;
        color: white;
    }

    .cart-container {
        padding: 60px 0;
        background: #FFF8F0;
        min-height: calc(100vh - 200px);
    }

    /* Cart Table */
    .cart-table-card {
        background: white;
        border-radius: 20px;
        padding: 30px;
        box-shadow: 0 10px 30px rgba(139, 111, 71, 0.15);
        margin-bottom: 30px;
    }

    .cart-table {
        width: 100%;
        margin-top: 20px;
    }

    .cart-table thead {
        background: linear-gradient(135deg, #F5E6D3 0%, #EDD5BA 100%);
    }

    .cart-table th {
        padding: 15px;
        color: #8B6F47;
        font-weight: 700;
        text-align: left;
        border: none;
    }

    .cart-table td {
        padding: 20px 15px;
        vertical-align: middle;
        border-bottom: 2px solid #F5E6D3;
    }

    .cart-table tbody tr:last-child td {
        border-bottom: none;
    }

    .cart-table tbody tr:hover {
        background: #FFFBF8;
    }

    /* Product Item */
    .cart-product-image {
        width: 80px;
        height: 80px;
        border-radius: 10px;
        object-fit: cover;
        border: 2px solid #F5E6D3;
    }

    .cart-product-info {
        display: flex;
        align-items: center;
        gap: 15px;
    }

    .cart-product-details h5 {
        color: #8B6F47;
        font-size: 1.1rem;
        font-weight: 600;
        margin-bottom: 5px;
    }

    .cart-product-category {
        color: #999;
        font-size: 0.9rem;
    }

    /* Price */
    .cart-price {
        color: #C9A57B;
        font-weight: 700;
        font-size: 1.1rem;
    }

    /* Quantity Controls */
    .quantity-control {
        display: flex;
        align-items: center;
        gap: 10px;
    }

    .qty-btn {
        width: 35px;
        height: 35px;
        border-radius: 8px;
        border: 2px solid #C9A57B;
        background: white;
        color: #C9A57B;
        font-weight: 700;
        cursor: pointer;
        transition: all 0.3s ease;
    }

    .qty-btn:hover {
        background: #C9A57B;
        color: white;
    }

    .qty-input {
        width: 60px;
        text-align: center;
        padding: 8px;
        border: 2px solid #E8D5C4;
        border-radius: 8px;
        font-weight: 600;
        color: #8B6F47;
    }

    /* Remove Button */
    .btn-remove {
        background: #dc3545;
        color: white;
        border: none;
        padding: 8px 15px;
        border-radius: 8px;
        cursor: pointer;
        transition: all 0.3s ease;
        font-size: 0.9rem;
    }

    .btn-remove:hover {
        background: #c82333;
        transform: scale(1.05);
    }

    /* Cart Summary */
    .cart-summary-card {
        background: white;
        border-radius: 20px;
        padding: 30px;
        box-shadow: 0 10px 30px rgba(139, 111, 71, 0.15);
        position: sticky;
        top: 80px;
    }

    .cart-summary-card h3 {
        color: #8B6F47;
        font-size: 1.5rem;
        font-weight: 700;
        margin-bottom: 25px;
        padding-bottom: 15px;
        border-bottom: 2px solid #F5E6D3;
    }

    .summary-item {
        display: flex;
        justify-content: space-between;
        padding: 12px 0;
        color: #666;
    }

    .summary-item.total {
        margin-top: 15px;
        padding-top: 15px;
        border-top: 2px solid #F5E6D3;
        font-size: 1.25rem;
        font-weight: 700;
        color: #8B6F47;
    }

    .summary-item.total .amount {
        color: #C9A57B;
    }

    /* Buttons */
    .btn-checkout {
        width: 100%;
        background: linear-gradient(135deg, #C9A57B 0%, #A0826D 100%);
        color: white;
        border: none;
        padding: 15px;
        border-radius: 15px;
        font-weight: 700;
        font-size: 1.1rem;
        cursor: pointer;
        transition: all 0.3s ease;
        margin-top: 20px;
    }

    .btn-checkout:hover {
        transform: translateY(-3px);
        box-shadow: 0 10px 25px rgba(201, 165, 123, 0.4);
    }

    .btn-continue-shopping {
        width: 100%;
        background: white;
        color: #8B6F47;
        border: 2px solid #C9A57B;
        padding: 12px;
        border-radius: 15px;
        font-weight: 600;
        cursor: pointer;
        transition: all 0.3s ease;
        margin-top: 10px;
        text-decoration: none;
        display: block;
        text-align: center;
    }

    .btn-continue-shopping:hover {
        background: #F5E6D3;
    }

    /* Empty Cart */
    .empty-cart {
        text-align: center;
        padding: 80px 20px;
    }

    .empty-cart-icon {
        font-size: 5rem;
        color: #E8D5C4;
        margin-bottom: 20px;
    }

    .empty-cart h3 {
        color: #8B6F47;
        font-size: 1.75rem;
        margin-bottom: 15px;
    }

    .empty-cart p {
        color: #999;
        font-size: 1.1rem;
        margin-bottom: 30px;
    }

    /* Coupon Section */
    .coupon-section {
        background: linear-gradient(135deg, #FFF8F0 0%, #F5E6D3 100%);
        padding: 20px;
        border-radius: 15px;
        margin-bottom: 20px;
    }

    .coupon-input-group {
        display: flex;
        gap: 10px;
    }

    .coupon-input {
        flex: 1;
        padding: 12px 15px;
        border: 2px solid #E8D5C4;
        border-radius: 10px;
        font-size: 1rem;
    }

    .btn-apply-coupon {
        background: #8B6F47;
        color: white;
        border: none;
        padding: 12px 25px;
        border-radius: 10px;
        font-weight: 600;
        cursor: pointer;
        transition: all 0.3s ease;
    }

    .btn-apply-coupon:hover {
        background: #C9A57B;
    }

    /* Badge */
    .cart-count-badge {
        background: #C9A57B;
        color: white;
        padding: 5px 15px;
        border-radius: 20px;
        font-size: 0.9rem;
        font-weight: 600;
    }

    @media (max-width: 768px) {
        .cart-table {
            display: block;
            overflow-x: auto;
        }

        .cart-product-image {
            width: 60px;
            height: 60px;
        }

        .quantity-control {
            flex-direction: column;
        }

        .qty-input {
            width: 80px;
        }

        .cart-summary-card {
            position: static;
            margin-top: 30px;
        }
    }
</style>
@endpush

@section('content')
    <!-- Cart Header -->
    <section class="cart-header">
        <div class="container">
            <div class="d-flex justify-content-between align-items-center">
                <h1 class="mb-0">Shopping Cart</h1>
                <span class="cart-count-badge">{{ $cartItems->count() }} Items</span>
            </div>
        </div>
    </section>

    <!-- Cart Container -->
    <section class="cart-container">
        <div class="container">
            @if($cartItems->count() > 0)
            <div class="row">
                <!-- Cart Items -->
                <div class="col-lg-8">
                    <div class="cart-table-card">
                        <h3 style="color: #8B6F47; font-weight: 700; margin-bottom: 20px;">
                            <i class="fas fa-shopping-cart me-2"></i>Your Items
                        </h3>

                        <div class="table-responsive">
                            <table class="cart-table">
                                <thead>
                                    <tr>
                                        <th>Product</th>
                                        <th>Price</th>
                                        <th>Quantity</th>
                                        <th>Subtotal</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($cartItems as $item)
                                    <tr>
                                        <td>
                                            <div class="cart-product-info">
                                                <img src="{{ $item->image }}" alt="{{ $item->name }}" class="cart-product-image">
                                                <div class="cart-product-details">
                                                    <h5>{{ $item->name }}</h5>
                                                    <span class="cart-product-category">{{ $item->menu->category->name }}</span>
                                                </div>
                                            </div>
                                        </td>
                                        <td>
                                            <span class="cart-price">Rp {{ number_format($item->price, 0, ',', '.') }}</span>
                                        </td>
                                        <td>
                                            <div class="quantity-control">
                                                <form method="POST" action="{{ route('cart.update', $item->id) }}" class="quantity-control">
                                                    @csrf
                                                    @method('PUT')

                                                    <button type="submit" name="action" value="decrease" class="qty-btn">-</button>

                                                    <input type="text" class="qty-input" value="{{ $item->qty }}" readonly>

                                                    <button type="submit" name="action" value="increase" class="qty-btn">+</button>
                                                </form>
                                            </div>
                                        </td>
                                        <td>
                                            <span class="cart-price">Rp {{ number_format($item->price * $item->qty, 0, ',', '.') }}</span>
                                        </td>
                                        <td>
                                            <form method="POST" action="{{ route('cart.remove', $item->id) }}">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn-remove" onclick="return confirm('Remove this item from cart?')">
                                                    <i class="fas fa-trash"></i> Remove
                                                </button>
                                            </form>
                                        </td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>

                <!-- Cart Summary -->
                <div class="col-lg-4">
                    <div class="cart-summary-card">
                        <h3><i class="fas fa-receipt me-2"></i>Order Summary</h3>

                        <!-- Coupon Section -->
                        <div class="summary-item">
                            <span>Subtotal</span>
                            <span>Rp {{ number_format($subtotal, 0, ',', '.') }}</span>
                        </div>

                        <div class="summary-item">
                            <span>Tax (11%)</span>
                            <span>Rp {{ number_format($tax, 0, ',', '.') }}</span>
                        </div>

                        <div class="summary-item">
                            <span>Delivery Fee</span>
                            <span>Rp {{ number_format($deliveryFee, 0, ',', '.') }}</span>
                        </div>

                        @if(session('discount'))
                        <div class="summary-item" style="color: #28a745;">
                            <span>Discount</span>
                            <span>- Rp {{ number_format(session('discount'), 0, ',', '.') }}</span>
                        </div>
                        @endif

                        <div class="summary-item total">
                            <span>Total</span>
                            <span class="amount">Rp {{ number_format($total, 0, ',', '.') }}</span>
                        </div>

                        <a href="{{ route('checkout.index') }}" class="btn-continue-shopping">
                            <i class="fas fa-arrow-right me-2"></i>Continue to Checkout
                        </a>
                    </div>
                </div>
            </div>

            @else
            <!-- Empty Cart -->
            <div class="cart-table-card">
                <div class="empty-cart">
                    <div class="empty-cart-icon">
                        <i class="fas fa-shopping-cart"></i>
                    </div>
                    <h3>Your Cart is Empty</h3>
                    <p>Looks like you haven't added anything to your cart yet</p>
                    <a href="{{ url('/') }}#products" class="btn-checkout" style="max-width: 300px; margin: 0 auto; display: block;">
                        <i class="fas fa-shopping-bag me-2"></i>Start Shopping
                    </a>
                </div>
            </div>
            @endif
        </div>
    </section>
@endsection