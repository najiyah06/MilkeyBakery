@extends('layouts.app')

@section('title', 'Orders')

@section('content')

<div class="card shadow-sm border-0 mx-auto"
     style="border-radius:20px;background:#FFFDF9; max-width: 100%;">

    <div class="card-header d-flex justify-content-between align-items-center"
         style="background:none;border:none;">
        <h5 class="fw-bold text-brown mb-0">🧾 Daftar Orders</h5>
        <span class="text-muted small">
            Total: {{ $orders->total() }} orders
        </span>
    </div>

    <div class="card-body p-0">

        <div class="table-responsive">
            <table class="table table-hover align-middle mb-0">
                <thead style="background:#F3E6D8;">
                    <tr>
                        <th class="ps-4">Order Code</th>
                        <th>Nama</th>
                        <th>Email</th>
                        <th>Total</th>
                        <th>Status</th>
                        <th class="pe-4">Tanggal</th>
                    </tr>
                </thead>

                <tbody>
                    @forelse ($orders as $order)
                        <tr>
                            <td class="ps-4 fw-semibold text-brown">
                                {{ $order->order_code }}
                            </td>
                            <td>{{ $order->name }}</td>
                            <td class="text-muted">{{ $order->email }}</td>
                            <td class="fw-semibold">
                                Rp {{ number_format($order->total, 0, ',', '.') }}
                            </td>
                            <td>
                                @if($order->status === 'paid')
                                    <span class="badge rounded-pill bg-success">
                                        Paid
                                    </span>
                                @elseif($order->status === 'pending')
                                    <span class="badge rounded-pill bg-warning text-dark">
                                        Pending
                                    </span>
                                @else
                                    <span class="badge rounded-pill bg-secondary">
                                        {{ ucfirst($order->status) }}
                                    </span>
                                @endif
                            </td>
                            <td class="pe-4">
                                {{ $order->created_at->format('d M Y') }}
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="6" class="text-center text-muted py-4">
                                Belum ada order
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>

        <!-- PAGINATION (BOOTSTRAP, TENGAH, TIDAK NGAMBANG) -->
        <div class="d-flex justify-content-center py-4">
            {{ $orders->links('pagination::bootstrap-5') }}
        </div>

    </div>
</div>

@endsection
