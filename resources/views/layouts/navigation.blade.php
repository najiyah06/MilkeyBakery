<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'MilkeyBakery')</title>

    <link rel="icon" href="{{ asset('images/logo.png') }}" type="image/png">

    <!-- Bootstrap & FontAwesome -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">

    <!-- Custom CSS -->
    <link rel="stylesheet" href="{{ asset('css/custom.css') }}">
    @stack('styles')
</head>
<body>

<!-- ================= NAVBAR ================= -->
<nav class="navbar navbar-expand-lg navbar-light fixed-top">
    <div class="container">
        <a class="navbar-brand" href="{{ url('/') }}">
            <span class="brand-name">MilkeyBakery</span>
        </a>

        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav ms-auto align-items-center">

                <!-- About -->
                <li class="nav-item">
                    <a class="nav-link {{ request()->is('about/*') ? 'active fw-semibold' : '' }}" 
                       href="{{ url('/about/about') }}">
                        About
                    </a>
                </li>

                <!-- MENU USER DINAMIS -->
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle {{ request()->is('menu/*') ? 'active fw-semibold' : '' }}" 
                       href="#" role="button" data-bs-toggle="dropdown">
                        Menu
                    </a>

                    <ul class="dropdown-menu">
                        @if(isset($categories) && $categories->count())
                            @foreach($categories as $category)
                                <li>
                                    <a class="dropdown-item {{ request()->is('menu/' . $category->slug) ? 'active fw-bold' : '' }}"
                                       href="{{ route('menu.category', $category->slug) }}">
                                        {{ $category->name }}
                                    </a>
                                </li>
                            @endforeach
                        @else
                            <li>
                                <span class="dropdown-item text-muted">
                                    No categories yet
                                </span>
                            </li>
                        @endif
                    </ul>
                </li>

                <!-- Search -->
                <form action="{{ route('menu.search') }}" method="GET" class="d-flex ms-3 align-items-center">

                    <div class="input-group">
                        <span class="input-group-text bg-white border-end-0 rounded-start-pill">
                            <i class="fas fa-search text-muted"></i>
                        </span>

                        <input 
                            type="text" 
                            name="q" 
                            class="form-control border-start-0 rounded-end-pill" 
                            placeholder="Search menu..."
                            value="{{ request('q') }}"
                            required
                        >
                    </div>

                </form>
                <!-- Contact -->
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle {{ request()->is('contact/*') ? 'active fw-semibold' : '' }}" 
                       href="#" role="button" data-bs-toggle="dropdown">
                        Contact
                    </a>
                    <ul class="dropdown-menu">
                        <li><a class="dropdown-item" href="{{ url('/contact/service') }}">Customer Service</a></li>
                        <li><a class="dropdown-item" href="{{ url('/contact/pengiriman') }}">Pengiriman</a></li>
                    </ul>
                </li>

                <!-- Cart -->
                <li class="nav-item ms-3">
                    <a class="nav-link {{ request()->is('cart') ? 'active fw-semibold' : '' }}" 
                    href="{{ url('/cart') }}">
                        <i class="fas fa-shopping-cart"></i>
                        Cart

                        @php
                            $cartCount = 0;

                            if(Auth::check()) {
                                $cartCount = \App\Models\Cart::where('user_id', Auth::id())->sum('qty');
                            }
                        @endphp

                        @if($cartCount > 0)
                            <span class="badge bg-danger">{{ $cartCount }}</span>
                        @endif
                    </a>
                </li>

                <!-- Profile / Auth -->
                @auth
                    <li class="nav-item dropdown ms-2">
                        <a class="nav-link dropdown-toggle d-flex align-items-center"
                           href="#"
                           role="button"
                           data-bs-toggle="dropdown">

                            <i class="fas fa-user-circle fs-5 me-1"></i>
                            {{ Auth::user()->name }}
                        </a>

                        <ul class="dropdown-menu dropdown-menu-end">
                            <li>
                                <a class="dropdown-item" href="{{ route('profile.edit') }}">
                                    <i class="fas fa-user me-2"></i> My Profile
                                </a>
                            </li>

                            <li><hr class="dropdown-divider"></li>

                            <li>
                                <form method="POST" action="{{ route('logout') }}">
                                    @csrf
                                    <button class="dropdown-item text-danger">
                                        <i class="fas fa-sign-out-alt me-2"></i>
                                        Logout
                                    </button>
                                </form>
                            </li>
                        </ul>
                    </li>
                @else
                    <li class="nav-item ms-3">
                        <a href="{{ route('login') }}" class="btn btn-outline-secondary btn-sm me-2">
                            Login
                        </a>
                        <a href="{{ route('register') }}" class="btn btn-pink btn-sm">
                            Register
                        </a>
                    </li>
                @endauth

            </ul>
        </div>
    </div>
</nav>
<!-- ================= END NAVBAR ================= -->

<!-- Main Content -->
<main style="padding-top: 90px;">
    @yield('content')
</main>

<!-- ================= FOOTER ================= -->
<footer class="footer py-4 mt-5">
    <div class="container text-center">
        <p class="mb-2">&copy; 2024 MilkeyBakery. All rights reserved.</p>

        <div class="social-links">
            <a href="https://www.facebook.com/profile.php?id=61586058788945" target="_blank">
                <i class="fab fa-facebook"></i>
            </a>
            <a href="https://www.instagram.com/milkeybakery/" target="_blank">
                <i class="fab fa-instagram"></i>
            </a>
            <a href="https://x.com/milkeybakery" target="_blank">
                <i class="fab fa-twitter"></i>
            </a>
        </div>
    </div>
</footer>
<!-- ================= END FOOTER ================= -->

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
<script src="{{ asset('js/custom.js') }}"></script>
@stack('scripts')

</body>
</html>