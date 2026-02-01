@extends('layouts.navigation')

@section('title', 'Customer Service - MilkeyBakery')

@push('styles')
<style>
    .page-header {
        background: linear-gradient(rgba(139,111,71,.85), rgba(121,85,61,.85)),
        url('https://images.unsplash.com/photo-1556742049-0cfed4f6a45d?w=1600') center/cover;
        padding: 120px 0 80px;
        color: white;
        margin-top: 56px;
        text-align: center;
    }

    /* INFO BAR */
    .info-bar {
        background: #FFF8F0;
        padding: 30px 0;
    }

    .info-item {
        text-align: center;
        color: #8B6F47;
        font-weight: 600;
    }

    .info-item i {
        font-size: 1.8rem;
        margin-bottom: 10px;
        display: block;
        color: #C9A57B;
    }

    /* FEATURES */
    .features-section {
        padding: 80px 0;
        background: white;
    }

    .feature-card {
        background: linear-gradient(135deg,#FFF8F0,#F5E6D3);
        padding: 40px 30px;
        border-radius: 20px;
        text-align: center;
        border: 2px solid #E8D5C4;
        height: 100%;
        transition: .3s;
    }

    .feature-card:hover {
        transform: translateY(-8px);
        box-shadow: 0 15px 35px rgba(139,111,71,.2);
        border-color: #C9A57B;
    }

    .feature-icon {
        width: 90px;
        height: 90px;
        margin: 0 auto 20px;
        background: linear-gradient(135deg,#C9A57B,#A0826D);
        border-radius: 50%;
        display: flex;
        align-items: center;
        justify-content: center;
    }

    .feature-icon i {
        font-size: 2.2rem;
        color: white;
    }

    .feature-title {
        font-size: 1.3rem;
        font-weight: 700;
        color: #8B6F47;
        margin-bottom: 10px;
    }

    .feature-text {
        color: #666;
        line-height: 1.7;
    }

    /* TRUST */
    .trust-section {
        background: #FFF8F0;
        padding: 70px 0;
        text-align: center;
    }

    .trust-number {
        font-size: 2.5rem;
        font-weight: 700;
        color: #8B6F47;
    }

    .trust-label {
        color: #666;
        font-size: .95rem;
    }

    /* FAQ */
    .faq-section {
        padding: 80px 0;
        background: white;
    }

    .faq-item {
        background: #FFF8F0;
        border-radius: 15px;
        margin-bottom: 20px;
        padding: 25px 30px;
        cursor: pointer;
    }

    .faq-item h5 {
        margin: 0;
        color: #8B6F47;
        font-weight: 600;
    }

    .faq-answer {
        display: none;
        margin-top: 15px;
        color: #666;
        line-height: 1.7;
    }

    /* CONTACT */
    .contact-cta-section {
        background: linear-gradient(135deg,#8B6F47,#79553D);
        padding: 80px 0;
        color: white;
        text-align: center;
    }

    .contact-card {
        background: rgba(255,255,255,.15);
        padding: 40px;
        border-radius: 20px;
        display: inline-block;
        transition: .3s;
        color: white;
    }

    .contact-card:hover {
        transform: translateY(-6px);
        box-shadow: 0 12px 25px rgba(0,0,0,.2);
    }
</style>
@endpush

@section('content')

<!-- HEADER -->
<section class="page-header">
    <div class="container">
        <h1 class="fw-bold">Layanan Pelanggan</h1>
        <p>Kami siap melayani pesanan Anda setiap hari</p>
    </div>
</section>

<!-- INFO BAR -->
<section class="info-bar">
    <div class="container">
        <div class="row text-center">
            <div class="col-md-4 info-item">
                <i class="fas fa-clock"></i>
                Buka Setiap Hari<br>08.00 – 21.00
            </div>
            <div class="col-md-4 info-item">
                <i class="fas fa-bread-slice"></i>
                Fresh Baked Daily
            </div>
            <div class="col-md-4 info-item">
                <i class="fas fa-shipping-fast"></i>
                Same Day Delivery
            </div>
        </div>
    </div>
</section>

<!-- FEATURES -->
<section class="features-section">
    <div class="container">
        <div class="row g-4 justify-content-center">

            <div class="col-md-3">
                <div class="feature-card">
                    <div class="feature-icon"><i class="fas fa-gift"></i></div>
                    <h4 class="feature-title">Gift Packaging</h4>
                    <p class="feature-text">Tersedia kemasan cantik untuk hadiah di hari yang sama</p>
                </div>
            </div>

            <div class="col-md-3">
                <div class="feature-card">
                    <div class="feature-icon"><i class="fas fa-shipping-fast"></i></div>
                    <h4 class="feature-title">Same Day Delivery</h4>
                    <p class="feature-text">Pesanan diproses dan dikirim di hari yang sama</p>
                </div>
            </div>

            <div class="col-md-3">
                <div class="feature-card">
                    <div class="feature-icon"><i class="fas fa-headset"></i></div>
                    <h4 class="feature-title">Customer Support</h4>
                    <p class="feature-text">Tim CS siap membantu selama jam operasional</p>
                </div>
            </div>

        </div>
    </div>
</section>

<!-- TRUST -->
<section class="trust-section">
    <div class="container">
        <div class="row g-4">
            <div class="col-md-4">
                <div class="trust-number">100+</div>
                <div class="trust-label">Pesanan per Hari</div>
            </div>
            <div class="col-md-4">
                <div class="trust-number">Fresh</div>
                <div class="trust-label">Diproduksi Setiap Hari</div>
            </div>
            <div class="col-md-4">
                <div class="trust-number">Fast</div>
                <div class="trust-label">Pengiriman 1–2 Jam</div>
            </div>
        </div>
    </div>
</section>

<!-- FAQ -->
<section class="faq-section">
    <div class="container">
        <div class="faq-item" onclick="this.querySelector('.faq-answer').classList.toggle('d-block')">
            <h5>Apakah produk selalu tersedia hari ini?</h5>
            <div class="faq-answer">
                Ya, semua produk dibuat fresh setiap hari dan siap dibeli langsung.
            </div>
        </div>

        <div class="faq-item" onclick="this.querySelector('.faq-answer').classList.toggle('d-block')">
            <h5>Berapa lama estimasi pengiriman?</h5>
            <div class="faq-answer">
                Estimasi pengiriman 1–2 jam tergantung jarak lokasi.
            </div>
        </div>
    </div>
</section>

<!-- CONTACT -->
<section class="contact-cta-section">
    <div class="container">
        <h2>Butuh Bantuan?</h2>
        <p>Hubungi kami dan pesanan akan diproses hari ini</p>

        <a href="https://wa.me/6285117149372" target="_blank" class="text-decoration-none">
            <div class="contact-card mt-4">
                <i class="fab fa-whatsapp fa-2x mb-3"></i>
                <p>+62 851-1714-9372</p>
            </div>
        </a>
    </div>
</section>

@endsection
