@extends('layouts.app')

@section('title', 'Dashboard')

@section('content')

<!-- ================= STAT CARDS ================= -->
<div class="row">

    <div class="col-md-4 mb-3">
        <div class="card p-3 shadow-sm border-0" style="background:#FFF8F0;border-radius:16px;">
            <h6 class="text-brown">🍞 Total Menu</h6>
            <h3 class="fw-bold">{{ $menuCount }}</h3>
        </div>
    </div>

    <div class="col-md-4 mb-3">
        <div class="card p-3 shadow-sm border-0" style="background:#FFFDF9;border-radius:16px;">
            <h6 class="text-brown">🧁 Total Category</h6>
            <h3 class="fw-bold">{{ $categoryCount }}</h3>
        </div>
    </div>

    <div class="col-md-4 mb-3">
        <div class="card p-3 shadow-sm border-0" style="background:#F3E6D8;border-radius:16px;">
            <h6 class="text-brown">🛒 Total Orders</h6>
            <h3 class="fw-bold">{{ $orderCount }}</h3>
        </div>
    </div>

</div>

<!-- ================= TOTAL REVENUE ================= -->
<div class="row mb-4">
    <div class="col-md-4">
        <div class="card p-3 shadow-sm border-0" style="background:#EADBC8;border-radius:16px;">
            <h6 class="text-brown">💰 Total Revenue</h6>
            <h4 class="fw-bold">
                Rp {{ number_format($totalRevenue, 0, ',', '.') }}
            </h4>
        </div>
    </div>
</div>

<!-- ================= GRAFIK PER MINGGU (KOTAK) ================= -->
<div class="row mt-4">
    <div class="col-lg-6 col-md-8">
        <div class="card shadow-sm border-0 mx-auto"
             style="border-radius:20px;background:#FFFDF9;">
            <div class="card-header fw-bold text-brown text-center"
                 style="background:none;border:none;">
                📆 Penjualan 7 Hari Terakhir
            </div>
            <div class="card-body d-flex justify-content-center">
                <!-- KOTAK -->
                <canvas id="weeklyChart" width="360" height="360"></canvas>
            </div>
        </div>
    </div>
</div>

<!-- ================= CHART JS ================= -->
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

<script>
document.addEventListener("DOMContentLoaded", function () {

    new Chart(document.getElementById('weeklyChart'), {
        type: 'bar',
        data: {
            labels: {!! json_encode($weekLabels) !!},
            datasets: [{
                label: 'Revenue Harian',
                data: {!! json_encode($weekTotals) !!},
                backgroundColor: '#C9A57B',
                borderRadius: 8,
                barThickness: 28,
                maxBarThickness: 32
            }]
        },
        options: {
            responsive: false, // 🔥 biar ukuran KOTAK konsisten
            plugins: {
                legend: {
                    labels: {
                        color: '#5A4634',
                        font: { weight: 'bold' }
                    }
                }
            },
            scales: {
                x: {
                    ticks: {
                        color: '#5A4634',
                        font: { weight: 'bold' }
                    },
                    grid: {
                        display: false
                    }
                },
                y: {
                    beginAtZero: true,
                    ticks: {
                        color: '#5A4634',
                        callback: v => 'Rp ' + v.toLocaleString('id-ID')
                    },
                    grid: {
                        color: 'rgba(138,110,82,0.25)'
                    }
                }
            }
        }
    });

});
</script>

@endsection
