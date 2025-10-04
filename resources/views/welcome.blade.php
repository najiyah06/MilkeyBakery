<!doctype html>
<html lang="id">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>MilkeyBakery — Freshly Baked Happiness</title>
  <!-- Bootstrap CSS -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <!-- Custom CSS -->
  <link rel="stylesheet" href="style.css">
</head>
<body class="bg-cream text-brown">

  <!-- NAVBAR -->
  <nav class="navbar navbar-expand-lg bg-cream shadow-sm">
    <div class="container">
      <a class="navbar-brand d-flex align-items-center gap-2" href="#">
        <div class="logo-icon d-flex align-items-center justify-content-center rounded-circle">
          🥐
        </div>
        <span class="fw-bold">Milkey<span class="text-blue">Bakery</span></span>
      </a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navmenu">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navmenu">
        <ul class="navbar-nav ms-auto mb-2 mb-lg-0 gap-3">
          <li class="nav-item"><a class="nav-link" href="#menu">Menu</a></li>
          <li class="nav-item"><a class="nav-link" href="#offers">Offers</a></li>
          <li class="nav-item"><a class="nav-link" href="#about">About</a></li>
          <li class="nav-item"><a class="nav-link" href="#contact">Contact</a></li>
        </ul>
        <button id="cartBtn" class="btn btn-blue ms-lg-3 position-relative">
          Cart <span id="cartCount" class="badge bg-pink rounded-pill ms-1">0</span>
        </button>
      </div>
    </div>
  </nav>

  <!-- HERO -->
  <section class="container py-5">
    <div class="row align-items-center">
      <div class="col-md-6">
        <h1 class="display-5 fw-bold">Freshly Baked <span class="text-pink">Happiness</span></h1>
        <p class="lead mt-3">MilkeyBakery menyajikan roti dan pastry lezat dengan sentuhan aesthetic—cocok buat hangout dan foto.</p>
        <div class="mt-4 d-flex gap-2">
          <a href="#menu" class="btn btn-yellow">Order Now</a>
          <a href="#offers" class="btn btn-outline-secondary">Lihat Promo</a>
        </div>
      </div>
      <div class="col-md-6 text-center">
        <div class="hero-box">[Foto Roti & Pastry]</div>
      </div>
    </div>
  </section>

  <!-- MENU -->
  <section id="menu" class="container py-5">
    <div class="d-flex justify-content-between align-items-center mb-4">
      <h2 class="fw-semibold">Our Menu</h2>
      <p class="text-muted small">Klik untuk tambah ke cart</p>
    </div>
    <div class="row g-4" id="productGrid">
      <!-- produk dari JS -->
    </div>
  </section>

  <!-- OFFERS -->
  <section id="offers" class="container py-5">
    <h2 class="fw-semibold mb-4">Special Offers</h2>
    <div class="row g-3">
      <div class="col-md-6">
        <div class="soft-card p-4 rounded">
          <h5 class="fw-semibold">Bundle Hemat: Milk Loaf + 2 Croissant</h5>
          <p class="small text-muted">Diskon 20% setiap Jumat.</p>
        </div>
      </div>
      <div class="col-md-6">
        <div class="soft-card p-4 rounded">
          <h5 class="fw-semibold">Promo Pelajar</h5>
          <p class="small text-muted">Tunjukkan kartu pelajar, minuman 50% off.</p>
        </div>
      </div>
    </div>
  </section>

  <!-- TESTIMONIAL -->
  <section class="container py-5">
    <h2 class="fw-semibold mb-4">Testimonials</h2>
    <div class="soft-card p-4 rounded text-center">
      <blockquote id="testText" class="fst-italic">"Roti enak dan vibesnya aesthetic banget!"</blockquote>
      <footer class="mt-3">— Nisa, 21</footer>
      <div class="mt-3 d-flex justify-content-center gap-2">
        <button id="prevTest" class="btn btn-outline-secondary btn-sm">‹</button>
        <button id="nextTest" class="btn btn-outline-secondary btn-sm">›</button>
      </div>
    </div>
  </section>

  <!-- ABOUT -->
  <section id="about" class="container py-5">
    <h2 class="fw-semibold mb-4">About Us</h2>
    <div class="row align-items-center g-4">
      <div class="col-md-6">
        <p>MilkeyBakery lahir dari cinta pada roti lembut & suasana cozy.</p>
        <ul class="text-muted small">
          <li>Bahan berkualitas</li>
          <li>Resep homemade</li>
          <li>Packaging ramah lingkungan</li>
        </ul>
      </div>
      <div class="col-md-6 text-center">
        <div class="hero-box">[Foto Cozy Bakery]</div>
      </div>
    </div>
  </section>

  <!-- CONTACT -->
  <section id="contact" class="container py-5">
    <h2 class="fw-semibold mb-4">Contact & Location</h2>
    <div class="row g-3">
      <div class="col-md-6">
        <div class="soft-card p-4 rounded">
          <p>Alamat: Jl. Contoh No.1, Kota</p>
          <div class="mt-3 d-flex gap-2">
            <a href="https://wa.me/628123456789" target="_blank" class="btn btn-pink">WhatsApp</a>
            <a href="https://instagram.com/yourbakery" target="_blank" class="btn btn-outline-secondary">Instagram</a>
          </div>
        </div>
      </div>
      <div class="col-md-6">
        <div class="hero-box">[Map]</div>
      </div>
    </div>
  </section>

  <!-- FOOTER -->
  <footer class="text-center py-4 small text-muted">
    © MilkeyBakery • Made with pastel vibes
  </footer>

  <!-- CART MODAL -->
  <div class="modal fade" id="cartModal" tabindex="-1">
    <div class="modal-dialog modal-dialog-centered">
      <div class="modal-content p-3">
        <div class="d-flex justify-content-between align-items-center">
          <h5>Your Cart</h5>
          <button class="btn-close" data-bs-dismiss="modal"></button>
        </div>
        <div id="cartItems" class="mt-3 small text-muted">Belum ada item.</div>
        <div class="d-flex justify-content-between mt-3">
          <strong>Total: <span id="cartTotal">Rp 0</span></strong>
          <button id="checkout" class="btn btn-blue">Checkout</button>
        </div>
      </div>
    </div>
  </div>

  <!-- JS -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
  <script src="script.js"></script>
</body>
</html>