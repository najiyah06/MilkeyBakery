@extends('layouts.navigation')

@section('title', 'Home - MilkeyBakery')

@section('content')
    <!-- Hero Section -->
    <section id="home" class="hero-section">
        <div class="hero-overlay"></div>
        <div class="container">
            <div class="row align-items-center min-vh-100">
                <div class="col-lg-6 hero-content">
                    <h1 class="hero-title">Freshly Baked Daily</h1>
                    <p class="hero-subtitle">Handcrafted with love, baked to perfection</p>
                    <div class="hero-buttons">
                        <a href="#products" class="btn btn-pink btn-lg me-3">Shop Now</a>
                        <a href="#about" class="btn btn-outline-light btn-lg">Learn More</a>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- About Section -->
    <section id="about" class="about-section py-5">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-6 mb-4 mb-lg-0">
                    <img src="https://images.unsplash.com/photo-1509440159596-0249088772ff?w=800" alt="Bakery" class="img-fluid rounded shadow">
                </div>
                <div class="col-lg-6">
                    <h2 class="section-title">Our Story</h2>
                    <p class="text-muted">Di MilkeyBakery, menjunjung tinggi seni memanggang tradisional. Setiap pagi, pembuat roti terampil kami menggunakan bahan-bahan terbaik untuk meracik roti, kue kering, dan kue. Kami menjamin Anda menerima produk dengan kualitas dan kesegaran premium.</p>
                    <p class="text-muted">Resep kami adalah peninggalan keluarga yang telah disempurnakan turun-temurun, menciptakan keseimbangan rasa dan tekstur yang sempurna. Kami berdedikasi untuk menghadirkan kehangatan dan kebahagiaan terbaik dari keluarga kami di setiap sajian untuk Anda.</p>
                    <a href="#products" class="btn btn-pink mt-3">Explore Our Products</a>
                </div>
            </div>
        </div>
    </section>

    <!-- Products Section -->
    <section id="products" class="products-section py-5 bg-light">
        <div class="container">
            <h2 class="section-title text-center mb-5">Bakery</h2>

            <div class="product-scroll-wrapper">

                <!-- BUTTON KIRI -->
                <button class="scroll-btn left" onclick="scrollProduct(-1)">
                    <i class="fas fa-chevron-left"></i>
                </button>

                <!-- AREA SCROLL -->
                <div class="product-scroll" id="productScroll">

                    <a href="{{ url('/menu/bread') }}" class="product-item">
                        <div class="product-card">
                            <div class="product-image">
                                <img src="https://images.unsplash.com/photo-1555507036-ab1f4038808a?w=500">
                            </div>
                            <div class="product-info">
                                <h3>Bread</h3>
                                <p>Freshly baked pastries</p>
                            </div>
                        </div>
                    </a>

                    <a href="{{ url('/menu/cakes') }}" class="product-item">
                        <div class="product-card">
                            <div class="product-image">
                                <img src="https://images.unsplash.com/photo-1555507036-ab1f4038808a?w=500">
                            </div>
                            <div class="product-info">
                                <h3>Cakes</h3>
                                <p>Freshly baked pastries</p>
                            </div>
                        </div>
                    </a>

                    <a href="{{ url('/menu/pastry') }}" class="product-item">
                        <div class="product-card">
                            <div class="product-image">
                                <img src="https://images.unsplash.com/photo-1555507036-ab1f4038808a?w=500">
                            </div>
                            <div class="product-info">
                                <h3>Pastry & Pie</h3>
                                <p>Freshly baked pastries</p>
                            </div>
                        </div>
                    </a>

                    <a href="{{ url('/menu/sandwiches') }}" class="product-item">
                        <div class="product-card">
                            <div class="product-image">
                                <img src="https://images.unsplash.com/photo-1555507036-ab1f4038808a?w=500">
                            </div>
                            <div class="product-info">
                                <h3>Sandwiches</h3>
                                <p>Freshly baked pastries</p>
                            </div>
                        </div>
                    </a>

                    <a href="{{ url('/menu/coffee') }}" class="product-item">
                        <div class="product-card">
                            <div class="product-image">
                                <img src="https://images.unsplash.com/photo-1555507036-ab1f4038808a?w=500">
                            </div>
                            <div class="product-info">
                                <h3>Coffee & Espresso</h3>
                                <p>Freshly baked pastries</p>
                            </div>
                        </div>
                    </a>

                </div> <!-- TUTUP product-scroll -->

                <button class="scroll-btn right" onclick="scrollProduct(1)">
                    <i class="fas fa-chevron-right"></i>
                </button>

            </div> <!-- TUTUP wrapper -->
        </div>
    </section>

    <!-- Contact Section -->
    <section id="contact" class="contact-section py-5">
        <div class="container">
            <div class="row">
                <div class="col-lg-6 mb-4 mb-lg-0">
                    <h2 class="section-title">Visit Us</h2>
                    <div class="contact-info">
                        <div class="info-item">
                            <i class="fas fa-map-marker-alt"></i>
                            <div>
                                <h5>Address</h5>
                                <p>Jl. Raya Bakery No. 123, Surabaya</p>
                            </div>
                        </div>
                        <div class="info-item">
                            <i class="fas fa-phone"></i>
                            <div>
                                <h5>Phone</h5>
                                <p>(031) 1234-5678</p>
                            </div>
                        </div>
                        <div class="info-item">
                            <i class="fas fa-clock"></i>
                            <div>
                                <h5>Hours</h5>
                                <p>Mon-Sat: 7AM - 8PM<br>Sunday: 8AM - 6PM</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection