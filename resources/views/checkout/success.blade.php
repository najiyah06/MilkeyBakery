@extends('layouts.navigation')

@section('title', 'Order Success')

@section('content')
<div class="container py-5 text-center">
    <h1 class="text-success fw-bold">🎉 Order Berhasil!</h1>
    <p>Terima kasih sudah belanja di <b>MilkeyBakery</b></p>

    <a href="{{ route('menu.category', 'all') }}" class="btn btn-primary mt-3">
        Belanja Lagi
    </a>
</div>
@endsection
