@extends('layouts.navigation')

@section('title', 'Bread Menu - MilkeyBakery')

@push('styles')
<style>
    .page-header {
        position: relative;
        background: linear-gradient(rgba(201, 165, 123, 0.7), rgba(160, 130, 109, 0.7)), 
                    url('https://images.unsplash.com/photo-1509440159596-0249088772ff?w=1600') center/cover;
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
    
    .badge-popular {
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

    .btn-hero-brown {
    background: linear-gradient(135deg, #8a5b3a, #5a3924);
    color: #fff !important;
    padding: 12px 34px;
    border-radius: 50px;
    font-weight: 600;
    box-shadow: 0 8px 20px rgba(90, 57, 36, 0.25);
    transition: all 0.3s ease;
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
                    <li class="breadcrumb-item active" aria-current="page">Bread</li>
                </ol>
            </nav>
            <h1 class="display-4 fw-bold">Freshly Baked Bread</h1>
            <p class="lead">Handcrafted daily with premium ingredients</p>
        </div>
    </section>

    <!-- Filter Section -->
    <section class="py-4">
        <div class="container">
            <div class="filter-section">
                <div class="d-flex flex-wrap align-items-center">
                    <span class="me-3 fw-bold text-dark">Filter:</span>
                    <button class="filter-btn active">All</button>
                    <button class="filter-btn">Sourdough</button>
                    <button class="filter-btn">Whole Wheat</button>
                    <button class="filter-btn">Sweet Bread</button>
                    <button class="filter-btn">Artisan</button>
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
                        <span class="badge-popular">Popular</span>
                        <img src="https://images.unsplash.com/photo-1549931319-a545dcf3bc73?w=500" alt="Sourdough" class="menu-card-img">
                        <div class="menu-card-body">
                            <h3 class="menu-card-title">Classic Sourdough</h3>
                            <p class="menu-card-text">Traditional sourdough with crispy crust and soft, tangy interior</p>
                            <div class="price">Rp 45,000</div>
                            <!-- <form action="{{ url('/cart/add') }}" method="POST">
    @csrf
    <input type="hidden" name="id" value="sourdough">
    <input type="hidden" name="name" value="Classic Sourdough">
    <input type="hidden" name="price" value="45000">
    <input type="hidden" name="image" value="https://images.unsplash.com/photo-1549931319-a545dcf3bc73?w=500">

    <button type="submit" class="btn btn-add-cart w-100">
        <i class="fas fa-shopping-cart me-2"></i>Add to Cart
    </button>
</form> -->

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
                        <img src="https://images.unsplash.com/photo-1585478259715-876acc5be8eb?w=500" alt="Baguette" class="menu-card-img">
                        <div class="menu-card-body">
                            <h3 class="menu-card-title">French Baguette</h3>
                            <p class="menu-card-text">Authentic French baguette with perfect golden crust</p>
                            <div class="price">Rp 35,000</div>
                            <button class="btn btn-add-cart w-100">
                                <i class="fas fa-shopping-cart me-2"></i>Add to Cart
                            </button>
                        </div>
                    </div>
                </div>

                <!-- Item 3 -->
                <div class="col-md-6 col-lg-4">
                    <div class="menu-card">
                        <img src="https://images.unsplash.com/photo-1598373182133-52452f7691ef?w=500" alt="Whole Wheat" class="menu-card-img">
                        <div class="menu-card-body">
                            <h3 class="menu-card-title">Whole Wheat Bread</h3>
                            <p class="menu-card-text">Nutritious whole wheat bread, perfect for healthy lifestyle</p>
                            <div class="price">Rp 38,000</div>
                            <button class="btn btn-add-cart w-100">
                                <i class="fas fa-shopping-cart me-2"></i>Add to Cart
                            </button>
                        </div>
                    </div>
                </div>

                <!-- Item 4 -->
                <div class="col-md-6 col-lg-4">
                    <div class="menu-card position-relative">
                        <span class="badge-popular">Popular</span>
                        <img src="https://images.unsplash.com/photo-1586444248902-2f64eddc13df?w=500" alt="Ciabatta" class="menu-card-img">
                        <div class="menu-card-body">
                            <h3 class="menu-card-title">Italian Ciabatta</h3>
                            <p class="menu-card-text">Light and airy Italian bread with olive oil infusion</p>
                            <div class="price">Rp 42,000</div>
                            <button class="btn btn-add-cart w-100">
                                <i class="fas fa-shopping-cart me-2"></i>Add to Cart
                            </button>
                        </div>
                    </div>
                </div>

                <!-- Item 5 -->
                <div class="col-md-6 col-lg-4">
                    <div class="menu-card">
                        <img src="https://images.unsplash.com/photo-1509440159596-0249088772ff?w=500" alt="Multigrain" class="menu-card-img">
                        <div class="menu-card-body">
                            <h3 class="menu-card-title">Multigrain Bread</h3>
                            <p class="menu-card-text">Hearty bread packed with seeds and multiple grains</p>
                            <div class="price">Rp 40,000</div>
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
                        <img src="https://images.unsplash.com/photo-1608198399988-841b00f55e44?w=500" alt="Brioche" class="menu-card-img">
                        <div class="menu-card-body">
                            <h3 class="menu-card-title">Butter Brioche</h3>
                            <p class="menu-card-text">Rich, buttery French bread with slightly sweet flavor</p>
                            <div class="price">Rp 48,000</div>
                            <button class="btn btn-add-cart w-100">
                                <i class="fas fa-shopping-cart me-2"></i>Add to Cart
                            </button>
                        </div>
                    </div>
                </div>

                <!-- Item 7 -->
                <div class="col-md-6 col-lg-4">
                    <div class="menu-card">
                        <img src="https://images.unsplash.com/photo-1621024342575-c1c2e91b5617?w=500" alt="Rye Bread" class="menu-card-img">
                        <div class="menu-card-body">
                            <h3 class="menu-card-title">Rye Bread</h3>
                            <p class="menu-card-text">Dense and flavorful rye bread with caraway seeds</p>
                            <div class="price">Rp 43,000</div>
                            <button class="btn btn-add-cart w-100">
                                <i class="fas fa-shopping-cart me-2"></i>Add to Cart
                            </button>
                        </div>
                    </div>
                </div>

                <!-- Item 8 -->
                <div class="col-md-6 col-lg-4">
                    <div class="menu-card position-relative">
                        <span class="badge-popular">Popular</span>
                        <img src="https://images.unsplash.com/photo-1555507036-ab1f4038808a?w=500" alt="Focaccia" class="menu-card-img">
                        <div class="menu-card-body">
                            <h3 class="menu-card-title">Rosemary Focaccia</h3>
                            <p class="menu-card-text">Italian flatbread with fresh rosemary and sea salt</p>
                            <div class="price">Rp 39,000</div>
                            <button class="btn btn-add-cart w-100">
                                <i class="fas fa-shopping-cart me-2"></i>Add to Cart
                            </button>
                        </div>
                    </div>
                </div>

                <!-- Item 9 -->
                <div class="col-md-6 col-lg-4">
                    <div class="menu-card">
                        <img src="https://images.unsplash.com/photo-1612182062639-864bfbc5f4ef?w=500" alt="Milk Bread" class="menu-card-img">
                        <div class="menu-card-body">
                            <h3 class="menu-card-title">Japanese Milk Bread</h3>
                            <p class="menu-card-text">Ultra-soft and fluffy Asian-style white bread</p>
                            <div class="price">Rp 36,000</div>
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
            <h2 class="mb-3">Can't Find What You're Looking For?</h2>
            <p class="text-muted mb-4">We offer custom bread orders for special occasions and events</p>
            <a href="{{ url('/') }}#contact" class="btn btn-hero-brown btn-lg">Contact Us</a>
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