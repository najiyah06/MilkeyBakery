<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Admin - @yield('title')</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" rel="stylesheet">

    <style>
        body { 
            background: #FFF8F0; 
            font-family: 'Poppins', sans-serif;
        }

        /* SIDEBAR */
        .sidebar {
            width: 240px;
            min-height: 100vh;
            background: linear-gradient(180deg, #8B6F47, #C9A57B);
            color: white;
            padding-top: 15px;
        }

        .sidebar h4 {
            font-weight: 700;
        }

        .sidebar a {
            color: #fff;
            text-decoration: none;
            display: block;
            padding: 12px 18px;
            border-radius: 12px;
            margin: 6px 10px;
            transition: 0.2s ease;
        }

        .sidebar a:hover {
            background: rgba(255,255,255,0.2);
        }

        /* TOPBAR */
        .topbar {
            background: white;
            padding: 15px 20px;
            border-bottom: 1px solid #EADBC8;
            box-shadow: 0 4px 12px rgba(139,111,71,.12);
        }
    </style>
</head>
<body>

<div class="d-flex">

    <!-- SIDEBAR -->
    <div class="sidebar">
        <h4 class="text-center py-3">Milkey Admin</h4>

        <a href="{{ route('admin.dashboard') }}">
            <i class="fas fa-home me-2"></i> Dashboard
        </a>

        <a href="{{ route('admin.menus.index') }}">
            <i class="fas fa-bread-slice me-2"></i> Menu
        </a>

        <a href="{{ route('admin.categories.index') }}">
            <i class="fas fa-bread-slice me-2"></i> Kategori
        </a>

        <a href="{{ route('admin.orders.index') }}">
            <i class="fas fa-receipt me-2"></i> Orders
        </a>

    </div>

    <!-- CONTENT -->
    <div class="flex-grow-1">

        <!-- TOPBAR -->
        <div class="topbar d-flex justify-content-between align-items-center">
            <strong>@yield('title')</strong>

            <form method="POST" action="{{ route('logout') }}">
                @csrf
                <button class="btn btn-sm btn-danger">Logout</button>
            </form>
        </div>

        <!-- PAGE CONTENT -->
        <div class="p-4">
            @yield('content')
        </div>
    </div>

</div>

</body>
</html>
