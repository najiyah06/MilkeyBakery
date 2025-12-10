<link rel="stylesheet" href="{{ asset('css/login.css') }}">

<div class="login-container">
    <!-- Header -->
    <div class="login-header">
        <img src="{{ asset('images/Logo1a.png') }}" alt="MilkeyBakery Logo" class="logo-img">
        <h2 class="login-title">Masuk ke MilkeyBakery</h2>
    </div>

    <!-- Login Card -->
    <div class="login-card soft-card">

        <!-- Session Status -->
        <x-auth-session-status class="session-status" :status="session('status')" />

        <form method="POST" action="{{ route('login') }}">
            @csrf

            <!-- Email -->
            <div>
                <x-input-label for="email" :value="__('Email')" class="label" />
                <x-text-input id="email" class="input" type="email"
                    name="email" :value="old('email')" required autofocus autocomplete="username" />
                <x-input-error :messages="$errors->get('email')" class="error" />
            </div>

            <!-- Password -->
            <div class="mt-4">
                <x-input-label for="password" :value="__('Password')" class="label" />
                <x-text-input id="password" class="input" type="password"
                    name="password" required autocomplete="current-password" />
                <x-input-error :messages="$errors->get('password')" class="error" />
            </div>

            <!-- Remember Me -->
            <div class="remember-container">
                <label for="remember_me" class="remember-label">
                    <input id="remember_me" type="checkbox" name="remember" class="remember-checkbox">
                    <span>Ingat saya</span>
                </label>
            </div>

            <!-- Footer -->
            <div class="form-footer">
                @if (Route::has('password.request'))
                    <a class="forgot-link" href="{{ route('password.request') }}">
                        Lupa password?
                    </a>
                @endif

                <button class="btn-login" type="submit">Masuk</button>
            </div>

            <p class="register-text">
                Belum punya akun?
                <a href="{{ route('register') }}" class="register-link">Daftar</a>
            </p>

        </form>
    </div>
</div>
