@extends('layouts.navigation')

@section('title', 'Cakes Menu - MilkeyBakery')

@push('styles')
<style>
    .page-header {
        position: relative;
        background: linear-gradient(rgba(201, 165, 123, 0.7), rgba(160, 130, 109, 0.7)), 
                    url('https://images.unsplash.com/photo-1578985545062-69928b1d9587?w=1600') center/cover;
        padding: 120px 0 80px;
        color: white;
        margin-top: 56px;
    }
    
    .breadcrumb-custom {
        background: transparent;
        padding: 0;
        margin-bottom: 15px;
    }
    
    .breadcrumb-custom a {
        color: rgba(255,255,255,0.8);
        text-decoration: none;
    }
    
    .breadcrumb-custom a:hover {
        color: white;
    }
    
    .menu-card {
        border: none;
        border-radius: 15px;
        overflow: hidden;
        transition: transform 0.3s ease, box-shadow 0.3s ease;
        height: 100%;
        background: white;
        box-shadow: 0 2px 10px rgba(0,0,0,0.08);
    }
    
    .menu-card:hover {
        transform: translateY(-10px);
        box-shadow: 0 10px 30px rgba(201, 165, 123, 0.3);
    }
    
    .menu-card-img {
        height: 250px;
        object-fit: cover;
        width: 100%;
    }
    
    .menu-card-body {
        padding: 20px;
    }
    
    .menu-card-title {
        font-size: 1.25rem;
        font-weight: 600;
        color: #8B6F47;
        margin-bottom: 10px;
    }
    
    .menu-card-text {
        color: #666;
        font-size: 0.9rem;
        margin-bottom: 15px;
    }
    
    .price {
        font-size: 1.5rem;
        font-weight: 700;
        color: #C9A57B;
        margin-bottom: 15px;
    }
    
    .btn-add-cart {
        background: linear-gradient(135deg, #C9A57B 0%, #A0826D 100%);
        border: none;
        color: white;
        padding: 10px 25px;
        border-radius: 25px;
        transition: all 0.3s ease;
    }
    
    .btn-add-cart:hover {
        transform: scale(1.05);
        box-shadow: 0 5px 15px rgba(201, 165, 123, 0.4);
        color: white;
    }
    
    .badge-new {
        position: absolute;
        top: 15px;
        right: 15px;
        background: #D2B48C;
        color: white;
        padding: 5px 15px;
        border-radius: 20px;
        font-size: 0.8rem;
        font-weight: 600;
    }
    
    .badge-bestseller {
        position: absolute;
        top: 15px;
        left: 15px;
        background: #F5DEB3;
        color: #8B6F47;
        padding: 5px 15px;
        border-radius: 20px;
        font-size: 0.8rem;
        font-weight: 600;
    }
    
    .filter-section {
        background: white;
        padding: 20px;
        border-radius: 10px;
        box-shadow: 0 2px 10px rgba(0,0,0,0.08);
        margin-bottom: 30px;
    }
    
    .filter-btn {
        margin: 5px;
        padding: 8px 20px;
        border-radius: 20px;
        border: 2px solid #C9A57B;
        background: white;
        color: #C9A57B;
        transition: all 0.3s ease;
    }
    
    .filter-btn:hover,
    .filter-btn.active {
        background: #C9A57B;
        color: white;
    }
    
    .cta-section {
        background: #F5E6D3;
    }
    
    .cta-section h2 {
        color: #8B6F47;
    }
</style>
@endpush

@section('content')
    <!-- Page Header -->
    <section class="page-header">
        <div class="container">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb breadcrumb-custom">
                    <li class="breadcrumb-item"><a href="{{ url('/') }}">Home</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Cakes</li>
                </ol>
            </nav>
            <h1 class="display-4 fw-bold">Delicious Cakes</h1>
            <p class="lead">Celebration cakes made with love and finest ingredients</p>
        </div>
    </section>

    <!-- Filter Section -->
    <section class="py-4">
        <div class="container">
            <div class="filter-section">
                <div class="d-flex flex-wrap align-items-center">
                    <span class="me-3 fw-bold text-dark">Filter:</span>
                    <button class="filter-btn active">All</button>
                    <button class="filter-btn">Birthday</button>
                    <button class="filter-btn">Wedding</button>
                    <button class="filter-btn">Cheesecake</button>
                    <button class="filter-btn">Chocolate</button>
                </div>
            </div>
        </div>
    </section>

    <!-- Menu Items -->
    <section class="py-5 bg-light">
        <div class="container">
            <div class="row g-4">
                <!-- Item 1 -->
                <div class="col-md-6 col-lg-4">
                    <div class="menu-card position-relative">
                        <span class="badge-bestseller">Bestseller</span>
                        <img src="https://images.unsplash.com/photo-1578985545062-69928b1d9587?w=500" alt="Chocolate Cake" class="menu-card-img">
                        <div class="menu-card-body">
                            <h3 class="menu-card-title">Classic Chocolate Cake</h3>
                            <p class="menu-card-text">Rich chocolate layers with smooth ganache frosting</p>
                            <div class="price">Rp 250,000</div>
                            <button class="btn btn-add-cart w-100">
                                <i class="fas fa-shopping-cart me-2"></i>Add to Cart
                            </button>
                        </div>
                    </div>
                </div>

                <!-- Item 2 -->
                <div class="col-md-6 col-lg-4">
                    <div class="menu-card position-relative">
                        <span class="badge-new">New</span>
                        <img src="https://images.unsplash.com/photo-1464349095431-e9a21285b5f3?w=500" alt="Red Velvet" class="menu-card-img">
                        <div class="menu-card-body">
                            <h3 class="menu-card-title">Red Velvet Cake</h3>
                            <p class="menu-card-text">Velvety soft red cake with cream cheese frosting</p>
                            <div class="price">Rp 280,000</div>
                            <button class="btn btn-add-cart w-100">
                                <i class="fas fa-shopping-cart me-2"></i>Add to Cart
                            </button>
                        </div>
                    </div>
                </div>

                <!-- Item 3 -->
                <div class="col-md-6 col-lg-4">
                    <div class="menu-card">
                        <img src="https://images.unsplash.com/photo-1565958011703-44f9829ba187?w=500" alt="Cheesecake" class="menu-card-img">
                        <div class="menu-card-body">
                            <h3 class="menu-card-title">New York Cheesecake</h3>
                            <p class="menu-card-text">Creamy cheesecake with graham cracker crust</p>
                            <div class="price">Rp 220,000</div>
                            <button class="btn btn-add-cart w-100">
                                <i class="fas fa-shopping-cart me-2"></i>Add to Cart
                            </button>
                        </div>
                    </div>
                </div>

                <!-- Item 4 -->
                <div class="col-md-6 col-lg-4">
                    <div class="menu-card position-relative">
                        <span class="badge-bestseller">Bestseller</span>
                        <img src="https://images.unsplash.com/photo-1558636508-e0db3814bd1d?w=500" alt="Tiramisu" class="menu-card-img">
                        <div class="menu-card-body">
                            <h3 class="menu-card-title">Tiramisu Cake</h3>
                            <p class="menu-card-text">Italian classic with coffee-soaked ladyfingers</p>
                            <div class="price">Rp 260,000</div>
                            <button class="btn btn-add-cart w-100">
                                <i class="fas fa-shopping-cart me-2"></i>Add to Cart
                            </button>
                        </div>
                    </div>
                </div>

                <!-- Item 5 -->
                <div class="col-md-6 col-lg-4">
                    <div class="menu-card">
                        <img src="https://images.unsplash.com/photo-1535254973040-607b474cb50d?w=500" alt="Carrot Cake" class="menu-card-img">
                        <div class="menu-card-body">
                            <h3 class="menu-card-title">Carrot Cake</h3>
                            <p class="menu-card-text">Moist carrot cake with walnuts and cream cheese</p>
                            <div class="price">Rp 240,000</div>
                            <button class="btn btn-add-cart w-100">
                                <i class="fas fa-shopping-cart me-2"></i>Add to Cart
                            </button>
                        </div>
                    </div>
                </div>

                <!-- Item 6 -->
                <div class="col-md-6 col-lg-4">
                    <div class="menu-card position-relative">
                        <span class="badge-new">New</span>
                        <img src="https://images.unsplash.com/photo-1606313564200-e75d5e30476c?w=500" alt="Strawberry Cake" class="menu-card-img">
                        <div class="menu-card-body">
                            <h3 class="menu-card-title">Strawberry Shortcake</h3>
                            <p class="menu-card-text">Light sponge cake with fresh strawberries and cream</p>
                            <div class="price">Rp 270,000</div>
                            <button class="btn btn-add-cart w-100">
                                <i class="fas fa-shopping-cart me-2"></i>Add to Cart
                            </button>
                        </div>
                    </div>
                </div>

                <!-- Item 7 -->
                <div class="col-md-6 col-lg-4">
                    <div class="menu-card">
                        <img src="https://images.unsplash.com/photo-1562440499-64c9a111f713?w=500" alt="Black Forest" class="menu-card-img">
                        <div class="menu-card-body">
                            <h3 class="menu-card-title">Black Forest Cake</h3>
                            <p class="menu-card-text">Chocolate cake with cherries and whipped cream</p>
                            <div class="price">Rp 265,000</div>
                            <button class="btn btn-add-cart w-100">
                                <i class="fas fa-shopping-cart me-2"></i>Add to Cart
                            </button>
                        </div>
                    </div>
                </div>

                <!-- Item 8 -->
                <div class="col-md-6 col-lg-4">
                    <div class="menu-card position-relative">
                        <span class="badge-bestseller">Bestseller</span>
                        <img src="https://images.unsplash.com/photo-1588195538326-c5b1e5b80ab0?w=500" alt="Matcha Cake" class="menu-card-img">
                        <div class="menu-card-body">
                            <h3 class="menu-card-title">Matcha Green Tea Cake</h3>
                            <p class="menu-card-text">Japanese-inspired matcha cake with white chocolate</p>
                            <div class="price">Rp 285,000</div>
                            <button class="btn btn-add-cart w-100">
                                <i class="fas fa-shopping-cart me-2"></i>Add to Cart
                            </button>
                        </div>
                    </div>
                </div>

                <!-- Item 9 -->
                <div class="col-md-6 col-lg-4">
                    <div class="menu-card">
                        <img src="https://images.unsplash.com/photo-1621303837174-89787a7d4729?w=500" alt="Opera Cake" class="menu-card-img">
                        <div class="menu-card-body">
                            <h3 class="menu-card-title">Opera Cake</h3>
                            <p class="menu-card-text">French almond sponge with coffee buttercream</p>
                            <div class="price">Rp 295,000</div>
                            <button class="btn btn-add-cart w-100">
                                <i class="fas fa-shopping-cart me-2"></i>Add to Cart
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- CTA Section -->
    <section class="py-5 cta-section">
        <div class="container text-center">
            <h2 class="mb-3">Need a Custom Cake?</h2>
            <p class="text-muted mb-4">We create personalized cakes for birthdays, weddings, and special events</p>
            <a href="{{ url('/') }}#contact" class="btn btn-hero-brown btn-lg">Order Custom Cake</a>
        </div>
    </section>
@endsection

@push('scripts')
<script>
    // Filter functionality
    document.querySelectorAll('.filter-btn').forEach(btn => {
        btn.addEventListener('click', function() {
            document.querySelectorAll('.filter-btn').forEach(b => b.classList.remove('active'));
            this.classList.add('active');
        });
    });
</script>
@endpush