@extends('layouts.navigation')

@section('title', 'Pengiriman - MilkeyBakery')

@push('styles')
<style>
    .page-header {
        position: relative;
        background: linear-gradient(rgba(139, 111, 71, 0.8), rgba(121, 85, 61, 0.8)), 
                    url('https://images.unsplash.com/photo-1591768793355-74d04bb6608f?w=1600') center/cover;
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

    /* Hero Section */
    .hero-delivery-section {
        padding: 80px 0;
        background: white;
    }

    .hero-delivery-content h2 {
        color: #8B6F47;
        font-size: 2.5rem;
        font-weight: 700;
        margin-bottom: 20px;
    }

    .hero-delivery-content p {
        color: #666;
        font-size: 1.1rem;
        line-height: 1.8;
        margin-bottom: 30px;
    }

    .btn-contact-delivery {
        background: linear-gradient(135deg, #C9A57B 0%, #A0826D 100%);
        color: white;
        border: none;
        padding: 12px 35px;
        border-radius: 25px;
        font-weight: 600;
        transition: all 0.3s ease;
        text-decoration: none;
        display: inline-block;
    }

    .btn-contact-delivery:hover {
        transform: scale(1.05);
        box-shadow: 0 5px 15px rgba(201, 165, 123, 0.4);
        color: white;
    }

    .hero-delivery-image {
        border-radius: 20px;
        overflow: hidden;
        box-shadow: 0 15px 40px rgba(139, 111, 71, 0.2);
    }

    .hero-delivery-image img {
        width: 100%;
        height: auto;
        display: block;
    }

    /* Delivery Service Section */
    .delivery-service-section {
        padding: 80px 0;
        background: #FFF8F0;
    }

    .section-title-delivery {
        color: #8B6F47;
        font-size: 2.5rem;
        font-weight: 700;
        margin-bottom: 15px;
    }

    .section-subtitle {
        color: #666;
        font-size: 1.1rem;
        margin-bottom: 50px;
    }

    .delivery-area-list {
        background: white;
        border-radius: 20px;
        padding: 40px;
        box-shadow: 0 10px 30px rgba(139, 111, 71, 0.1);
    }

    .delivery-area-item {
        display: flex;
        justify-content: space-between;
        align-items: center;
        padding: 25px 0;
        border-bottom: 2px solid #F5E6D3;
        transition: all 0.3s ease;
    }

    .delivery-area-item:last-child {
        border-bottom: none;
    }

    .delivery-area-item:hover {
        padding-left: 15px;
        background: linear-gradient(90deg, #FFF8F0 0%, transparent 100%);
    }

    .delivery-area-name {
        display: flex;
        align-items: center;
        font-size: 1.25rem;
        font-weight: 600;
        color: #8B6F47;
    }

    .delivery-area-name i {
        margin-right: 15px;
        color: #C9A57B;
        font-size: 1.5rem;
    }

    .delivery-area-price {
        font-size: 1.25rem;
        font-weight: 700;
        color: #C9A57B;
    }

    .delivery-image-section {
        margin-top: 40px;
    }

    .delivery-courier-image {
        border-radius: 20px;
        overflow: hidden;
        box-shadow: 0 15px 40px rgba(139, 111, 71, 0.2);
        height: 100%;
    }

    .delivery-courier-image img {
        width: 100%;
        height: 100%;
        object-fit: cover;
        display: block;
    }

    /* Info Section */
    .info-section {
        background: linear-gradient(135deg, #F5E6D3 0%, #EDD5BA 100%);
        padding: 60px 0;
    }

    .info-card {
        background: white;
        border-radius: 20px;
        padding: 35px;
        text-align: center;
        border: 2px solid #E8D5C4;
        transition: all 0.3s ease;
        height: 100%;
    }

    .info-card:hover {
        transform: translateY(-5px);
        box-shadow: 0 10px 30px rgba(139, 111, 71, 0.15);
        border-color: #C9A57B;
    }

    .info-icon {
        width: 80px;
        height: 80px;
        margin: 0 auto 20px;
        background: linear-gradient(135deg, #C9A57B 0%, #A0826D 100%);
        border-radius: 50%;
        display: flex;
        align-items: center;
        justify-content: center;
    }

    .info-icon i {
        font-size: 2rem;
        color: white;
    }

    .info-title {
        font-size: 1.25rem;
        font-weight: 700;
        color: #8B6F47;
        margin-bottom: 15px;
    }

    .info-text {
        color: #666;
        line-height: 1.8;
        margin: 0;
    }

    /* Contact CTA */
    .contact-cta-section {
        background: linear-gradient(135deg, #8B6F47 0%, #79553D 100%);
        padding: 80px 0;
        color: white;
        text-align: center;
    }

    .contact-cta-section h2 {
        font-size: 2.5rem;
        font-weight: 700;
        margin-bottom: 20px;
    }

    .contact-cta-section p {
        font-size: 1.1rem;
        margin-bottom: 40px;
        opacity: 0.9;
    }

    .btn-contact-cta {
        background: rgba(255, 255, 255, 0.2);
        backdrop-filter: blur(10px);
        border: 2px solid white;
        color: white;
        padding: 15px 40px;
        border-radius: 25px;
        font-weight: 600;
        font-size: 1.1rem;
        transition: all 0.3s ease;
        text-decoration: none;
        display: inline-block;
        margin: 0 10px;
    }

    .btn-contact-cta:hover {
        background: white;
        color: #8B6F47;
        transform: scale(1.05);
    }

    @media (max-width: 768px) {
        .hero-delivery-content h2,
        .section-title-delivery,
        .contact-cta-section h2 {
            font-size: 2rem;
        }

        .delivery-area-name {
            font-size: 1rem;
        }

        .delivery-area-price {
            font-size: 1rem;
        }

        .delivery-area-item {
            padding: 20px 0;
        }
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
                    <li class="breadcrumb-item active" aria-current="page">Pengiriman</li>
                </ol>
            </nav>
            <h1 class="display-4 fw-bold">Shipping & Delivery</h1>
            <p class="lead">Layanan pengiriman terpercaya untuk produk Anda</p>
        </div>
    </section>

    <!-- Hero Delivery Section -->
    <section class="hero-delivery-section">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-6 mb-4 mb-lg-0">
                    <div class="hero-delivery-content">
                        <h2>Shipping & Delivery</h2>
                        <p>Tersedia layanan pengiriman kue dari kurir internal berpengalaman dari MilkeyBakery maupun pihak ketiga untuk Kab. Tangerang dan Kab. Bekasi. Hubungi customer service kami untuk informasi lebih lanjut.</p>
                            <a 
                                href="https://wa.me/6285117149372?text=Halo%20MilkeyBakery,%20saya%20ingin%20tanya%20soal%20pengiriman"
                                target="_blank"
                                class="btn-contact-delivery"
                            >
                                <i class="fab fa-whatsapp me-2"></i>Contact Us
                            </a>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="hero-delivery-image">
                        <img src="https://images.unsplash.com/photo-1591768793355-74d04bb6608f?w=800" alt="MilkeyBakery Delivery Team">
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Delivery Service Section -->
    <section class="delivery-service-section">
        <div class="container">
            <div class="text-center">
                <h2 class="section-title-delivery">MilkeyBakery Delivery Service</h2>
                <p class="section-subtitle">MilkeyBakery melayani pengiriman setiap hari dengan jangkauan wilayah Jakarta, Depok, Tangerang, dan Bekasi area (JADETABEK).</p>
            </div>

            <div class="row">
                <div class="col-lg-6">
                    <div class="delivery-area-list">
                        <!-- Delivery Area 1 -->
                        <div class="delivery-area-item">
                            <div class="delivery-area-name">
                                <i class="fas fa-map-marker-alt"></i>
                                <span>South Jakarta</span>
                            </div>
                            <div class="delivery-area-price">Rp 35,000</div>
                        </div>

                        <!-- Delivery Area 2 -->
                        <div class="delivery-area-item">
                            <div class="delivery-area-name">
                                <i class="fas fa-map-marker-alt"></i>
                                <span>Central Jakarta</span>
                            </div>
                            <div class="delivery-area-price">Rp 40,000</div>
                        </div>

                        <!-- Delivery Area 3 -->
                        <div class="delivery-area-item">
                            <div class="delivery-area-name">
                                <i class="fas fa-map-marker-alt"></i>
                                <span>West Jakarta</span>
                            </div>
                            <div class="delivery-area-price">Rp 45,000</div>
                        </div>

                        <!-- Delivery Area 4 -->
                        <div class="delivery-area-item">
                            <div class="delivery-area-name">
                                <i class="fas fa-map-marker-alt"></i>
                                <span>North Jakarta</span>
                            </div>
                            <div class="delivery-area-price">Rp 50,000</div>
                        </div>

                        <!-- Delivery Area 5 -->
                        <div class="delivery-area-item">
                            <div class="delivery-area-name">
                                <i class="fas fa-map-marker-alt"></i>
                                <span>East Jakarta</span>
                            </div>
                            <div class="delivery-area-price">Rp 60,000</div>
                        </div>

                        <!-- Delivery Area 6 -->
                        <div class="delivery-area-item">
                            <div class="delivery-area-name">
                                <i class="fas fa-map-marker-alt"></i>
                                <span>Depok</span>
                            </div>
                            <div class="delivery-area-price">Rp 60,000</div>
                        </div>

                        <!-- Delivery Area 7 -->
                        <div class="delivery-area-item">
                            <div class="delivery-area-name">
                                <i class="fas fa-map-marker-alt"></i>
                                <span>Tangerang</span>
                            </div>
                            <div class="delivery-area-price">Rp 70,000</div>
                        </div>

                        <!-- Delivery Area 8 -->
                        <div class="delivery-area-item">
                            <div class="delivery-area-name">
                                <i class="fas fa-map-marker-alt"></i>
                                <span>Bekasi</span>
                            </div>
                            <div class="delivery-area-price">Rp 75,000</div>
                        </div>
                    </div>
                </div>

                <div class="col-lg-6">
                    <div class="delivery-image-section">
                        <div class="delivery-courier-image">
                            <img src="https://images.unsplash.com/photo-1566576721346-d4a3b4eaeb55?w=800" alt="MilkeyBakery Courier">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Info Section -->
    <section class="info-section">
        <div class="container">
            <div class="row g-4">
                <!-- Info Card 1 -->
                <div class="col-md-4">
                    <div class="info-card">
                        <div class="info-icon">
                            <i class="fas fa-truck"></i>
                        </div>
                        <h4 class="info-title">Kurir Berpengalaman</h4>
                        <p class="info-text">Tim kurir internal kami terlatih untuk menangani produk bakery dengan hati-hati agar sampai dengan aman</p>
                    </div>
                </div>

                <!-- Info Card 2 -->
                <div class="col-md-4">
                    <div class="info-card">
                        <div class="info-icon">
                            <i class="fas fa-clock"></i>
                        </div>
                        <h4 class="info-title">Pengiriman Cepat</h4>
                        <p class="info-text">Estimasi waktu pengiriman 1-2 jam setelah konfirmasi pesanan, tergantung jarak lokasi</p>
                    </div>
                </div>

                <!-- Info Card 3 -->
                <div class="col-md-4">
                    <div class="info-card">
                        <div class="info-icon">
                            <i class="fas fa-shield-alt"></i>
                        </div>
                        <h4 class="info-title">Kemasan Aman</h4>
                        <p class="info-text">Produk dikemas dengan packaging khusus untuk menjaga kualitas dan kesegaran selama perjalanan</p>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection