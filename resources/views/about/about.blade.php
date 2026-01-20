@extends('layouts.navigation')

@section('content')

<style>
    body {
        background-color: #f5efe6;
        font-family: 'Poppins', sans-serif;
    }

    .about-container {
        max-width: 1000px;
        margin: 60px auto;
        padding: 20px;
        color: #4b2e2e;
    }

    /* Header */
    .about-header {
        text-align: center;
        margin-bottom: 50px;
    }

    .about-header h1 {
        font-size: 36px;
        color: #6b3e2e;
    }

    .about-header p {
        font-size: 16px;
        color: #8b5e3c;
    }

    /* Content */
    .about-content {
        display: grid;
        grid-template-columns: 2fr 1fr;
        gap: 30px;
    }

    .about-text {
        background-color: #fffaf5;
        padding: 30px;
        border-radius: 18px;
        box-shadow: 0 8px 20px rgba(75, 46, 46, 0.15);
    }

    .about-text h2 {
        margin-bottom: 15px;
        color: #6b3e2e;
    }

    .about-text p {
        line-height: 1.8;
        margin-bottom: 12px;
    }

    /* Card */
    .about-card {
        background-color: #6b3e2e;
        color: #fff;
        padding: 30px;
        border-radius: 18px;
        box-shadow: 0 8px 20px rgba(75, 46, 46, 0.25);
    }

    .about-card h3 {
        margin-bottom: 15px;
    }

    .about-card ul {
        list-style: none;
        padding: 0;
    }

    .about-card li {
        margin-bottom: 12px;
        font-size: 15px;
    }

    /* Responsive */
    @media (max-width: 768px) {
        .about-content {
            grid-template-columns: 1fr;
        }
    }
</style>

<div class="about-container">
    <!-- Header -->
    <div class="about-header">
        <h1>Tentang MilkeyBakery</h1>
        <p>Roti hangat, lembut, dan penuh cinta 🤎</p>
    </div>

    <!-- Content -->
    <div class="about-content">
        <div class="about-text">
            <h2>Cerita Kami</h2>
            <p>
                MilkeyBakery adalah toko roti yang menghadirkan berbagai pilihan roti dan kue
                dengan bahan berkualitas dan rasa yang konsisten.
                Kami percaya bahwa roti terbaik dibuat dengan kesabaran dan cinta.
            </p>
            <p>
                Setiap produk dibuat fresh setiap hari untuk memastikan kualitas terbaik
                sampai ke tangan pelanggan.
            </p>
        </div>

        <div class="about-card">
            <h3>Kenapa MilkeyBakery?</h3>
            <ul>
                <li>🍞 Fresh setiap hari</li>
                <li>🧈 Bahan berkualitas</li>
                <li>🤎 Rasa lembut & manis pas</li>
                <li>📦 Bisa pre-order</li>
            </ul>
        </div>
    </div>
</div>

@endsection