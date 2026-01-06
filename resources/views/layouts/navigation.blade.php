<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'MilkeyBakery')</title>
    <link rel="icon" href="{{ asset('images/logo.png') }}" type="images/png">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link rel="stylesheet" href="{{ asset('css/custom.css') }}">
    @stack('styles')
</head>
<body>
    <!-- Navigation -->
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
                    <li class="nav-item">
                        <a class="nav-link" href="{{ url('/profile/welcome') }}#home">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ url('/') }}#about">About</a>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown">
                            Menu
                        </a>
                        <ul class="dropdown-menu">
                            <li><a class="dropdown-item" href="{{ url('/menu/bread') }}">Bread</a></li>
                            <li><a class="dropdown-item" href="{{ url('/menu/cakes') }}">Cakes</a></li>
                            <li><a class="dropdown-item" href="{{ url('/menu/pastry') }}">Pastry & Pie</a></li>
                            <li><a class="dropdown-item" href="{{ url('/menu/sandwiches') }}">Sandwiches</a></li>
                            <li><a class="dropdown-item" href="{{ url('/menu/coffee') }}">Coffee & Espresso</a></li>
                        </ul>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ url('/') }}#contact">Contact</a>
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
                    <li class="nav-item">
    <a class="nav-link" href="{{ url('/cart') }}">
        🛒 Cart
        @if(session('cart'))
            <span class="badge bg-danger">{{ count(session('cart')) }}</span>
        @endif
    </a>
</li>

                </ul>
            </div>
        </div>
    </nav>

    <!-- Main Content -->
    @yield('content')

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
    @stack('scripts')
</body>
</html>