<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <link rel="icon" href="{{ asset('images/2.png') }}" type="image/png">
    <title>Register - MilkeyBakery</title>
    <link rel="stylesheet" href="{{ asset('css/register.css') }}">
</head>
<body>

<div class="register-wrapper">
    <div class="register-card">

        <div class="register-header">
            <img src="{{ asset('images/1.png') }}" class="logo-img">
            <h2 class="register-title">Buat Akun MilkeyBakery</h2>
        </div>

        <form method="POST" action="{{ route('register') }}">
            @csrf

            <div class="form-group">
                <label class="label">Nama</label>
                <input type="text" name="name" class="input"
                    value="{{ old('name') }}" required autofocus>
                @error('name') <div class="error">{{ $message }}</div> @enderror
            </div>

            <div class="form-group">
                <label class="label">Email</label>
                <input type="email" name="email" class="input"
                    value="{{ old('email') }}" required>
                @error('email') <div class="error">{{ $message }}</div> @enderror
            </div>

            <div class="form-group">
                <label class="label">Password</label>
                <input type="password" name="password" class="input" required>
                @error('password') <div class="error">{{ $message }}</div> @enderror
            </div>

            <div class="form-group">
                <label class="label">Konfirmasi Password</label>
                <input type="password" name="password_confirmation" class="input" required>
                @error('password_confirmation') <div class="error">{{ $message }}</div> @enderror
            </div>

            <div class="form-footer">
                <a href="{{ route('login') }}" class="login-link">Sudah punya akun?</a>
                <button type="submit" class="btn-register">Daftar</button>
            </div>

        </form>

    </div>
</div>

</body>
</html>
