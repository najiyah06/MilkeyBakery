@extends('layouts.navigation')

@section('title', 'Pengiriman - MilkeyBakery')

@push('styles')
<style>
    .page-header {
        background: linear-gradient(rgba(139,111,71,.85), rgba(121,85,61,.85)),
        url('https://images.unsplash.com/photo-1591768793355-74d04bb6608f?w=1600') center/cover;
        padding: 120px 0 80px;
        color: white;
        margin-top: 56px;
        text-align: center;
    }

    .info-bar {
        background: #FFF8F0;
        padding: 35px 0;
    }

    .info-item {
        text-align: center;
        color: #8B6F47;
        font-weight: 600;
    }

    .info-item i {
        display: block;
        font-size: 1.8rem;
        margin-bottom: 8px;
        color: #C9A57B;
    }

    .hero-delivery-section {
        padding: 80px 0;
        background: white;
    }

    .hero-delivery-content h2 {
        color: #8B6F47;
        font-size: 2.5rem;
        font-weight: 700;
    }

    .hero-delivery-content p {
        color: #666;
        font-size: 1.1rem;
        line-height: 1.8;
        margin: 25px 0;
    }

    .btn-contact-delivery {
        background: linear-gradient(135deg, #C9A57B, #A0826D);
        color: white;
        padding: 12px 35px;
        border-radius: 25px;
        text-decoration: none;
        font-weight: 600;
        transition: .3s;
        display: inline-block;
    }

    .btn-contact-delivery:hover {
        transform: scale(1.05);
        box-shadow: 0 5px 15px rgba(201,165,123,.4);
        color: white;
    }

    .delivery-service-section {
        padding: 80px 0;
        background: #FFF8F0;
    }

    .section-title-delivery {
        color: #8B6F47;
        font-size: 2.5rem;
        font-weight: 700;
        margin-bottom: 10px;
        text-align: center;
    }

    .section-subtitle {
        color: #666;
        margin-bottom: 50px;
        text-align: center;
    }

    .delivery-area-list {
        background: white;
        border-radius: 20px;
        padding: 40px;
        box-shadow: 0 10px 30px rgba(139,111,71,.1);
    }

    .delivery-area-item {
        display: flex;
        justify-content: space-between;
        padding: 18px 0;
        border-bottom: 2px solid #F5E6D3;
    }

    .delivery-area-item:last-child {
        border-bottom: none;
    }

    .delivery-area-name {
        font-weight: 600;
        color: #8B6F47;
    }

    .delivery-area-price {
        font-weight: 700;
        color: #C9A57B;
    }
</style>
@endpush

@section('content')

<!-- HEADER -->
<section class="page-header">
    <div class="container">
        <h1 class="fw-bold">Shipping & Delivery</h1>
        <p>Pengiriman cepat & aman di hari yang sama</p>
    </div>
</section>

<!-- INFO BAR -->
<section class="info-bar">
    <div class="container">
        <div class="row">
            <div class="col-md-4 info-item">
                <i class="fas fa-clock"></i>
                Buka Setiap Hari<br>08.00 – 21.00
            </div>
            <div class="col-md-4 info-item">
                <i class="fas fa-shipping-fast"></i>
                Same Day Delivery
            </div>
            <div class="col-md-4 info-item">
                <i class="fas fa-map-marker-alt"></i>
                Area Surabaya
            </div>
        </div>
    </div>
</section>

<!-- HERO -->
<section class="hero-delivery-section">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-lg-6">
                <div class="hero-delivery-content">
                    <h2>Pengiriman Hari Ini</h2>
                        <p>
                            Setiap pesanan MilkeyBakery akan langsung kami proses dan kirim
                            di hari yang sama setelah pesanan dikonfirmasi. Kami menggunakan
                            layanan kurir internal MilkeyBakery yang berpengalaman serta
                            kurir pihak ketiga terpercaya untuk memastikan produk sampai
                            dengan aman, rapi, dan tetap dalam kondisi terbaik.
                            <br><br>
                            Layanan pengiriman ini khusus melayani area Surabaya dan sekitarnya,
                            dengan estimasi waktu pengantaran yang cepat menyesuaikan jarak
                            lokasi tujuan. Cocok untuk kebutuhan mendadak, hadiah, maupun
                            konsumsi harian tanpa perlu menunggu hari berikutnya.
                        </p>
                    <a href="https://wa.me/6285117149372" target="_blank" class="btn-contact-delivery">
                        <i class="fab fa-whatsapp me-2"></i>Hubungi Kami
                    </a>
                </div>
            </div>
            <div class="col-lg-6">
                <img src="https://images.unsplash.com/photo-1566576721346-d4a3b4eaeb55?w=800" class="img-fluid rounded-4 shadow">
            </div>
        </div>
    </div>
</section>

<!-- AREA PENGIRIMAN -->
<section class="delivery-service-section">
    <div class="container">
        <h2 class="section-title-delivery">Area Pengiriman Surabaya</h2>
        <p class="section-subtitle">Pengiriman aktif setiap hari (Same Day)</p>

        <div class="row justify-content-center">
            <div class="col-lg-6">
                <div class="delivery-area-list">

                    <div class="delivery-area-item"><span class="delivery-area-name">Tegalsari</span><span class="delivery-area-price">Rp 20.000</span></div>
                    <div class="delivery-area-item"><span class="delivery-area-name">Genteng</span><span class="delivery-area-price">Rp 20.000</span></div>
                    <div class="delivery-area-item"><span class="delivery-area-name">Gubeng</span><span class="delivery-area-price">Rp 20.000</span></div>
                    <div class="delivery-area-item"><span class="delivery-area-name">Wonokromo</span><span class="delivery-area-price">Rp 20.000</span></div>
                    <div class="delivery-area-item"><span class="delivery-area-name">Rungkut</span><span class="delivery-area-price">Rp 25.000</span></div>
                    <div class="delivery-area-item"><span class="delivery-area-name">Sukolilo</span><span class="delivery-area-price">Rp 25.000</span></div>
                    <div class="delivery-area-item"><span class="delivery-area-name">Mulyorejo</span><span class="delivery-area-price">Rp 25.000</span></div>
                    <div class="delivery-area-item"><span class="delivery-area-name">Kenjeran</span><span class="delivery-area-price">Rp 30.000</span></div>
                    <div class="delivery-area-item"><span class="delivery-area-name">Tambaksari</span><span class="delivery-area-price">Rp 20.000</span></div>
                    <div class="delivery-area-item"><span class="delivery-area-name">Sawahan</span><span class="delivery-area-price">Rp 20.000</span></div>
                    <div class="delivery-area-item"><span class="delivery-area-name">Tandes</span><span class="delivery-area-price">Rp 30.000</span></div>
                    <div class="delivery-area-item"><span class="delivery-area-name">Benowo</span><span class="delivery-area-price">Rp 35.000</span></div>
                    <div class="delivery-area-item"><span class="delivery-area-name">Lakarsantri</span><span class="delivery-area-price">Rp 35.000</span></div>
                    <div class="delivery-area-item"><span class="delivery-area-name">Dukuh Pakis</span><span class="delivery-area-price">Rp 30.000</span></div>
                    <div class="delivery-area-item"><span class="delivery-area-name">Wiyung</span><span class="delivery-area-price">Rp 30.000</span></div>
                    <div class="delivery-area-item"><span class="delivery-area-name">Gayungan</span><span class="delivery-area-price">Rp 25.000</span></div>
                    <div class="delivery-area-item"><span class="delivery-area-name">Jambangan</span><span class="delivery-area-price">Rp 25.000</span></div>

                </div>
            </div>
        </div>
    </div>
</section>

@endsection
