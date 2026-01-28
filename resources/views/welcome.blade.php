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
                        <a href="{{ url('/about/about') }}" class="btn btn-outline-light btn-lg">Learn More</a>
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
        <div class="text-center mb-5">
            <h2 class="section-title">Bakery</h2>
            <p class="text-muted mx-auto" style="max-width: 700px;">
                MilkeyBakery menghadirkan berbagai menu kue lezat untuk menemani setiap momen spesial Anda.
            </p>
        </div>

        <div class="row g-4 justify-content-center">

            <!-- Bread -->
            <div class="col-md-4 col-sm-6">
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
            </div>

            <!-- Cakes -->
            <div class="col-md-4 col-sm-6">
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
            </div>

            <!-- Pastry -->
            <div class="col-md-4 col-sm-6">
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
            </div>

        </div>
    </div>
</section>


<!-- Customer Service Section -->
    <section id="services" class="services-section py-5">
        <div class="container">
            <div class="text-center mb-5">
                <h2 class="section-title">Layanan Pelanggan</h2>
                <p class="text-muted mx-auto" style="max-width: 700px;">
                    Kami berkomitmen memberikan pelayanan terbaik untuk kepuasan Anda
                </p>
            </div>

            <div class="row g-4 justify-content-center">
                <!-- Service 1 - Layanan Pelanggan -->
                <div class="col-md-6">
                    <div class="service-card-large">
                        <div class="service-image-overlay">
                            <img src="https://images.unsplash.com/photo-1556742049-0cfed4f6a45d?w=800" alt="Customer Service" class="service-bg-image">
                            <div class="service-overlay"></div>
                        </div>
                        <div class="service-content">
                            <h3 class="service-large-title">Layanan Pelanggan</h3>
                            <p class="service-large-text">Nikmati dukungan dan bantuan dari tim Customer Service kami yang berdedikasi</p>
                            <a href="{{ url('/contact/service') }}" class="btn btn-service">Hubungi Kami</a>
                        </div>
                    </div>
                </div>

                <!-- Service 2 - Pengiriman Kue -->
                <div class="col-md-6">
                    <div class="service-card-large">
                        <div class="service-image-overlay">
                            <img src="https://images.unsplash.com/photo-1591768793355-74d04bb6608f?w=800" alt="Cake Delivery" class="service-bg-image">
                            <div class="service-overlay"></div>
                        </div>
                        <div class="service-content">
                            <h3 class="service-large-title">Pengiriman Kue</h3>
                            <p class="service-large-text">Delivery service dari kurir internal berpengalaman dari MilkeyBakery membuat produk kue Anda aman sampai tujuan</p>
                            <a href="{{ url('/contact/pengiriman') }}" class="btn btn-service">Cek Informasi</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection