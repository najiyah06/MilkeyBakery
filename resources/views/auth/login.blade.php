<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Login - MilkeyBakery</title>
    <link rel="stylesheet" href="{{ asset('css/login.css') }}">
</head>
<body>

<div class="login-wrapper">
    <div class="login-card">

        <div class="login-header">
            <img src="{{ asset('images/Logo1a.png') }}" class="logo-img">
            <h2 class="login-title">Masuk ke MilkeyBakery</h2>
        </div>

        {{-- STATUS MESSAGE --}}
        @if (session('status'))
            <div style="
                background:#e6f4ea;
                color:#1e7e34;
                padding:10px;
                border-radius:8px;
                margin-bottom:15px;
                text-align:center;
                font-weight:600;
            ">
                {{ session('status') }}
            </div>
        @endif

        <form method="POST" action="{{ route('login') }}">
            @csrf

            <div class="form-group">
                <label class="label">Email</label>
                <input type="email" name="email" class="input"
                    value="{{ old('email') }}" required autofocus>
                @error('email') <div class="error">{{ $message }}</div> @enderror
            </div>

            <div class="form-group">
                <label class="label">Password</label>
                <input type="password" name="password" class="input" required>
                @error('password') <div class="error">{{ $message }}</div> @enderror
            </div>

            <div class="remember-row">
                <label class="remember-label">
                    <input type="checkbox" name="remember">
                    Ingat saya
                </label>

                <a href="{{ route('password.request') }}" class="forgot-link">
                    Lupa password?
                </a>
            </div>

            <button type="submit" class="btn-login">Masuk</button>

            <p class="register-text">
                Belum punya akun?
                <a href="{{ route('register') }}" class="register-link">Daftar</a>
            </p>
        </form>

    </div>
</div>

</body>
</html>
