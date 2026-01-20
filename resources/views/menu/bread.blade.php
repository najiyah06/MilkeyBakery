@extends('layouts.navigation')

@section('title', 'Bread Menu - MilkeyBakery')

@section('content')

<section class="page-header">
    <div class="container">
        <h1 class="display-4 fw-bold">Freshly Baked Bread</h1>
        <p class="lead">Handcrafted daily with premium ingredients</p>
    </div>
</section>

<section class="py-5 bg-light">
    <div class="container">
        <div class="row g-4">

            @forelse ($menus as $menu)
                <div class="col-md-6 col-lg-4">
                    <div class="menu-card h-100">

                        <img src="{{ $menu->image }}"
                             class="menu-card-img"
                             alt="{{ $menu->name }}">

                        <div class="menu-card-body">
                            <h3 class="menu-card-title">{{ $menu->name }}</h3>

                            <p class="menu-card-text">
                                {{ $menu->description }}
                            </p>

                            <div class="price">
                                Rp {{ number_format($menu->price, 0, ',', '.') }}
                            </div>

                            <form action="{{ route('cart.add') }}" method="POST">
                                @csrf
                                <input type="hidden" name="id" value="{{ $menu->id }}">
                                <input type="hidden" name="name" value="{{ $menu->name }}">
                                <input type="hidden" name="price" value="{{ $menu->price }}">
                                <input type="hidden" name="image" value="{{ $menu->image }}">
                                <input type="hidden" name="category" value="{{ $menu->category }}">

                                <button type="submit" class="btn btn-add-cart w-100">
                                    <i class="fas fa-shopping-cart me-2"></i>
                                    Add to Cart
                                </button>
                            </form>
                        </div>
                    </div>
                </div>
            @empty
                <div class="col-12 text-center">
                    <p class="text-muted">Menu bread belum tersedia.</p>
                </div>
            @endforelse

        </div>
    </div>
</section>

@endsection