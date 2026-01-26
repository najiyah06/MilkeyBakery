<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Admin - @yield('title')</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" rel="stylesheet">

    <style>
        body { background: #f4f6f9; }
        .sidebar {
            width: 240px;
            min-height: 100vh;
            background: #2f2f2f;
            color: white;
        }
        .sidebar a {
            color: #ccc;
            text-decoration: none;
            display: block;
            padding: 12px 20px;
        }
        .sidebar a:hover {
            background: #444;
            color: white;
        }
        .topbar {
            background: white;
            padding: 15px;
            border-bottom: 1px solid #ddd;
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
