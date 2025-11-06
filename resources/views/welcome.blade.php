<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>MilkeyBakery — Freshly Baked Happiness</title>
    <link rel="icon" href="{{ asset('images/logo.png') }}" type="images/png">
    
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    
    <!-- Custom CSS -->
    <link rel="stylesheet" href="{{ asset('css/custom.css') }}">
</head>
<body>
    <!-- HEADER -->
    <header class="py-3 fixed-top">
        <div class="container">
            <div class="d-flex justify-content-between align-items-center">
                <div class="navbar-logo">
                    <img src="{{ asset('images/logopanjang.png') }}" alt="MilkeyBakery Logo" class="logo-img">
                </div>
                <nav class="d-none d-md-flex gap-4 align-items-center">
                    <a href="#menu" class="nav-link">Menu</a>
                    <a href="#offers" class="nav-link">Offers</a>
                    <a href="#about" class="nav-link">About</a>
                    <a href="#contact" class="nav-link">Contact</a>
                    <button id="cartBtn" class="btn btn-cart position-relative">
                        Cart <span id="cartCount" class="badge">0</span>
                    </button>
                    @auth
                        <span class="text-muted">Hi, {{ Auth::user()->name }}</span>
                        <form action="{{ route('logout') }}" method="POST" class="d-inline">
                            @csrf
                            <button type="submit" class="btn btn-outline-secondary btn-sm">Logout</button>
                        </form>
                    @else
                        <a href="{{ route('login') }}" class="btn btn-outline-secondary btn-sm">Login</a>
                        <a href="{{ route('register') }}" class="btn btn-pink btn-sm">Register</a>
                    @endauth
                </nav>
                <button class="btn d-md-none" id="mobileToggle" type="button" data-bs-toggle="offcanvas" data-bs-target="#mobileMenu">
                    ☰
                </button>
            </div>
        </div>
    </header>

    <!-- Mobile Offcanvas Menu -->
    <div class="offcanvas offcanvas-end" tabindex="-1" id="mobileMenu">
        <div class="offcanvas-header">
            <h5 class="offcanvas-title">Menu</h5>
            <button type="button" class="btn-close" data-bs-dismiss="offcanvas"></button>
        </div>
        <div class="offcanvas-body">
            <nav class="d-flex flex-column gap-3">
                <a href="#menu" class="nav-link">Menu</a>
                <a href="#offers" class="nav-link">Offers</a>
                <a href="#about" class="nav-link">About</a>
                <a href="#contact" class="nav-link">Contact</a>
                <button id="cartBtn" class="btn btn-cart position-relative">
                        Cart <span id="cartCount" class="badge">0</span>
                    </button>
                    @auth
                        <span class="text-muted">Hi, {{ Auth::user()->name }}</span>
                        <form action="{{ route('logout') }}" method="POST" class="d-inline">
                            @csrf
                            <button type="submit" class="btn btn-outline-secondary btn-sm">Logout</button>
                        </form>
                    @else
                        <a href="{{ route('login') }}" class="btn btn-outline-secondary btn-sm">Login</a>
                        <a href="{{ route('register') }}" class="btn btn-pink btn-sm">Register</a>
                    @endauth
            </nav>
        </div>
    </div>

    <!-- HERO SECTION -->
    <section class="hero-section py-5">
        <div class="container">
            <div class="row align-items-center g-4">
                <div class="col-md-6">
                    <h2 class="display-4 fw-bold lh-sm">Freshly Baked <span class="text-pink">Happiness</span></h2>
                    <p class="mt-3 text-muted">MilkeyBakery menyajikan roti dan pastry lezat dengan sentuhan aesthetic—cocok buat hangout, foto, dan ngilangin kerinduan ngemil.</p>
                    <div class="mt-4 d-flex gap-3">
                        <a href="#menu" class="btn btn-primary-custom">Order Now</a>
                        <a href="#offers" class="btn btn-outline-secondary">Lihat Promo</a>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="hero-card p-4">
                        <div class="hero-image-placeholder">
                            <img src="{{ asset('images/stroberi.png') }}" alt="Cake" height="300">
                        </div>
                        <p class="mt-5 small text-muted mb-0">Kue Ghibli biru pastel dengan bunga pink dan karakter lucu yang super menggemaskan.</p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- MENU SECTION -->
    <section id="menu" class="py-5">
        <div class="container">
            <div class="d-flex justify-content-between align-items-center mb-4">
                <h3 class="fs-2 fw-semibold mb-0">Our Menu</h3>
                <p class="mb-0 small text-muted d-none d-md-block">Pilihan roti, kue & pastry — klik untuk tambah ke cart</p>
            </div>
            <div class="row g-4" id="productGrid">
                <!-- Products will be inserted here by JavaScript -->
            </div>
        </div>
    </section>

    <!-- OFFERS SECTION -->
    <section id="offers" class="py-5">
        <div class="container">
            <h3 class="fs-2 fw-semibold mb-4">Special Offers</h3>
            <div class="row g-4">
                <div class="col-md-6">
                    <div class="soft-card p-4">
                        <h4 class="fw-semibold">Bundle Hemat: Milk Loaf + 2 Croissant</h4>
                        <p class="small text-muted mt-2 mb-0">Diskon 20% setiap Jumat — paket cocok untuk ngumpul.</p>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="soft-card p-4">
                        <h4 class="fw-semibold">Promo Pelajar</h4>
                        <p class="small text-muted mt-2 mb-0">Tunjukkan kartu pelajar, dapatkan minuman 50% off.</p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- TESTIMONIALS SECTION -->
    <section class="py-5">
        <div class="container">
            <h3 class="fs-2 fw-semibold mb-4">Testimonials</h3>
            <div class="card testimonial-card">
                <div class="card-body text-center p-4">
                    <p id="testText" class="fst-italic text-muted mb-3">"Roti enak dan vibesnya aesthetic banget!"</p>
                    <p class="fw-medium mb-0">— Nisa, 21</p>
                    <div class="mt-4 d-flex justify-content-center gap-3">
                        <button id="prevTest" class="btn btn-sm btn-outline-secondary rounded-pill">‹</button>
                        <button id="nextTest" class="btn btn-sm btn-outline-secondary rounded-pill">›</button>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- ABOUT SECTION -->
    <section id="about" class="py-5">
        <div class="container">
            <h3 class="fs-2 fw-semibold mb-4">About Us</h3>
            <div class="row g-4 align-items-center">
                <div class="col-md-6">
                    <p>MilkeyBakery didirikan dari kecintaan pada roti lembut dan suasana cozy. Kami percaya roti bisa membuat hari lebih manis—dan foto lebih aesthetic.</p>
                    <ul class="list-unstyled mt-4 small text-muted">
                        <li>• Bahan berkualitas</li>
                        <li>• Resep homemade</li>
                        <li>• Packaging ramah lingkungan</li>
                    </ul>
                </div>
                <div class="col-md-6">
                    <div class="soft-card p-3">
                        <div class="about-image-placeholder">
                            <span>[Foto Cozy Bakery]</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- CONTACT SECTION -->
    <section id="contact" class="py-5">
        <div class="container">
            <h3 class="fs-2 fw-semibold mb-4">Contact & Location</h3>
            <div class="row g-4">
                <div class="col-md-6">
                    <div class="soft-card p-4">
                        <p class="small mb-4">Alamat: Jl. Contoh No.1 — Kota</p>
                        <div class="d-flex gap-3">
                            <a href="https://wa.me/628123456789" target="_blank" class="btn btn-pink">WhatsApp</a>
                            <a href="https://instagram.com/yourbakery" target="_blank" class="btn btn-outline-secondary">Instagram</a>
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="soft-card p-3">
                        <div class="map-placeholder">
                            <span>[Map]</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- CART MODAL -->
    <div class="modal fade" id="cartModal" tabindex="-1">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Your Cart</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                </div>
                <div class="modal-body">
                    <div id="cartItems">
                        <p class="small text-muted">Belum ada item.</p>
                    </div>
                </div>
                <div class="modal-footer justify-content-between">
                    <div class="fw-semibold">Total: <span id="cartTotal">Rp 0</span></div>
                    <button id="checkout" class="btn btn-blue">Checkout</button>
                </div>
            </div>
        </div>
    </div>

    <!-- FOOTER -->
    <footer class="text-center py-4">
        <p class="small text-muted mb-0">© MilkeyBakery • Made with pastel vibes</p>
    </footer>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
    
    <!-- Custom JS -->
    <script src="{{ asset('js/custom.js') }}"></script>
</body>
</html>