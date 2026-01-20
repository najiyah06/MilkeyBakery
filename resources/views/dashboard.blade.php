@extends('layouts.navigation')

@section('title', 'Dashboard - MilkeyBakery')

@push('styles')
<style>
    .dashboard-header {
        background: linear-gradient(135deg, #8B6F47 0%, #C9A57B 100%);
        padding: 40px 0;
        margin-top: 56px;
        color: white;
    }

    .welcome-card {
        background: white;
        border-radius: 20px;
        padding: 30px;
        box-shadow: 0 5px 20px rgba(0,0,0,0.1);
        margin-bottom: 30px;
    }

    .welcome-card h2 {
        color: #8B6F47;
        font-size: 2rem;
        font-weight: 700;
        margin-bottom: 10px;
    }

    .welcome-card p {
        color: #666;
        font-size: 1.1rem;
    }

    /* Stats Cards */
    .stats-card {
        background: linear-gradient(135deg, #FFF8F0 0%, #F5E6D3 100%);
        border-radius: 20px;
        padding: 30px;
        margin-bottom: 30px;
        border: 2px solid #E8D5C4;
        transition: all 0.3s ease;
        height: 100%;
    }

    .stats-card:hover {
        transform: translateY(-5px);
        box-shadow: 0 10px 30px rgba(139, 111, 71, 0.2);
        border-color: #C9A57B;
    }

    .stats-icon {
        width: 70px;
        height: 70px;
        background: linear-gradient(135deg, #C9A57B 0%, #A0826D 100%);
        border-radius: 50%;
        display: flex;
        align-items: center;
        justify-content: center;
        margin-bottom: 20px;
    }

    .stats-icon i {
        font-size: 2rem;
        color: white;
    }

    .stats-number {
        font-size: 2.5rem;
        font-weight: 700;
        color: #8B6F47;
        margin-bottom: 5px;
    }

    .stats-label {
        color: #666;
        font-size: 1rem;
    }

    /* Quick Actions */
    .quick-actions {
        background: white;
        border-radius: 20px;
        padding: 30px;
        margin-bottom: 30px;
        box-shadow: 0 5px 20px rgba(0,0,0,0.1);
    }

    .quick-actions h3 {
        color: #8B6F47;
        font-size: 1.5rem;
        font-weight: 700;
        margin-bottom: 25px;
    }

    .action-btn {
        display: block;
        width: 100%;
        padding: 20px;
        margin-bottom: 15px;
        background: linear-gradient(135deg, #FFF8F0 0%, #F5E6D3 100%);
        border: 2px solid #E8D5C4;
        border-radius: 15px;
        text-decoration: none;
        color: #8B6F47;
        transition: all 0.3s ease;
        text-align: left;
    }

    .action-btn:hover {
        background: linear-gradient(135deg, #C9A57B 0%, #A0826D 100%);
        color: white;
        transform: translateX(10px);
        border-color: #C9A57B;
    }

    .action-btn i {
        margin-right: 15px;
        font-size: 1.5rem;
    }

    .action-btn span {
        font-size: 1.1rem;
        font-weight: 600;
    }

    /* Recent Orders */
    .recent-orders {
        background: white;
        border-radius: 20px;
        padding: 30px;
        margin-bottom: 30px;
        box-shadow: 0 5px 20px rgba(0,0,0,0.1);
    }

    .recent-orders h3 {
        color: #8B6F47;
        font-size: 1.5rem;
        font-weight: 700;
        margin-bottom: 25px;
    }

    .order-item {
        background: linear-gradient(135deg, #FFF8F0 0%, #F5E6D3 100%);
        border-radius: 15px;
        padding: 20px;
        margin-bottom: 15px;
        border: 2px solid #E8D5C4;
        transition: all 0.3s ease;
    }

    .order-item:hover {
        border-color: #C9A57B;
        transform: translateY(-3px);
        box-shadow: 0 5px 15px rgba(139, 111, 71, 0.15);
    }

    .order-header {
        display: flex;
        justify-content: space-between;
        align-items: center;
        margin-bottom: 10px;
    }

    .order-id {
        font-weight: 700;
        color: #8B6F47;
        font-size: 1.1rem;
    }

    .order-status {
        padding: 5px 15px;
        border-radius: 20px;
        font-size: 0.85rem;
        font-weight: 600;
    }

    .status-pending {
        background: #FFF3CD;
        color: #856404;
    }

    .status-processing {
        background: #D1ECF1;
        color: #0C5460;
    }

    .status-completed {
        background: #D4EDDA;
        color: #155724;
    }

    .order-details {
        color: #666;
        font-size: 0.95rem;
        margin-bottom: 10px;
    }

    .order-price {
        font-size: 1.25rem;
        font-weight: 700;
        color: #C9A57B;
    }

    .empty-state {
        text-align: center;
        padding: 40px;
        color: #999;
    }

    .empty-state i {
        font-size: 4rem;
        margin-bottom: 20px;
        color: #DDD;
    }

    /* Profile Card */
    .profile-card {
        background: white;
        border-radius: 20px;
        padding: 30px;
        margin-bottom: 30px;
        box-shadow: 0 5px 20px rgba(0,0,0,0.1);
        text-align: center;
    }

    .profile-avatar {
        width: 120px;
        height: 120px;
        border-radius: 50%;
        background: linear-gradient(135deg, #C9A57B 0%, #A0826D 100%);
        display: flex;
        align-items: center;
        justify-content: center;
        margin: 0 auto 20px;
        border: 5px solid #F5E6D3;
    }

    .profile-avatar i {
        font-size: 3rem;
        color: white;
    }

    .profile-name {
        font-size: 1.5rem;
        font-weight: 700;
        color: #8B6F47;
        margin-bottom: 5px;
    }

    .profile-email {
        color: #666;
        margin-bottom: 20px;
    }

    .btn-edit-profile {
        background: linear-gradient(135deg, #C9A57B 0%, #A0826D 100%);
        color: white;
        border: none;
        padding: 10px 30px;
        border-radius: 25px;
        font-weight: 600;
        transition: all 0.3s ease;
    }

    .btn-edit-profile:hover {
        transform: scale(1.05);
        box-shadow: 0 5px 15px rgba(201, 165, 123, 0.4);
        color: white;
    }

    @media (max-width: 768px) {
        .stats-number {
            font-size: 2rem;
        }

        .action-btn {
            padding: 15px;
        }

        .action-btn span {
            font-size: 1rem;
        }
    }
</style>
@endpush

@section('content')
    <!-- Dashboard Header -->
    <section class="dashboard-header">
        <div class="container">
            <h1 class="mb-0">Dashboard</h1>
        </div>
    </section>

    <!-- Dashboard Content -->
    <section class="py-5" style="background: #FFF8F0;">
        <div class="container">
            <!-- Welcome Card -->
            <div class="welcome-card">
                <h2>Selamat Datang, {{ Auth::user()->name }}! 👋</h2>
                <p>Kelola pesanan dan profil Anda dengan mudah</p>
            </div>

            <div class="row">
                <!-- Left Column -->
                <div class="col-lg-8">
                    <!-- Stats Cards -->
                    <div class="row">
                        <div class="col-md-4">
                            <div class="stats-card">
                                <div class="stats-icon">
                                    <i class="fas fa-shopping-bag"></i>
                                </div>
                                <div class="stats-number">12</div>
                                <div class="stats-label">Total Pesanan</div>
                            </div>
                        </div>

                        <div class="col-md-4">
                            <div class="stats-card">
                                <div class="stats-icon">
                                    <i class="fas fa-clock"></i>
                                </div>
                                <div class="stats-number">3</div>
                                <div class="stats-label">Sedang Diproses</div>
                            </div>
                        </div>

                        <div class="col-md-4">
                            <div class="stats-card">
                                <div class="stats-icon">
                                    <i class="fas fa-star"></i>
                                </div>
                                <div class="stats-number">150</div>
                                <div class="stats-label">Poin Reward</div>
                            </div>
                        </div>
                    </div>

                    <!-- Recent Orders -->
                    <div class="recent-orders">
                        <h3><i class="fas fa-history me-2"></i>Pesanan Terbaru</h3>
                        
                        <!-- Order Item 1 -->
                        <div class="order-item">
                            <div class="order-header">
                                <span class="order-id">#MB2024001</span>
                                <span class="order-status status-processing">Diproses</span>
                            </div>
                            <div class="order-details">
                                <i class="fas fa-calendar me-2"></i>7 Januari 2025
                            </div>
                            <div class="order-details">
                                <i class="fas fa-box me-2"></i>Chocolate Cake, Croissant (2 items)
                            </div>
                            <div class="order-price">Rp 275,000</div>
                        </div>

                        <!-- Order Item 2 -->
                        <div class="order-item">
                            <div class="order-header">
                                <span class="order-id">#MB2024002</span>
                                <span class="order-status status-completed">Selesai</span>
                            </div>
                            <div class="order-details">
                                <i class="fas fa-calendar me-2"></i>5 Januari 2025
                            </div>
                            <div class="order-details">
                                <i class="fas fa-box me-2"></i>Cappuccino, Sandwich (3 items)
                            </div>
                            <div class="order-price">Rp 125,000</div>
                        </div>

                        <!-- Order Item 3 -->
                        <div class="order-item">
                            <div class="order-header">
                                <span class="order-id">#MB2024003</span>
                                <span class="order-status status-pending">Menunggu</span>
                            </div>
                            <div class="order-details">
                                <i class="fas fa-calendar me-2"></i>3 Januari 2025
                            </div>
                            <div class="order-details">
                                <i class="fas fa-box me-2"></i>Red Velvet Cake (1 item)
                            </div>
                            <div class="order-price">Rp 280,000</div>
                        </div>

                        <!-- Empty State (uncomment if no orders) -->
                        <!-- <div class="empty-state">
                            <i class="fas fa-shopping-bag"></i>
                            <h4>Belum Ada Pesanan</h4>
                            <p>Mulai belanja sekarang dan nikmati produk segar kami!</p>
                            <a href="{{ url('/') }}#products" class="btn btn-edit-profile mt-3">Mulai Belanja</a>
                        </div> -->
                        
                        <div class="text-center mt-3">
                            <a href="#" class="btn btn-edit-profile">Lihat Semua Pesanan</a>
                        </div>
                    </div>
                </div>

                <!-- Right Column -->
                <div class="col-lg-4">
                    <!-- Profile Card -->
                    <div class="profile-card">
                        <div class="profile-avatar">
                            <i class="fas fa-user"></i>
                        </div>
                        <h4 class="profile-name">{{ Auth::user()->name }}</h4>
                        <p class="profile-email">{{ Auth::user()->email }}</p>
                        <a href="#" class="btn btn-edit-profile">
                            <i class="fas fa-edit me-2"></i>Edit Profil
                        </a>
                    </div>

                    <!-- Quick Actions -->
                    <div class="quick-actions">
                        <h3><i class="fas fa-bolt me-2"></i>Aksi Cepat</h3>
                        
                        <a href="{{ url('/') }}#products" class="action-btn">
                            <i class="fas fa-shopping-cart"></i>
                            <span>Belanja Sekarang</span>
                        </a>

                        <a href="#" class="action-btn">
                            <i class="fas fa-history"></i>
                            <span>Riwayat Pesanan</span>
                        </a>

                        <a href="#" class="action-btn">
                            <i class="fas fa-heart"></i>
                            <span>Produk Favorit</span>
                        </a>

                        <a href="#" class="action-btn">
                            <i class="fas fa-map-marker-alt"></i>
                            <span>Alamat Pengiriman</span>
                        </a>

                        <a href="{{ url('/customer-service') }}" class="action-btn">
                            <i class="fas fa-headset"></i>
                            <span>Customer Service</span>
                        </a>

                        <form method="POST" action="{{ route('logout') }}">
                            @csrf
                            <button type="submit" class="action-btn" style="border: none; cursor: pointer;">
                                <i class="fas fa-sign-out-alt"></i>
                                <span>Logout</span>
                            </button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection