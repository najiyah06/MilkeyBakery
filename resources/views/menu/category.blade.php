@extends('layouts.navigation')

@section('title', $category->name ?? 'Menu')

@section('content')
<div class="container mt-5 pt-5">

    <h2 class="mb-4 text-capitalize">
        {{ $category->name ?? 'Menu' }}

        @if(isset($query))
            <small class="text-muted">for "{{ $query }}"</small>
        @endif
    </h2>

    <div class="row">
        @forelse($menus as $menu)
            <div class="col-md-4 mb-4">
                <div class="card shadow-sm border-0 h-100 p-3">

                    <img src="{{ asset('storage/' . $menu->image) }}" 
                         class="img-fluid rounded mb-2">

                    <h5 class="fw-semibold">{{ $menu->name }}</h5>

                    <p class="text-muted small">
                        {{ $menu->description }}
                    </p>

                    <p class="fw-bold text-dark">
                        Rp {{ number_format($menu->price) }}
                    </p>

                    <form action="{{ route('cart.add') }}" method="POST">
                        @csrf
                        <input type="hidden" name="menu_id" value="{{ $menu->id }}">

                        <button type="submit" class="btn btn-outline-dark btn-sm w-100">
                            <i class="fas fa-cart-plus me-1"></i>
                            Add to Cart
                        </button>
                    </form>

                </div>
            </div>
        @empty
            <div class="text-center text-muted mt-5">
                @if(isset($query))
                    <p>Tidak ada hasil untuk "<strong>{{ $query }}</strong>" 😢</p>
                @else
                    <p>Belum ada menu di kategori ini 🍞</p>
                @endif
            </div>
        @endforelse
    </div>

</div>
@endsection