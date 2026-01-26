@extends('layouts.navigation')

@section('title', 'My Orders')

@section('content')
<div class="container py-5">
    <h2 class="fw-bold mb-4">My Orders</h2>

    @if($orders->isEmpty())
        <div class="alert alert-info">You have no orders yet.</div>
    @else
        <div class="table-responsive">
            <table class="table table-bordered align-middle">
                <thead class="table-light">
                    <tr>
                        <th>Order Code</th>
                        <th>Date</th>
                        <th>Total</th>
                        <th>Status</th>
                        <th></th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($orders as $order)
                    <tr>
                        <td>{{ $order->order_code }}</td>
                        <td>{{ $order->created_at->format('d M Y') }}</td>
                        <td>Rp {{ number_format($order->total,0,',','.') }}</td>
                        <td>
                            <span class="badge 
                                @if($order->status == 'paid') bg-success
                                @elseif($order->status == 'pending') bg-warning
                                @else bg-danger
                                @endif">
                                {{ strtoupper($order->status) }}
                            </span>
                        </td>
                        <td>
                            <a href="{{ route('orders.show', $order) }}" class="btn btn-sm btn-primary">
                                View
                            </a>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    @endif
</div>
@endsection