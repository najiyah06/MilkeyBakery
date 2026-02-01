<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Reset Password - MilkeyBakery</title>
    <link rel="stylesheet" href="{{ asset('css/login.css') }}">
</head>
<body>

<div class="login-wrapper">
    <div class="login-card">

        <div class="login-header">
            <img src="{{ asset('images/Logo1a.png') }}" class="logo-img">
            <h2 class="login-title">Reset Password</h2>
        </div>

        <form method="POST" action="{{ route('password.reset.update') }}">
            @csrf

            <!-- TOKEN -->
            <input type="hidden" name="token" value="{{ $request->route('token') }}">

            <!-- EMAIL -->
            <div class="form-group">
                <label class="label">Email</label>
                <input
                    type="email"
                    name="email"
                    class="input"
                    value="{{ old('email', $request->email) }}"
                    required
                    autofocus
                >
                @error('email')
                    <div class="error">{{ $message }}</div>
                @enderror
            </div>

            <!-- PASSWORD BARU -->
            <div class="form-group">
                <label class="label">Password Baru</label>
                <input
                    type="password"
                    name="password"
                    class="input"
                    required
                >
                @error('password')
                    <div class="error">{{ $message }}</div>
                @enderror
            </div>

            <!-- KONFIRMASI PASSWORD -->
            <div class="form-group">
                <label class="label">Konfirmasi Password</label>
                <input
                    type="password"
                    name="password_confirmation"
                    class="input"
                    required
                >
                @error('password_confirmation')
                    <div class="error">{{ $message }}</div>
                @enderror
            </div>

            <button type="submit" class="btn-login">
                Reset Password
            </button>
        </form>

    </div>
</div>

</body>
</html>