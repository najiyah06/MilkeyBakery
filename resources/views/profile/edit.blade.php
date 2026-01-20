@extends('layouts.navigation')

@section('title', 'My Profile - MilkeyBakery')

@push('styles')
<style>
/* ===== (STYLE TETAP, TIDAK DIUBAH) ===== */
.profile-header {
    background: linear-gradient(135deg, #8B6F47 0%, #C9A57B 100%);
    padding: 40px 0;
    margin-top: 56px;
    color: white;
}
.profile-container {
    padding: 60px 0;
    background: #FFF8F0;
}
.profile-main-card {
    background: white;
    border-radius: 20px;
    padding: 40px;
    box-shadow: 0 10px 30px rgba(139, 111, 71, 0.15);
}
.profile-avatar-large {
    width: 150px;
    height: 150px;
    border-radius: 50%;
    background: linear-gradient(135deg, #C9A57B, #A0826D);
    display: flex;
    align-items: center;
    justify-content: center;
    margin: auto;
}
.profile-avatar-large i {
    font-size: 4rem;
    color: white;
}
.form-control-profile {
    width: 100%;
    padding: 12px 18px;
    border: 2px solid #E8D5C4;
    border-radius: 10px;
}
.btn-profile-primary {
    background: linear-gradient(135deg, #C9A57B, #A0826D);
    color: white;
    border-radius: 25px;
    padding: 12px 30px;
    border: none;
}
.btn-profile-danger {
    background: #dc3545;
    color: white;
    border-radius: 25px;
    padding: 12px 30px;
    border: none;
}
.sidebar-menu-item {
    display: block;
    padding: 14px 18px;
    margin-bottom: 10px;
    background: #F5E6D3;
    border-radius: 10px;
    color: #8B6F47;
    text-decoration: none;
}
.sidebar-menu-item.active {
    background: linear-gradient(135deg, #C9A57B, #A0826D);
    color: white;
}
</style>
@endpush

@section('content')

<!-- HEADER -->
<section class="profile-header">
    <div class="container">
        <h1>My Profile</h1>
    </div>
</section>

<section class="profile-container">
<div class="container">
<div class="row">

<!-- ================= MAIN ================= -->
<div class="col-lg-8">
<div class="profile-main-card">

    <!-- AVATAR -->
    <div class="text-center mb-4">
        <div class="profile-avatar-large mb-3">
            <i class="fas fa-user"></i>
        </div>
        <h3>{{ Auth::user()->name }}</h3>
        <p class="text-muted">{{ Auth::user()->email }}</p>
    </div>

    <!-- ================= UPDATE PROFILE ================= -->
    <h4 class="mb-3">Personal Information</h4>

    <form method="POST" action="{{ route('profile.update') }}">
        @csrf
        @method('PATCH')

        <div class="row mb-3">
            <div class="col-md-6">
                <label>Full Name</label>
                <input type="text" name="name" class="form-control-profile" value="{{ Auth::user()->name }}">
            </div>
            <div class="col-md-6">
                <label>Email</label>
                <input type="email" name="email" class="form-control-profile" value="{{ Auth::user()->email }}">
            </div>
        </div>

        <button class="btn-profile-primary">
            <i class="fas fa-save me-2"></i>Save Changes
        </button>
    </form>

    <hr class="my-5">

    <!-- ================= CHANGE PASSWORD ================= -->
    <h4 class="mb-3">Change Password</h4>

    {{-- 🔥 BREEZE DEFAULT ROUTE --}}
    <form method="POST" action="{{ url('/password') }}">
        @csrf
        @method('PUT')

        <div class="mb-3">
            <label>Current Password</label>
            <input type="password" name="current_password" class="form-control-profile">
        </div>

        <div class="mb-3">
            <label>New Password</label>
            <input type="password" name="password" class="form-control-profile">
        </div>

        <div class="mb-3">
            <label>Confirm New Password</label>
            <input type="password" name="password_confirmation" class="form-control-profile">
        </div>

        <button class="btn-profile-primary">
            <i class="fas fa-key me-2"></i>Update Password
        </button>
    </form>

    <hr class="my-5">

    <!-- ================= DELETE ACCOUNT ================= -->
    <h4 class="text-danger mb-3">Danger Zone</h4>

    <form method="POST" action="{{ route('profile.destroy') }}"
          onsubmit="return confirm('Yakin hapus akun? Ini tidak bisa dibatalkan!')">
        @csrf
        @method('DELETE')

        <button class="btn-profile-danger">
            <i class="fas fa-trash me-2"></i>Delete Account
        </button>
    </form>

</div>
</div>

<!-- ================= SIDEBAR =================
<div class="col-lg-4">
    <div class="sidebar-card">
        <h4>Quick Menu</h4>

        <a href="{{ route('dashboard') }}" class="sidebar-menu-item">
            <i class="fas fa-home me-2"></i>Dashboard
        </a>

        <a href="{{ route('profile.edit') }}" class="sidebar-menu-item active">
            <i class="fas fa-user me-2"></i>My Profile
        </a>

        <form method="POST" action="{{ route('logout') }}">
            @csrf
            <button class="sidebar-menu-item w-100 text-start border-0">
                <i class="fas fa-sign-out-alt me-2"></i>Logout
            </button>
        </form>
    </div>
</div> -->

</div>
</div>
</section>
@endsection
