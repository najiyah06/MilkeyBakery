<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>MilkeyBakery</title>
    <link rel="icon" href="{{ asset('images/logo.png') }}" type="images/png">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link rel="stylesheet" href="{{ asset('css/custom.css') }}">
</head>
<body>
    <!-- Navigation -->
    <nav class="navbar navbar-expand-lg navbar-light fixed-top">
        <div class="container">
            <a class="navbar-brand" href="#">
                <span class="brand-name">MilkeyBakery</span>
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto align-items-center">
                    <li class="nav-item">
                        <a class="nav-link" href="#home">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#about">About</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#products">Products</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#contact">Contact</a>
                    </li>
                    <li class="nav-item ms-3">
                        @auth
                            <span class="text-muted me-2">Hi, {{ Auth::user()->name }}</span>
                            <form action="{{ route('logout') }}" method="POST" class="d-inline">
                                @csrf
                                <button type="submit" class="btn btn-outline-secondary btn-sm">Logout</button>
                            </form>
                        @else
                            <a href="{{ route('login') }}" class="btn btn-outline-secondary btn-sm me-2">Login</a>
                            <a href="{{ route('register') }}" class="btn btn-pink btn-sm">Register</a>
                        @endauth
                    </li>
                </ul>
            </div>
        </div>
    </nav>

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
            <h2 class="section-title text-center mb-5">Our Specialties</h2>
            <div class="row g-4">
                <div class="col-md-4">
                    <div class="product-card">
                        <div class="product-image">
                            <img src="https://images.unsplash.com/photo-1555507036-ab1f4038808a?w=500" alt="Artisan Bread">
                        </div>
                        <div class="product-info">
                            <h3>Artisan Bread</h3>
                            <p>Freshly baked sourdough, baguettes, and whole grain loaves</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="product-card">
                        <div class="product-image">
                            <img src="https://images.unsplash.com/photo-1586985289688-ca3cf47d3e6e?w=500" alt="Pastries">
                        </div>
                        <div class="product-info">
                            <h3>Pastries</h3>
                            <p>Flaky croissants, danish, and sweet morning treats</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="product-card">
                        <div class="product-image">
                            <img src="https://images.unsplash.com/photo-1578985545062-69928b1d9587?w=500" alt="Cakes">
                        </div>
                        <div class="product-info">
                            <h3>Custom Cakes</h3>
                            <p>Beautiful cakes for every special occasion</p>
                        </div>
                    </div>
                </div>
            </div>
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
                <div class="col-lg-6">
                    <h2 class="section-title">Get In Touch</h2>
                    <form class="contact-form">
                        <div class="mb-3">
                            <input type="text" class="form-control" placeholder="Your Name">
                        </div>
                        <div class="mb-3">
                            <input type="email" class="form-control" placeholder="Your Email">
                        </div>
                        <div class="mb-3">
                            <textarea class="form-control" rows="4" placeholder="Your Message"></textarea>
                        </div>
                        <button type="submit" class="btn btn-pink">Send Message</button>
                    </form>
                </div>
            </div>
        </div>
    </section>

    <!-- Footer -->
    <footer class="footer py-4">
        <div class="container text-center">
            <p class="mb-2">&copy; 2024 MilkeyBakery. All rights reserved.</p>
            <div class="social-links">
                <a href="#"><i class="fab fa-facebook"></i></a>
                <a href="#"><i class="fab fa-instagram"></i></a>
                <a href="#"><i class="fab fa-twitter"></i></a>
            </div>
        </div>
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="{{ asset('js/custom.js') }}"></script>
</body>
</html>