<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Admin Login - MilkeyBakery</title>

    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- Font Awesome -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css" rel="stylesheet">

    <style>
        body {
            background: linear-gradient(135deg, #FFF8F0, #F3E6D8);
            font-family: 'Poppins', sans-serif;
        }

        .login-card {
            width: 400px;
            border-radius: 20px;
            border: none;
            box-shadow: 0 10px 30px rgba(139, 111, 71, 0.2);
            background: white;
        }

        .login-title {
            font-weight: 700;
            color: #8B6F47;
        }

        .brand {
            font-weight: 800;
            color: #6F4E37;
        }

        .form-control {
            border-radius: 12px;
            padding: 12px 14px;
            border: 2px solid #EADBC8;
        }

        .form-control:focus {
            border-color: #C9A57B;
            box-shadow: 0 0 0 0.15rem rgba(201,165,123,.25);
        }

        .btn-login {
            background: linear-gradient(135deg, #C9A57B, #8B6F47);
            color: white;
            border-radius: 999px;
            padding: 12px;
            font-weight: 600;
            border: none;
            transition: 0.2s ease;
        }

        .btn-login:hover {
            transform: translateY(-1px);
            opacity: 0.95;
        }
    </style>
</head>

<body class="d-flex align-items-center justify-content-center" style="height:100vh">

<div class="login-card card p-4">

    <div class="text-center mb-3">
        <div class="brand fs-4">MilkeyBakery</div>
        <div class="login-title">Admin Login</div>
    </div>

    @if(session('error'))
        <div class="alert alert-danger rounded-3">
            {{ session('error') }}
        </div>
    @endif

    <form method="POST" action="{{ route('admin.login.submit') }}">
        @csrf

        <div class="mb-3">
            <label class="mb-1 text-muted">Email</label>
            <input type="email" name="email" class="form-control" placeholder="admin@email.com" required>
        </div>

        <div class="mb-4">
            <label class="mb-1 text-muted">Password</label>
            <input type="password" name="password" class="form-control" placeholder="••••••••" required>
        </div>

        <button class="btn-login w-100">
            <i class="fas fa-sign-in-alt me-2"></i>Login Admin
        </button>
    </form>

</div>

</body>
</html>