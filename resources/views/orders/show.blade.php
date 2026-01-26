@extends('layouts.navigation')

@section('title', 'Order Detail')

@section('content')
<div class="container py-5">
    <h2 class="fw-bold mb-3">Order {{ $order->order_code }}</h2>

    <p>Status: 
        <span class="badge 
            @if($order->status == 'paid') bg-success
            @elseif($order->status == 'pending') bg-warning
            @else bg-danger
            @endif">
            {{ strtoupper($order->status) }}
        </span>
    </p>

    <div class="card mb-4">
        <div class="card-body">
            <p><strong>Name:</strong> {{ $order->name }}</p>
            <p><strong>Phone:</strong> {{ $order->phone }}</p>
            <p><strong>Address:</strong> {{ $order->address }}, {{ $order->city }}</p>
        </div>
    </div>

    <div class="card">
        <div class="card-body">
            <h5 class="fw-bold mb-3">Items</h5>

            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>Product</th>
                        <th>Price</th>
                        <th>Qty</th>
                        <th>Subtotal</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($order->items as $item)
                    <tr>
                        <td>{{ $item->product_name }}</td>
                        <td>Rp {{ number_format($item->price,0,',','.') }}</td>
                        <td>{{ $item->qty }}</td>
                        <td>Rp {{ number_format($item->subtotal,0,',','.') }}</td>
                    </tr>
                    @endforeach
                </tbody>
            </table>

            <div class="text-end fw-bold mt-3">
                Total: Rp {{ number_format($order->total,0,',','.') }}
            </div>
        </div>
    </div>
</div>
@endsection