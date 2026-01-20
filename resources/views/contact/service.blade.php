@extends('layouts.navigation')

@section('title', 'Customer Service - MilkeyBakery')

@push('styles')
<style>
    .page-header {
        position: relative;
        background: linear-gradient(rgba(139, 111, 71, 0.8), rgba(121, 85, 61, 0.8)), 
                    url('https://images.unsplash.com/photo-1556742049-0cfed4f6a45d?w=1600') center/cover;
        padding: 120px 0 80px;
        color: white;
        margin-top: 56px;
    }
    
    .breadcrumb-custom {
        background: transparent;
        padding: 0;
        margin-bottom: 15px;
    }
    
    .breadcrumb-custom a {
        color: rgba(255,255,255,0.8);
        text-decoration: none;
    }
    
    .breadcrumb-custom a:hover {
        color: white;
    }

    /* Features Section */
    .features-section {
        padding: 80px 0;
        background: white;
    }

    .feature-card {
        background: linear-gradient(135deg, #FFF8F0 0%, #F5E6D3 100%);
        padding: 40px 30px;
        border-radius: 20px;
        text-align: center;
        transition: all 0.3s ease;
        height: 100%;
        border: 2px solid #E8D5C4;
    }

    .feature-card:hover {
        transform: translateY(-10px);
        box-shadow: 0 15px 35px rgba(139, 111, 71, 0.2);
        border-color: #C9A57B;
    }

    .feature-icon {
        width: 100px;
        height: 100px;
        margin: 0 auto 25px;
        background: linear-gradient(135deg, #C9A57B 0%, #A0826D 100%);
        border-radius: 50%;
        display: flex;
        align-items: center;
        justify-content: center;
        transition: all 0.3s ease;
    }

    .feature-card:hover .feature-icon {
        transform: scale(1.1) rotate(5deg);
        box-shadow: 0 10px 25px rgba(201, 165, 123, 0.4);
    }

    .feature-icon i {
        font-size: 2.5rem;
        color: white;
    }

    .feature-title {
        font-size: 1.5rem;
        font-weight: 700;
        color: #8B6F47;
        margin-bottom: 15px;
    }

    .feature-text {
        color: #666;
        font-size: 1rem;
        line-height: 1.8;
        margin: 0;
    }

    /* Contact Section */
    .contact-cta-section {
        background: linear-gradient(135deg, #8B6F47 0%, #79553D 100%);
        padding: 80px 0;
        color: white;
    }

    .contact-card {
        background: rgba(255, 255, 255, 0.1);
        backdrop-filter: blur(10px);
        border: 2px solid rgba(255, 255, 255, 0.2);
        border-radius: 20px;
        padding: 40px;
        text-align: center;
        transition: all 0.3s ease;
    }

    .contact-card:hover {
        background: rgba(255, 255, 255, 0.15);
        transform: translateY(-5px);
    }

    .contact-icon {
        width: 80px;
        height: 80px;
        margin: 0 auto 20px;
        background: rgba(255, 255, 255, 0.2);
        border-radius: 50%;
        display: flex;
        align-items: center;
        justify-content: center;
    }

    .contact-icon i {
        font-size: 2rem;
        color: white;
    }

    .contact-title {
        font-size: 1.25rem;
        font-weight: 600;
        margin-bottom: 10px;
    }

    .contact-info {
        font-size: 1.1rem;
        margin-bottom: 0;
    }

    /* FAQ Section */
    .faq-section {
        padding: 80px 0;
        background: #FFF8F0;
    }

    .faq-item {
        background: white;
        border-radius: 15px;
        margin-bottom: 20px;
        overflow: hidden;
        border: 2px solid #E8D5C4;
        transition: all 0.3s ease;
    }

    .faq-item:hover {
        border-color: #C9A57B;
        box-shadow: 0 5px 15px rgba(139, 111, 71, 0.1);
    }

    .faq-question {
        padding: 25px 30px;
        cursor: pointer;
        display: flex;
        justify-content: space-between;
        align-items: center;
        background: linear-gradient(135deg, #FFF8F0 0%, white 100%);
        transition: all 0.3s ease;
    }

    .faq-question:hover {
        background: linear-gradient(135deg, #F5E6D3 0%, #FFF8F0 100%);
    }

    .faq-question h5 {
        margin: 0;
        color: #8B6F47;
        font-weight: 600;
        font-size: 1.1rem;
    }

    .faq-question i {
        color: #C9A57B;
        font-size: 1.2rem;
        transition: transform 0.3s ease;
    }

    .faq-question.active i {
        transform: rotate(180deg);
    }

    .faq-answer {
        padding: 0 30px;
        max-height: 0;
        overflow: hidden;
        transition: all 0.3s ease;
    }

    .faq-answer.active {
        padding: 20px 30px;
        max-height: 500px;
    }

    .faq-answer p {
        color: #666;
        line-height: 1.8;
        margin: 0;
    }

    .contact-card {
    cursor: pointer;
    transition: transform .3s ease, box-shadow .3s ease;
}

    .contact-card:hover {
        transform: translateY(-6px);
        box-shadow: 0 12px 25px rgba(0,0,0,0.15);
    }

    /* Bikin WhatsApp text putih seperti Email */
    .contact-card,
    .contact-card h4,
    .contact-card p {
        color: white;
    }

    /* Hilangkan efek link default */
    .contact-card a,
    a .contact-card {
        color: inherit;
        text-decoration: none;
    }


    @media (max-width: 768px) {
        .service-card-large {
            height: 400px;
        }
        
        .service-large-title {
            font-size: 1.75rem;
        }
        
        .service-large-text {
            font-size: 0.95rem;
        }
        
        .feature-icon {
            width: 80px;
            height: 80px;
        }
        
        .feature-icon i {
            font-size: 2rem;
        }
    }
</style>
@endpush

@section('content')
    <!-- Page Header -->
    <section class="page-header">
        <div class="container">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb breadcrumb-custom">
                    <li class="breadcrumb-item"><a href="{{ url('/profile/welcome') }}">Home</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Customer Service</li>
                </ol>
            </nav>
            <h1 class="display-4 fw-bold">Layanan Pelanggan</h1>
            <p class="lead">Kami siap membantu Anda dengan pelayanan terbaik</p>
        </div>
    </section>

    <!-- Features Section -->
    <section class="features-section">
        <div class="container">
            <div class="text-center mb-5">
                <h2 class="section-title" style="color: #8B6F47; font-size: 2.5rem; font-weight: 700;">Keunggulan Layanan Kami</h2>
                <p class="text-muted mx-auto" style="max-width: 700px; font-size: 1.1rem;">
                    Mengapa pelanggan memilih MilkeyBakery
                </p>
            </div>

            <div class="row g-4">
                <!-- Feature 1 -->
                <div class="col-md-6 col-lg-3">
                    <div class="feature-card">
                        <div class="feature-icon">
                            <i class="fas fa-birthday-cake"></i>
                        </div>
                        <h4 class="feature-title">Custom Orders</h4>
                        <p class="feature-text">Buat kue custom sesuai tema dan keinginan Anda untuk acara spesial</p>
                    </div>
                </div>

                <!-- Feature 2 -->
                <div class="col-md-6 col-lg-3">
                    <div class="feature-card">
                        <div class="feature-icon">
                            <i class="fas fa-clock"></i>
                        </div>
                        <h4 class="feature-title">Pre-Order</h4>
                        <p class="feature-text">Pesan di muka untuk memastikan produk favorit Anda selalu tersedia</p>
                    </div>
                </div>

                <!-- Feature 3 -->
                <div class="col-md-6 col-lg-3">
                    <div class="feature-card">
                        <div class="feature-icon">
                            <i class="fas fa-gift"></i>
                        </div>
                        <h4 class="feature-title">Gift Packaging</h4>
                        <p class="feature-text">Kemasan menarik untuk hadiah spesial orang terkasih Anda</p>
                    </div>
                </div>

                <!-- Feature 4 -->
                <div class="col-md-6 col-lg-3">
                    <div class="feature-card">
                        <div class="feature-icon">
                            <i class="fas fa-calendar-check"></i>
                        </div>
                        <h4 class="feature-title">Event Catering</h4>
                        <p class="feature-text">Layanan catering untuk acara pernikahan, ulang tahun, dan corporate</p>
                    </div>
                </div>

                <!-- Feature 5 -->
                <div class="col-md-6 col-lg-3">
                    <div class="feature-card">
                        <div class="feature-icon">
                            <i class="fas fa-certificate"></i>
                        </div>
                        <h4 class="feature-title">Quality Guarantee</h4>
                        <p class="feature-text">Jaminan 100% fresh dan berkualitas premium untuk setiap produk</p>
                    </div>
                </div>

                <!-- Feature 6 -->
                <div class="col-md-6 col-lg-3">
                    <div class="feature-card">
                        <div class="feature-icon">
                            <i class="fas fa-headset"></i>
                        </div>
                        <h4 class="feature-title">24/7 Support</h4>
                        <p class="feature-text">Tim customer service kami siap membantu Anda kapan saja</p>
                    </div>
                </div>

                <!-- Feature 7 -->
                <div class="col-md-6 col-lg-3">
                    <div class="feature-card">
                        <div class="feature-icon">
                            <i class="fas fa-shipping-fast"></i>
                        </div>
                        <h4 class="feature-title">Fast Delivery</h4>
                        <p class="feature-text">Pengiriman cepat dan aman ke seluruh area Surabaya</p>
                    </div>
                </div>

                <!-- Feature 8 -->
                <div class="col-md-6 col-lg-3">
                    <div class="feature-card">
                        <div class="feature-icon">
                            <i class="fas fa-undo-alt"></i>
                        </div>
                        <h4 class="feature-title">Easy Returns</h4>
                        <p class="feature-text">Proses pengembalian mudah jika produk tidak sesuai harapan</p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- FAQ Section -->
    <section class="faq-section">
        <div class="container">
            <div class="text-center mb-5">
                <h2 class="section-title" style="color: #8B6F47; font-size: 2.5rem; font-weight: 700;">Frequently Asked Questions</h2>
                <p class="text-muted mx-auto" style="max-width: 700px; font-size: 1.1rem;">
                    Pertanyaan yang sering diajukan
                </p>
            </div>

            <div class="row justify-content-center">
                <div class="col-lg-10">
                    <!-- FAQ Item 1 -->
                    <div class="faq-item">
                        <div class="faq-question" onclick="toggleFAQ(this)">
                            <h5>Bagaimana cara memesan kue custom?</h5>
                            <i class="fas fa-chevron-down"></i>
                        </div>
                        <div class="faq-answer">
                            <p>Anda dapat memesan kue custom dengan menghubungi customer service kami melalui WhatsApp, telepon, atau datang langsung ke toko. Berikan detail tema, ukuran, dan desain yang Anda inginkan minimal 3 hari sebelum acara.</p>
                        </div>
                    </div>

                    <!-- FAQ Item 2 -->
                    <div class="faq-item">
                        <div class="faq-question" onclick="toggleFAQ(this)">
                            <h5>Berapa lama waktu pengiriman?</h5>
                            <i class="fas fa-chevron-down"></i>
                        </div>
                        <div class="faq-answer">
                            <p>Untuk area Surabaya, pengiriman biasanya memakan waktu 1-2 jam tergantung lokasi. Kami menggunakan kurir internal yang berpengalaman untuk memastikan produk sampai dengan aman dan tetap segar.</p>
                        </div>
                    </div>

                    <!-- FAQ Item 3 -->
                    <div class="faq-item">
                        <div class="faq-question" onclick="toggleFAQ(this)">
                            <h5>Apakah ada minimum order untuk delivery?</h5>
                            <i class="fas fa-chevron-down"></i>
                        </div>
                        <div class="faq-answer">
                            <p>Ya, minimum order untuk layanan delivery adalah Rp 100.000. Untuk pembelian di bawah jumlah tersebut, Anda dapat melakukan pick up langsung di toko kami.</p>
                        </div>
                    </div>

                    <!-- FAQ Item 4 -->
                    <div class="faq-item">
                        <div class="faq-question" onclick="toggleFAQ(this)">
                            <h5>Bagaimana jika saya ingin membatalkan pesanan?</h5>
                            <i class="fas fa-chevron-down"></i>
                        </div>
                        <div class="faq-answer">
                            <p>Pembatalan dapat dilakukan maksimal 24 jam sebelum waktu pengiriman/pengambilan. Untuk pembatalan kurang dari 24 jam, akan dikenakan biaya pembatalan sebesar 50% dari total pesanan.</p>
                        </div>
                    </div>

                    <!-- FAQ Item 5 -->
                    <div class="faq-item">
                        <div class="faq-question" onclick="toggleFAQ(this)">
                            <h5>Apakah produk mengandung bahan pengawet?</h5>
                            <i class="fas fa-chevron-down"></i>
                        </div>
                        <div class="faq-answer">
                            <p>Tidak, semua produk kami dibuat fresh daily tanpa bahan pengawet. Kami menggunakan bahan-bahan berkualitas premium dan alami. Produk sebaiknya dikonsumsi dalam 2-3 hari untuk kualitas terbaik.</p>
                        </div>
                    </div>

                    <!-- FAQ Item 6 -->
                    <div class="faq-item">
                        <div class="faq-question" onclick="toggleFAQ(this)">
                            <h5>Apakah tersedia layanan catering untuk event?</h5>
                            <i class="fas fa-chevron-down"></i>
                        </div>
                        <div class="faq-answer">
                            <p>Ya, kami menyediakan layanan catering untuk berbagai acara seperti pernikahan, ulang tahun, gathering, dan acara corporate. Silakan hubungi kami untuk konsultasi dan penawaran khusus.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Contact CTA Section -->
    <section id="contact" class="contact-cta-section">
        <div class="container">
            <div class="text-center mb-5">
                <h2 style="color: white; font-size: 2.5rem; font-weight: 700;">Hubungi Kami</h2>
                <p style="color: rgba(255,255,255,0.9); font-size: 1.1rem;">
                    Tim kami siap membantu Anda
                </p>
            </div>

            <div class="row g-4 justify-content-center">

                <!-- Contact Card 1 -->
                <div class="col-md-4">
                    <a 
                        href="https://wa.me/6285117149372" 
                        target="_blank" 
                        class="text-decoration-none"
                    >
                        <div class="contact-card">
                            <div class="contact-icon">
                                <i class="fab fa-whatsapp"></i>
                            </div>
                            <h4 class="contact-title">WhatsApp</h4>
                            <p class="contact-info">+62 851-1714-9372</p>
                        </div>
                    </a>
                </div>


                <!-- Contact Card 2 -->
                <div class="col-md-4">
                    <div class="contact-card">
                        <div class="contact-icon">
                            <i class="fas fa-envelope"></i>
                        </div>
                        <h4 class="contact-title">Email</h4>
                        <p class="contact-info">info@milkeybakery.com</p>
                    </div>
                </div>
            </div>

            <div class="text-center mt-5">
                <a href="{{ url('/profile/welcome') }}" class="btn btn-service btn-lg">
                    <i class="fas fa-home me-2"></i>Kembali ke Home
                </a>
            </div>
        </div>
    </section>
@endsection

@push('scripts')
<script>
    function toggleFAQ(element) {
        const answer = element.nextElementSibling;
        const allQuestions = document.querySelectorAll('.faq-question');
        const allAnswers = document.querySelectorAll('.faq-answer');
        
        // Close all other FAQs
        allQuestions.forEach(q => {
            if (q !== element) {
                q.classList.remove('active');
            }
        });
        allAnswers.forEach(a => {
            if (a !== answer) {
                a.classList.remove('active');
            }
        });
        
        // Toggle current FAQ
        element.classList.toggle('active');
        answer.classList.toggle('active');
    }
</script>
@endpush