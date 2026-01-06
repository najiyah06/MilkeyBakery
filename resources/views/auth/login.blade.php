<x-guest-layout>
    <link rel="stylesheet" href="{{ asset('css/login.css') }}">

    <div class="login-wrapper">
        <div class="login-card">

            <div class="login-header">
                <img src="{{ asset('images/Logo1a.png') }}" class="logo-img">
                <h2 class="login-title">Masuk ke MilkeyBakery</h2>
            </div>

            <x-auth-session-status class="session-status" :status="session('status')" />

            <form method="POST" action="{{ route('login') }}">
                @csrf

                <div class="form-group">
                    <x-input-label for="email" value="Email" class="label"/>
                    <x-text-input id="email" class="input" type="email"
                        name="email" :value="old('email')" required autofocus />
                    <x-input-error :messages="$errors->get('email')" class="error"/>
                </div>

                <div class="form-group">
                    <x-input-label for="password" value="Password" class="label"/>
                    <x-text-input id="password" class="input" type="password"
                        name="password" required />
                    <x-input-error :messages="$errors->get('password')" class="error"/>
                </div>

                <div class="remember-row">
                    <label class="remember-label">
                        <input type="checkbox" name="remember">
                        Ingat saya
                    </label>

                    @if (Route::has('password.request'))
                        <a href="{{ route('password.request') }}" class="forgot-link">
                            Lupa password?
                        </a>
                    @endif
                </div>

                <button class="btn-login" type="submit">Masuk</button>

                <p class="register-text">
                    Belum punya akun?
                    <a href="{{ route('register') }}" class="register-link">Daftar</a>
                </p>
            </form>

        </div>
    </div>
</x-guest-layout>