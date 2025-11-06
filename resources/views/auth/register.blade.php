    <!-- Panggil file CSS -->
    <link rel="stylesheet" href="{{ asset('css/register.css') }}">

    <div class="register-container">
        <!-- Header -->
        <div class="register-header">
            <img src="{{ asset('images/Logo1.png') }}" alt="MilkeyBakery Logo" class="logo-img">
            <h2 class="register-title">Buat Akun MilkeyBakery</h2>
        </div>

        <!-- Register Card -->
        <div class="register-card soft-card">
            <form method="POST" action="{{ route('register') }}">
                @csrf

                <!-- Nama -->
                <div>
                    <x-input-label for="name" :value="__('Nama')" class="label" />
                    <x-text-input id="name" class="input" type="text" name="name"
                        :value="old('name')" required autofocus autocomplete="name" />
                    <x-input-error :messages="$errors->get('name')" class="error" />
                </div>

                <!-- Email -->
                <div class="mt-4">
                    <x-input-label for="email" :value="__('Email')" class="label" />
                    <x-text-input id="email" class="input" type="email" name="email"
                        :value="old('email')" required autocomplete="username" />
                    <x-input-error :messages="$errors->get('email')" class="error" />
                </div>

                <!-- Password -->
                <div class="mt-4">
                    <x-input-label for="password" :value="__('Password')" class="label" />
                    <x-text-input id="password" class="input" type="password"
                        name="password" required autocomplete="new-password" />
                    <x-input-error :messages="$errors->get('password')" class="error" />
                </div>

                <!-- Konfirmasi Password -->
                <div class="mt-4">
                    <x-input-label for="password_confirmation" :value="__('Konfirmasi Password')" class="label" />
                    <x-text-input id="password_confirmation" class="input" type="password"
                        name="password_confirmation" required autocomplete="new-password" />
                    <x-input-error :messages="$errors->get('password_confirmation')" class="error" />
                </div>

                <!-- Tombol -->
                <div class="form-footer">
                    <a href="{{ route('login') }}" class="login-link">Sudah Daftar?</a>
                    <button type="submit" class="btn-register">Daftar</button>
                </div>
            </form>
        </div>
    </div>