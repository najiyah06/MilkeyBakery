<!doctype html>
<html lang="id">
<head>
  <meta charset="utf-8"/>
  <meta name="viewport" content="width=device-width, initial-scale=1"/>
  <title>MilkeyBakery — Freshly Baked Happiness</title>
  <!-- Bootstrap CSS -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"/>
  <!-- Custom CSS -->
  <link href="{{ asset('css/custom.css') }}" rel="stylesheet"/>
</head>
<body class="bg-cream text-brown">

  <!-- Header -->
  <header class="container py-3 d-flex justify-content-between align-items-center">
    <div class="d-flex align-items-center gap-2">
      <div class="rounded-circle bg-pink d-flex align-items-center justify-content-center shadow" style="width:48px;height:48px;">
        🥐
      </div>
      <div>
        <h1 class="h5 fw-bold mb-0">Milkey<span class="text-blue">Bakery</span></h1>
        <small class="text-muted">Freshly Baked Happiness</small>
      </div>
    </div>
    <nav class="d-none d-md-flex gap-3">
      <a href="#menu" class="nav-link">Menu</a>
      <a href="#offers" class="nav-link">Offers</a>
      <a href="#about" class="nav-link">About</a>
      <a href="#contact" class="nav-link">Contact</a>
      <button id="cartBtn" class="btn btn-blue position-relative">
        Cart
        <span id="cartCount" class="position-absolute top-0 start-100 translate-middle badge rounded-pill bg-pink">0</span>
      </button>
    </nav>
  </header>

  <!-- Hero -->
  <section class="container py-5 row align-items-center">
    <div class="col-md-6">
      <h2 class="display-5 fw-bold">Freshly Baked <span class="text-pink">Happiness</span></h2>
      <p class="mt-3">MilkeyBakery menyajikan roti dan pastry lezat dengan sentuhan aesthetic.</p>
      <div class="d-flex gap-2 mt-4">
        <a href="#menu" class="btn btn-yellow">Order Now</a>
        <a href="#offers" class="btn btn-outline-secondary">Lihat Promo</a>
      </div>
    </div>
    <div class="col-md-6 text-center">
      <div class="p-4 rounded-4 bg-pink text-white">[Foto Roti & Pastry]</div>
    </div>
  </section>

  <!-- Menu -->
  <section id="menu" class="container py-5">
    <h3 class="mb-4">Our Menu</h3>
    <div id="menuGrid" class="row g-4"></div>
  </section>

  <!-- Offers -->
  <section id="offers" class="container py-5">
    <h3 class="mb-4">Special Offers</h3>
    <div class="row g-4">
      <div class="col-md-6 p-4 rounded-4 bg-light">Bundle Hemat: Milk Loaf + 2 Croissant</div>
      <div class="col-md-6 p-4 rounded-4 bg-light">Promo Pelajar: Diskon minuman 50%</div>
    </div>
  </section>

  <!-- Testimonials -->
  <section class="container py-5 text-center">
    <h3 class="mb-4">Testimonials</h3>
    <blockquote id="testText" class="blockquote">"Roti enak dan vibesnya aesthetic banget!"</blockquote>
    <div class="mt-3">
      <button id="prevTest" class="btn btn-outline-secondary">‹</button>
      <button id="nextTest" class="btn btn-outline-secondary">›</button>
    </div>
  </section>

  <!-- About -->
  <section id="about" class="container py-5 row align-items-center">
    <div class="col-md-6">
      <p>MilkeyBakery didirikan dari kecintaan pada roti lembut dan suasana cozy...</p>
    </div>
    <div class="col-md-6 bg-light rounded-4 p-5">[Foto Cozy Bakery]</div>
  </section>

  <!-- Contact -->
  <section id="contact" class="container py-5 row">
    <div class="col-md-6">
      <p>Alamat: Jl. Contoh No.1</p>
      <a href="https://wa.me/628123456789" target="_blank" class="btn btn-pink">WhatsApp</a>
      <a href="https://instagram.com/yourbakery" target="_blank" class="btn btn-outline-secondary">Instagram</a>
    </div>
    <div class="col-md-6 bg-light rounded-4 p-5">[Map]</div>
  </section>

  <!-- Cart Modal -->
  <div class="modal fade" id="cartModal" tabindex="-1">
    <div class="modal-dialog modal-dialog-centered">
      <div class="modal-content p-3">
        <div class="modal-header">
          <h5 class="modal-title">Your Cart</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
        </div>
        <div id="cartItems" class="modal-body text-muted">Belum ada item.</div>
        <div class="modal-footer d-flex justify-content-between">
          <span class="fw-bold">Total: <span id="cartTotal">Rp 0</span></span>
          <button id="checkout" class="btn btn-blue">Checkout</button>
        </div>
      </div>
    </div>
  </div>

  <footer class="text-center py-4 small text-muted">© MilkeyBakery • Made with pastel vibes</footer>

  <!-- Bootstrap JS -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
  <!-- Custom JS -->
  <script src="{{ asset('js/custom.js') }}"></script>
</body>
</html>