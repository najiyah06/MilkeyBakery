<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>MilkyBakery - Delicious Cakes & Pastries</title>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.0/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/custom.css') }}">
</head>
<body>
    <!-- Navigation -->
    <nav class="navbar navbar-expand-lg navbar-dark sticky-top">
        <div class="container">
            <a class="navbar-brand" href="#"><i class="fas fa-birthday-cake"></i> MilkyBakery</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto align-items-center">
                    <li class="nav-item">
                        <a class="nav-link" href="#products">Products</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#news">News & Promo</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#about">About Us</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#faq">FAQ</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#" data-bs-toggle="modal" data-bs-target="#favoritesModal">
                            <i class="fas fa-heart"></i> Favorites
                        </a>
                    </li>
                    <li class="nav-item position-relative">
                        <a class="nav-link" href="#" data-bs-toggle="modal" data-bs-target="#cartModal">
                            <i class="fas fa-shopping-cart"></i> Cart
                            <span class="badge badge-cart" id="cartCount">0</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#" id="authBtn" data-bs-toggle="modal" data-bs-target="#loginModal">
                            <i class="fas fa-user"></i> <span id="authText">Login</span>
                        </a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <!-- Hero Section -->
    <div class="hero" id="home">
        <div class="container">
            <h1>Welcome to MilkyBakery</h1>
            <p>Freshly Baked Cakes Made with Love</p>
            <div class="mt-4">
                <input type="text" class="form-control search-bar d-inline-block w-50" id="searchInput" placeholder="Search for cakes...">
            </div>
        </div>
    </div>

    <!-- Category Filter -->
    <div class="container">
        <div class="category-filter">
            <h5 class="mb-3"><i class="fas fa-filter"></i> Filter by Category</h5>
            <button class="btn btn-outline-primary me-2 mb-2 category-btn active" data-category="all">All</button>
            <button class="btn btn-outline-primary me-2 mb-2 category-btn" data-category="birthday">Birthday Cakes</button>
            <button class="btn btn-outline-primary me-2 mb-2 category-btn" data-category="wedding">Wedding Cakes</button>
            <button class="btn btn-outline-primary me-2 mb-2 category-btn" data-category="cupcakes">Cupcakes</button>
            <button class="btn btn-outline-primary me-2 mb-2 category-btn" data-category="special">Special Occasions</button>
        </div>
    </div>

    <!-- Products Section -->
    <div class="container" id="products">
        <h2 class="text-center mb-5" style="color: var(--primary); font-weight: bold;">Our Delicious Cakes</h2>
        <div class="row" id="productContainer">
            <!-- Products will be loaded here -->
        </div>
    </div>

    <!-- Choose Your Moment Section -->
    <div class="container mt-5" id="moments">
        <h2 class="text-center mb-5" style="color: var(--primary); font-weight: bold;">Choose Your Moment</h2>
        <p class="text-center mb-5">Every celebration deserves the perfect cake. Tell us about your special moment!</p>
        <div class="row">
            <div class="col-md-4 mb-4">
                <div class="moment-card" onclick="filterByMoment('birthday')">
                    <i class="fas fa-birthday-cake"></i>
                    <h4>Birthday Party</h4>
                    <p>Make birthdays unforgettable with our custom birthday cakes</p>
                </div>
            </div>
            <div class="col-md-4 mb-4">
                <div class="moment-card" onclick="filterByMoment('wedding')">
                    <i class="fas fa-heart"></i>
                    <h4>Wedding</h4>
                    <p>Elegant wedding cakes for your special day</p>
                </div>
            </div>
            <div class="col-md-4 mb-4">
                <div class="moment-card" onclick="filterByMoment('anniversary')">
                    <i class="fas fa-gift"></i>
                    <h4>Anniversary</h4>
                    <p>Celebrate love with our romantic anniversary cakes</p>
                </div>
            </div>
            <div class="col-md-4 mb-4">
                <div class="moment-card" onclick="filterByMoment('graduation')">
                    <i class="fas fa-graduation-cap"></i>
                    <h4>Graduation</h4>
                    <p>Honor achievements with special graduation cakes</p>
                </div>
            </div>
            <div class="col-md-4 mb-4">
                <div class="moment-card" onclick="filterByMoment('baby')">
                    <i class="fas fa-baby"></i>
                    <h4>Baby Shower</h4>
                    <p>Welcome new life with adorable baby shower cakes</p>
                </div>
            </div>
            <div class="col-md-4 mb-4">
                <div class="moment-card" onclick="filterByMoment('corporate')">
                    <i class="fas fa-briefcase"></i>
                    <h4>Corporate Events</h4>
                    <p>Professional cakes for business celebrations</p>
                </div>
            </div>
        </div>
    </div>

    <!-- News & Promo Section -->
    <div class="container mt-5" id="news">
        <h2 class="text-center mb-5" style="color: var(--primary); font-weight: bold;">News & Promotions</h2>
        <div class="row">
            <div class="col-md-6 mb-4">
                <div class="news-card position-relative">
                    <span class="promo-badge">HOT DEAL!</span>
                    <div style="background: linear-gradient(135deg, #ffd4e5 0%, #ffe8f0 100%); height: 200px; display: flex; align-items: center; justify-content: center; font-size: 5rem;">
                        🎉
                    </div>
                    <div class="p-4">
                        <h4>Buy 2 Get 1 Free!</h4>
                        <p class="text-muted"><i class="fas fa-calendar"></i> Valid until October 15, 2025</p>
                        <p>Purchase any two large cakes and get a small cake absolutely free! Perfect for parties and celebrations.</p>
                        <button class="btn btn-primary">Learn More</button>
                    </div>
                </div>
            </div>
            <div class="col-md-6 mb-4">
                <div class="news-card position-relative">
                    <span class="promo-badge" style="background: #ffa500;">NEW!</span>
                    <div style="background: linear-gradient(135deg, #ffd4e5 0%, #ffe8f0 100%); height: 200px; display: flex; align-items: center; justify-content: center; font-size: 5rem;">
                        🍰
                    </div>
                    <div class="p-4">
                        <h4>New Seasonal Flavors</h4>
                        <p class="text-muted"><i class="fas fa-calendar"></i> September 2025</p>
                        <p>Try our new autumn collection: Pumpkin Spice, Maple Walnut, and Apple Cinnamon cakes now available!</p>
                        <button class="btn btn-primary">Explore</button>
                    </div>
                </div>
            </div>
            <div class="col-md-6 mb-4">
                <div class="news-card">
                    <div style="background: linear-gradient(135deg, #ffd4e5 0%, #ffe8f0 100%); height: 200px; display: flex; align-items: center; justify-content: center; font-size: 5rem;">
                        💝
                    </div>
                    <div class="p-4">
                        <h4>Loyalty Program Launch</h4>
                        <p class="text-muted"><i class="fas fa-calendar"></i> September 1, 2025</p>
                        <p>Join our new loyalty program and earn points with every purchase. Redeem for free cakes and exclusive discounts!</p>
                        <button class="btn btn-outline-primary">Join Now</button>
                    </div>
                </div>
            </div>
            <div class="col-md-6 mb-4">
                <div class="news-card">
                    <div style="background: linear-gradient(135deg, #ffd4e5 0%, #ffe8f0 100%); height: 200px; display: flex; align-items: center; justify-content: center; font-size: 5rem;">
                        📦
                    </div>
                    <div class="p-4">
                        <h4>Free Delivery on Orders Over $50</h4>
                        <p class="text-muted"><i class="fas fa-calendar"></i> Ongoing</p>
                        <p>Enjoy free delivery service on all orders above $50. We deliver fresh cakes right to your doorstep!</p>
                        <button class="btn btn-outline-primary">Order Now</button>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Social Media Feed Section -->
    <div class="container mt-5" id="social">
        <h2 class="text-center mb-5" style="color: var(--primary); font-weight: bold;">Follow Us on Social Media</h2>
        <p class="text-center mb-5">See what our customers are saying and share your MilkyBakery moments!</p>
        <div class="row">
            <div class="col-md-4 mb-4">
                <div class="social-feed">
                    <div class="d-flex align-items-center mb-3">
                        <div style="width: 50px; height: 50px; background: var(--primary); border-radius: 50%; display: flex; align-items: center; justify-content: center; color: white; font-size: 1.5rem; margin-right: 15px;">
                            <i class="fab fa-instagram"></i>
                        </div>
                        <div>
                            <strong>@milkybakery</strong>
                            <p class="mb-0 text-muted small">2 hours ago</p>
                        </div>
                    </div>
                    <p>Fresh strawberry dream cake ready for delivery! 🍓✨ Order yours today! #MilkyBakery #FreshBaked</p>
                    <div style="background: linear-gradient(135deg, #ffd4e5 0%, #ffe8f0 100%); height: 200px; border-radius: 10px; display: flex; align-items: center; justify-content: center; font-size: 4rem;">
                        🍓🎂
                    </div>
                    <div class="mt-3">
                        <i class="fas fa-heart text-danger"></i> 1,234 likes
                        <i class="fas fa-comment ms-3"></i> 89 comments
                    </div>
                </div>
            </div>
            <div class="col-md-4 mb-4">
                <div class="social-feed">
                    <div class="d-flex align-items-center mb-3">
                        <div style="width: 50px; height: 50px; background: #1DA1F2; border-radius: 50%; display: flex; align-items: center; justify-content: center; color: white; font-size: 1.5rem; margin-right: 15px;">
                            <i class="fab fa-twitter"></i>
                        </div>
                        <div>
                            <strong>@MilkyBakery</strong>
                            <p class="mb-0 text-muted small">5 hours ago</p>
                        </div>
                    </div>
                    <p>Weekend special! 20% off on all chocolate cakes 🍫 Visit us or order online. Limited time only!</p>
                    <div style="background: linear-gradient(135deg, #8b4513 0%, #d2691e 100%); height: 200px; border-radius: 10px; display: flex; align-items: center; justify-content: center; font-size: 4rem; color: white;">
                        🍫
                    </div>
                    <div class="mt-3">
                        <i class="fas fa-retweet text-success"></i> 456 retweets
                        <i class="fas fa-heart text-danger ms-3"></i> 892 likes
                    </div>
                </div>
            </div>
            <div class="col-md-4 mb-4">
                <div class="social-feed">
                    <div class="d-flex align-items-center mb-3">
                        <div style="width: 50px; height: 50px; background: #4267B2; border-radius: 50%; display: flex; align-items: center; justify-content: center; color: white; font-size: 1.5rem; margin-right: 15px;">
                            <i class="fab fa-facebook"></i>
                        </div>
                        <div>
                            <strong>MilkyBakery</strong>
                            <p class="mb-0 text-muted small">1 day ago</p>
                        </div>
                    </div>
                    <p>Thank you Sarah for sharing this beautiful moment! 💕 We're honored to be part of your special day. #CustomerLove</p>
                    <div style="background: linear-gradient(135deg, #ffb6c1 0%, #ffe4e9 100%); height: 200px; border-radius: 10px; display: flex; align-items: center; justify-content: center; font-size: 4rem;">
                        💕🎉
                    </div>
                    <div class="mt-3">
                        <i class="fas fa-thumbs-up text-primary"></i> 2,156 likes
                        <i class="fas fa-comment ms-3"></i> 234 comments
                    </div>
                </div>
            </div>
        </div>
        <div class="text-center mt-4">
            <h5 class="mb-3">Join Our Community!</h5>
            <a href="#" class="btn btn-outline-primary me-2 mb-2"><i class="fab fa-facebook"></i> Facebook</a>
            <a href="#" class="btn btn-outline-primary me-2 mb-2"><i class="fab fa-instagram"></i> Instagram</a>
            <a href="#" class="btn btn-outline-primary me-2 mb-2"><i class="fab fa-twitter"></i> Twitter</a>
            <a href="#" class="btn btn-outline-primary me-2 mb-2"><i class="fab fa-tiktok"></i> TikTok</a>
            <a href="#" class="btn btn-outline-primary me-2 mb-2"><i class="fab fa-pinterest"></i> Pinterest</a>
        </div>
    </div>

    <!-- About Us Section -->
    <div class="container mt-5" id="about">
        <div class="row align-items-center">
            <div class="col-md-6 mb-4">
                <div style="background: linear-gradient(135deg, #ffd4e5 0%, #ffe8f0 100%); height: 400px; border-radius: 20px; display: flex; align-items: center; justify-content: center; font-size: 8rem;">
                    👨‍🍳
                </div>
            </div>
            <div class="col-md-6 mb-4">
                <h2 style="color: var(--primary); font-weight: bold;">About MilkyBakery</h2>
                <p class="lead">Baking happiness since 2020</p>
                <p>MilkyBakery was founded with a simple mission: to create the most delicious and beautiful cakes that make every celebration special. What started as a small home kitchen has grown into a beloved local bakery serving hundreds of happy customers.</p>
                <p>We use only the finest ingredients, sourced locally whenever possible. Our master bakers combine traditional techniques with creative innovation to craft cakes that not only look stunning but taste absolutely divine.</p>
                <p>Every cake is made fresh to order, ensuring maximum quality and freshness. We take pride in our attention to detail and our commitment to exceeding your expectations.</p>
                <div class="mt-4">
                    <h5>Our Values:</h5>
                    <ul>
                        <li><strong>Quality First:</strong> Premium ingredients, no shortcuts</li>
                        <li><strong>Customer Happiness:</strong> Your satisfaction is our priority</li>
                        <li><strong>Creativity:</strong> Custom designs tailored to your vision</li>
                        <li><strong>Sustainability:</strong> Eco-friendly packaging and practices</li>
                    </ul>
                </div>
            </div>
        </div>
        <div class="row mt-5 text-center">
            <div class="col-md-3 mb-4">
                <div class="moment-card">
                    <h2 style="color: var(--primary); font-size: 3rem; font-weight: bold;">5000+</h2>
                    <p>Happy Customers</p>
                </div>
            </div>
            <div class="col-md-3 mb-4">
                <div class="moment-card">
                    <h2 style="color: var(--primary); font-size: 3rem; font-weight: bold;">500+</h2>
                    <p>Cake Designs</p>
                </div>
            </div>
            <div class="col-md-3 mb-4">
                <div class="moment-card">
                    <h2 style="color: var(--primary); font-size: 3rem; font-weight: bold;">5★</h2>
                    <p>Average Rating</p>
                </div>
            </div>
            <div class="col-md-3 mb-4">
                <div class="moment-card">
                    <h2 style="color: var(--primary); font-size: 3rem; font-weight: bold;">50+</h2>
                    <p>Awards Won</p>
                </div>
            </div>
        </div>
    </div>

    <!-- FAQ Section -->
    <div class="container mt-5 mb-5" id="faq">
        <h2 class="text-center mb-5" style="color: var(--primary); font-weight: bold;">Frequently Asked Questions</h2>
        <div class="accordion" id="faqAccordion">
            <div class="accordion-item">
                <h2 class="accordion-header">
                    <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#faq1">
                        How far in advance should I order my cake?
                    </button>
                </h2>
                <div id="faq1" class="accordion-collapse collapse show" data-bs-parent="#faqAccordion">
                    <div class="accordion-body">
                        We recommend ordering at least 3-5 days in advance for custom cakes to ensure we have enough time to create your perfect design. For simple cakes, 24-48 hours notice is sufficient. During busy seasons (holidays, weekends), please order at least one week ahead.
                    </div>
                </div>
            </div>
            <div class="accordion-item">
                <h2 class="accordion-header">
                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#faq2">
                        Do you offer delivery services?
                    </button>
                </h2>
                <div id="faq2" class="accordion-collapse collapse" data-bs-parent="#faqAccordion">
                    <div class="accordion-body">
                        Yes! We offer delivery services within a 25-mile radius. Delivery fee is $5 for orders under $50, and FREE for orders over $50. We ensure your cake arrives fresh and in perfect condition. You can select your preferred delivery date and time during checkout.
                    </div>
                </div>
            </div>
            <div class="accordion-item">
                <h2 class="accordion-header">
                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#faq3">
                        Can I customize the cake design?
                    </button>
                </h2>
                <div id="faq3" class="accordion-collapse collapse" data-bs-parent="#faqAccordion">
                    <div class="accordion-body">
                        Absolutely! We specialize in custom designs. You can choose the shape, size, flavors, colors, toppings, and add a personal message. If you have a specific design in mind, feel free to contact us with reference images and we'll work with you to bring your vision to life.
                    </div>
                </div>
            </div>
            <div class="accordion-item">
                <h2 class="accordion-header">
                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#faq4">
                        Do you accommodate dietary restrictions?
                    </button>
                </h2>
                <div id="faq4" class="accordion-collapse collapse" data-bs-parent="#faqAccordion">
                    <div class="accordion-body">
                        Yes! We offer options for various dietary needs including gluten-free, vegan, sugar-free, and nut-free cakes. Please specify your requirements when ordering, and our bakers will create a delicious cake that meets your needs. Note: Additional charges may apply for specialty ingredients.
                    </div>
                </div>
            </div>
            <div class="accordion-item">
                <h2 class="accordion-header">
                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#faq5">
                        What is your cancellation policy?
                    </button>
                </h2>
                <div id="faq5" class="accordion-collapse collapse" data-bs-parent="#faqAccordion">
                    <div class="accordion-body">
                        Cancellations made 48 hours or more before the scheduled delivery/pickup time will receive a full refund. Cancellations made within 24-48 hours will receive a 50% refund. Unfortunately, we cannot offer refunds for cancellations made less than 24 hours before delivery as ingredients have been purchased and preparation has begun.
                    </div>
                </div>
            </div>
            <div class="accordion-item">
                <h2 class="accordion-header">
                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#faq6">
                        How should I store my cake?
                    </button>
                </h2>
                <div id="faq6" class="accordion-collapse collapse" data-bs-parent="#faqAccordion">
                    <div class="accordion-body">
                        Cakes with buttercream frosting can be stored at room temperature for up to 2 days, or refrigerated for up to 5 days. Cakes with cream cheese frosting or fresh fruit should be refrigerated. Remove the cake from the refrigerator 30-60 minutes before serving for best taste. Always store cakes in an airtight container.
                    </div>
                </div>
            </div>
            <div class="accordion-item">
                <h2 class="accordion-header">
                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#faq7">
                        What payment methods do you accept?
                    </button>
                </h2>
                <div id="faq7" class="accordion-collapse collapse" data-bs-parent="#faqAccordion">
                    <div class="accordion-body">
                        We accept all major credit/debit cards (Visa, Mastercard, American Express), PayPal, and cash on delivery. Online payments are processed securely through our payment gateway. For large orders or corporate events, we also accept bank transfers.
                    </div>
                </div>
            </div>
            <div class="accordion-item">
                <h2 class="accordion-header">
                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#faq8">
                        Can I see a sample before ordering?
                    </button>
                </h2>
                <div id="faq8" class="accordion-collapse collapse" data-bs-parent="#faqAccordion">
                    <div class="accordion-body">
                        We offer cake tasting sessions by appointment for wedding and large event cakes. During the tasting, you can sample different flavors and discuss design options with our bakers. Please contact us to schedule a tasting session. A small fee may apply which will be credited toward your final order.
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Login Modal -->
    <div class="modal fade" id="loginModal" tabindex="-1">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Login to MilkyBakery</h5>
                    <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal"></button>
                </div>
                <div class="modal-body">
                    <form id="loginForm">
                        <div class="mb-3">
                            <label class="form-label">Email</label>
                            <input type="email" class="form-control" required>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Password</label>
                            <input type="password" class="form-control" required>
                        </div>
                        <button type="submit" class="btn btn-primary w-100">Login</button>
                    </form>
                    <hr>
                    <p class="text-center mb-0">Don't have an account? <a href="#" data-bs-toggle="modal" data-bs-target="#registerModal" data-bs-dismiss="modal">Register</a></p>
                </div>
            </div>
        </div>
    </div>

    <!-- Register Modal -->
    <div class="modal fade" id="registerModal" tabindex="-1">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Register</h5>
                    <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal"></button>
                </div>
                <div class="modal-body">
                    <form id="registerForm">
                        <div class="mb-3">
                            <label class="form-label">Full Name</label>
                            <input type="text" class="form-control" required>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Email</label>
                            <input type="email" class="form-control" required>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Password</label>
                            <input type="password" class="form-control" required>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Phone Number</label>
                            <input type="tel" class="form-control" required>
                        </div>
                        <button type="submit" class="btn btn-primary w-100">Register</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <!-- Customize Cake Modal -->
    <div class="modal fade" id="customizeModal" tabindex="-1">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Customize Your Cake</h5>
                    <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal"></button>
                </div>
                <div class="modal-body">
                    <div class="mb-4">
                        <h6>Selected: <span id="selectedCakeName"></span></h6>
                        <p class="text-muted">Base Price: $<span id="selectedCakePrice"></span></p>
                    </div>
                    
                    <div class="mb-4">
                        <label class="form-label fw-bold">Cake Shape</label>
                        <div id="shapeOptions">
                            <span class="shape-option" data-shape="round" data-price="0">Round (+$0)</span>
                            <span class="shape-option" data-shape="square" data-price="5">Square (+$5)</span>
                            <span class="shape-option" data-shape="heart" data-price="10">Heart (+$10)</span>
                            <span class="shape-option" data-shape="rectangle" data-price="8">Rectangle (+$8)</span>
                        </div>
                    </div>
                    
                    <div class="mb-4">
                        <label class="form-label fw-bold">Flavor</label>
                        <select class="form-select" id="flavorSelect">
                            <option value="vanilla" data-price="0">Vanilla (+$0)</option>
                            <option value="chocolate" data-price="3">Chocolate (+$3)</option>
                            <option value="strawberry" data-price="3">Strawberry (+$3)</option>
                            <option value="red-velvet" data-price="5">Red Velvet (+$5)</option>
                            <option value="lemon" data-price="4">Lemon (+$4)</option>
                            <option value="carrot" data-price="4">Carrot (+$4)</option>
                        </select>
                    </div>
                    
                    <div class="mb-4">
                        <label class="form-label fw-bold">Cream Color</label>
                        <div>
                            <span class="color-circle" data-color="white" style="background: white; border: 2px solid #ddd;"></span>
                            <span class="color-circle" data-color="pink" style="background: #ffb3d9;"></span>
                            <span class="color-circle" data-color="blue" style="background: #b3d9ff;"></span>
                            <span class="color-circle" data-color="yellow" style="background: #fff4b3;"></span>
                            <span class="color-circle" data-color="purple" style="background: #d9b3ff;"></span>
                            <span class="color-circle" data-color="green" style="background: #b3ffcc;"></span>
                        </div>
                    </div>
                    
                    <div class="mb-4">
                        <label class="form-label fw-bold">Toppings (Multiple Selection)</label>
                        <div id="toppingOptions">
                            <span class="topping-option" data-topping="strawberries" data-price="3">Strawberries (+$3)</span>
                            <span class="topping-option" data-topping="chocolate-chips" data-price="2">Chocolate Chips (+$2)</span>
                            <span class="topping-option" data-topping="sprinkles" data-price="1">Sprinkles (+$1)</span>
                            <span class="topping-option" data-topping="nuts" data-price="2">Nuts (+$2)</span>
                            <span class="topping-option" data-topping="berries" data-price="4">Mixed Berries (+$4)</span>
                            <span class="topping-option" data-topping="flowers" data-price="8">Edible Flowers (+$8)</span>
                        </div>
                    </div>
                    
                    <div class="mb-4">
                        <label class="form-label fw-bold">Custom Message</label>
                        <input type="text" class="form-control" id="customMessage" placeholder="e.g., Happy Birthday Sarah!" maxlength="50">
                        <small class="text-muted">Max 50 characters</small>
                    </div>
                    
                    <div class="mb-4">
                        <label class="form-label fw-bold">Size</label>
                        <select class="form-select" id="sizeSelect">
                            <option value="small" data-price="0">Small - 6" (Serves 4-6)</option>
                            <option value="medium" data-price="15">Medium - 8" (Serves 8-10) (+$15)</option>
                            <option value="large" data-price="30">Large - 10" (Serves 12-15) (+$30)</option>
                            <option value="xlarge" data-price="50">Extra Large - 12" (Serves 20-25) (+$50)</option>
                        </select>
                    </div>
                    
                    <div class="alert alert-info">
                        <h6>Total Price: $<span id="totalPrice">0</span></h6>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                    <button type="button" class="btn btn-primary" onclick="addToCart()">Add to Cart</button>
                </div>
            </div>
        </div>
    </div>

    <!-- Cart Modal -->
    <div class="modal fade" id="cartModal" tabindex="-1">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Shopping Cart</h5>
                    <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal"></button>
                </div>
                <div class="modal-body">
                    <div id="cartItems"></div>
                    <div class="alert alert-success mt-3">
                        <h5>Cart Total: $<span id="cartTotal">0</span></h5>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Continue Shopping</button>
                    <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#checkoutModal" data-bs-dismiss="modal">Proceed to Checkout</button>
                </div>
            </div>
        </div>
    </div>

    <!-- Favorites Modal -->
    <div class="modal fade" id="favoritesModal" tabindex="-1">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">My Favorites</h5>
                    <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal"></button>
                </div>
                <div class="modal-body">
                    <div id="favoritesItems"></div>
                </div>
            </div>
        </div>
    </div>

    <!-- Checkout Modal -->
    <div class="modal fade" id="checkoutModal" tabindex="-1">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Checkout</h5>
                    <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal"></button>
                </div>
                <div class="modal-body">
                    <form id="checkoutForm">
                        <h6 class="mb-3">Delivery Information</h6>
                        <div class="row mb-3">
                            <div class="col-md-6">
                                <label class="form-label">Full Name</label>
                                <input type="text" class="form-control" required>
                            </div>
                            <div class="col-md-6">
                                <label class="form-label">Phone Number</label>
                                <input type="tel" class="form-control" required>
                            </div>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Delivery Address</label>
                            <textarea class="form-control" rows="3" required></textarea>
                        </div>
                        <div class="row mb-3">
                            <div class="col-md-6">
                                <label class="form-label">City</label>
                                <input type="text" class="form-control" required>
                            </div>
                            <div class="col-md-6">
                                <label class="form-label">Postal Code</label>
                                <input type="text" class="form-control" required>
                            </div>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Delivery Date</label>
                            <input type="date" class="form-control" required>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Delivery Time</label>
                            <select class="form-select" required>
                                <option value="">Select time slot</option>
                                <option value="9-12">9:00 AM - 12:00 PM</option>
                                <option value="12-15">12:00 PM - 3:00 PM</option>
                                <option value="15-18">3:00 PM - 6:00 PM</option>
                                <option value="18-21">6:00 PM - 9:00 PM</option>
                            </select>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Delivery Note (Optional)</label>
                            <textarea class="form-control" rows="2" placeholder="Special instructions for delivery"></textarea>
                        </div>
                        
                        <hr>
                        
                        <h6 class="mb-3">Payment Method</h6>
                        <div class="mb-3">
                            <select class="form-select" required>
                                <option value="">Select payment method</option>
                                <option value="card">Credit/Debit Card</option>
                                <option value="paypal">PayPal</option>
                                <option value="cod">Cash on Delivery</option>
                            </select>
                        </div>
                        
                        <div class="alert alert-info">
                            <div class="d-flex justify-content-between mb-2">
                                <span>Subtotal:</span>
                                <span>$<span id="checkoutSubtotal">0</span></span>
                            </div>
                            <div class="d-flex justify-content-between mb-2">
                                <span>Delivery Fee:</span>
                                <span>$5.00</span>
                            </div>
                            <hr>
                            <div class="d-flex justify-content-between">
                                <strong>Total:</strong>
                                <strong>$<span id="checkoutTotal">0</span></strong>
                            </div>
                        </div>
                        
                        <button type="submit" class="btn btn-primary w-100">Place Order</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <!-- Footer -->
    <footer class="footer">
        <div class="container">
            <div class="row">
                <div class="col-md-4 mb-4">
                    <h5><i class="fas fa-birthday-cake"></i> MilkyBakery</h5>
                    <p>Creating delicious memories since 2020. We bake with love and the finest ingredients.</p>
                    <div class="mt-3">
                        <a href="#" class="text-white me-3"><i class="fab fa-facebook fa-2x"></i></a>
                        <a href="#" class="text-white me-3"><i class="fab fa-instagram fa-2x"></i></a>
                        <a href="#" class="text-white me-3"><i class="fab fa-twitter fa-2x"></i></a>
                    </div>
                </div>
                <div class="col-md-4 mb-4">
                    <h5>Quick Links</h5>
                    <ul class="list-unstyled">
                        <li><a href="#home" class="text-white">Home</a></li>
                        <li><a href="#products" class="text-white">Products</a></li>
                        <li><a href="#news" class="text-white">News & Promo</a></li>
                        <li><a href="#about" class="text-white">About Us</a></li>
                        <li><a href="#faq" class="text-white">FAQ</a></li>
                        <li><a href="#" class="text-white">Contact</a></li>
                    </ul>
                </div>
                <div class="col-md-4 mb-4">
                    <h5>Contact Us</h5>
                    <p><i class="fas fa-map-marker-alt"></i> 123 Bakery Street, Sweet City</p>
                    <p><i class="fas fa-phone"></i> +1 (555) 123-4567</p>
                    <p><i class="fas fa-envelope"></i> info@milkybakery.com</p>
                    <p><i class="fas fa-clock"></i> Mon-Sat: 8AM-8PM, Sun: 9AM-6PM</p>
                </div>
            </div>
            <hr style="background-color: rgba(255,255,255,0.2);">
            <div class="text-center">
                <p>&copy; 2025 MilkyBakery. All rights reserved. Made with <i class="fas fa-heart" style="color: var(--primary);"></i></p>
            </div>
        </div>
    </footer>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.0/js/bootstrap.bundle.min.js"></script>
    <script>
        // Data stored in memory
        let products = [
            {id: 1, name: "Chocolate Dream Cake", price: 45, category: "birthday", emoji: "