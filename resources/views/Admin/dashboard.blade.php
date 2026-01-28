@extends('layouts.app')

@section('title', 'Dashboard')

@section('content')
<div class="row">

    <div class="col-md-4 mb-3">
        <div class="card p-3 shadow-sm border-0" style="background:#FFF8F0;border-radius:16px;">
            <h5 class="text-brown">Total Menu</h5>
            <h2 class="fw-bold text-dark">{{ $menuCount }}</h2>
        </div>
    </div>

    <div class="col-md-4 mb-3">
        <div class="card p-3 shadow-sm border-0" style="background:#FFFDF9;border-radius:16px;">
            <h5 class="text-brown">Total Category</h5>
            <h2 class="fw-bold text-dark">{{ $categoryCount }}</h2>
        </div>
    </div>

    <div class="col-md-4 mb-3">
        <div class="card p-3 shadow-sm border-0" style="background:#FFF3E6;border-radius:16px;">
            <h5 class="text-brown">Total User</h5>
            <h2 class="fw-bold text-dark">{{ $userCount }}</h2>
        </div>
    </div>

</div>

<!-- GRAFIK -->
<div class="row mt-4">
    <div class="col-12">
        <div class="card shadow-sm border-0" style="border-radius:18px;background:#FFFDF9;">
            <div class="card-header fw-bold text-brown" style="background:none;border:none;">
                Statistik Data MilkeyBakery
            </div>
            <div class="card-body">
                <canvas id="dashboardChart" height="120"></canvas>
            </div>
        </div>
    </div>
</div>

<!-- Chart.js -->
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

<script>
document.addEventListener("DOMContentLoaded", function () {
    const ctx = document.getElementById('dashboardChart');

    new Chart(ctx, {
        type: 'bar',
        data: {
            labels: ['Menu', 'Category', 'User'],
            datasets: [{
                label: 'Total Data',
                data: @json([$menuCount, $categoryCount, $userCount]),
                backgroundColor: ['#C9A57B', '#EADBC8', '#A0826D'],
                borderRadius: 12,
                borderWidth: 0
            }]
        },
        options: {
            responsive: true,
            scales: {
                y: {
                    beginAtZero: true
                }
            }
        }
    });
});
</script>

@endsection