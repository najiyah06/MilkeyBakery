<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">

    <link rel="icon" href="{{ asset('images/2.png') }}" type="image/png">

    <title>Lupa Password - MilkeyBakery</title>
    <link rel="stylesheet" href="{{ asset('css/login.css') }}">
</head>
<body>

<div class="login-wrapper">
    <div class="login-card">

        <div class="login-header">
            <img src="{{ asset('images/1.png') }}" class="logo-img">
            <h2 class="login-title">Lupa Password</h2>
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

        <form method="POST" action="{{ route('password.email') }}">
            @csrf

            <div class="form-group">
                <label class="label">Email</label>
                <input
                    type="email"
                    name="email"
                    class="input"
                    value="{{ old('email') }}"
                    required
                    autofocus
                >
                @error('email')
                    <div class="error">{{ $message }}</div>
                @enderror
            </div>

            <button type="submit" class="btn-login">
                Kirim Link Reset
            </button>
        </form>

        <p class="register-text" style="margin-top:15px;">
            <a href="{{ route('login') }}" class="register-link">
                Kembali ke Login
            </a>
        </p>

    </div>
</div>

</body>
</html>