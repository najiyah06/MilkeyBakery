// Product Data
const products = [
    {id: 1, name: 'Milk Loaf', price: 18000, desc: 'Roti lembut susu khas Milkey'},
    {id: 2, name: 'Butter Croissant', price: 12000, desc: 'Lapisan renyah buttery'},
    {id: 3, name: 'Matcha Cake', price: 25000, desc: 'Cake matcha lembut'},
    {id: 4, name: 'Chocolate Danish', price: 15000, desc: 'Manis & flaky'},
    {id: 5, name: 'Bagel', price: 10000, desc: 'Padat & chewy'},
    {id: 6, name: 'Almond Tart', price: 22000, desc: 'Topping almond panggang'},
];

// Cart Array
let cart = [];

// Initialize App
document.addEventListener('DOMContentLoaded', function() {
    renderProducts();
    initCartModal();
    initTestimonials();
    initSmoothScroll();
});

// Render Product Cards
function renderProducts() {
    const grid = document.getElementById('productGrid');
    
    products.forEach(product => {
        const col = document.createElement('div');
        col.className = 'col-sm-6 col-lg-4';
        
        col.innerHTML = `
            <div class="product-card">
                <div class="product-image">[Gambar]</div>
                <h4>${product.name}</h4>
                <p class="desc">${product.desc}</p>
                <div class="d-flex justify-content-between align-items-center">
                    <div class="fw-semibold">Rp ${product.price.toLocaleString('id-ID')}</div>
                    <button class="btn btn-add" data-id="${product.id}">Tambah</button>
                </div>
            </div>
        `;
        
        grid.appendChild(col);
    });
    
    // Add event listeners to all "Tambah" buttons
    document.querySelectorAll('.btn-add').forEach(button => {
        button.addEventListener('click', function() {
            const productId = parseInt(this.getAttribute('data-id'));
            addToCart(productId);
        });
    });
}

// Add to Cart Function
function addToCart(productId) {
    const product = products.find(p => p.id === productId);
    
    if (product) {
        const existingItem = cart.find(item => item.id === productId);
        
        if (existingItem) {
            existingItem.qty++;
        } else {
            cart.push({...product, qty: 1});
        }
        
        updateCartUI();
        
        // Show feedback
        showToast('Item ditambahkan ke cart!');
    }
}

// Update Cart UI
function updateCartUI() {
    // Update cart count badge
    document.getElementById('cartCount').textContent = cart.length;
    
    // Update cart items in modal
    const container = document.getElementById('cartItems');
    container.innerHTML = '';
    
    if (cart.length === 0) {
        container.innerHTML = '<p class="small text-muted">Belum ada item.</p>';
        document.getElementById('cartTotal').textContent = 'Rp 0';
        return;
    }
    
    let total = 0;
    
    cart.forEach((item, index) => {
        total += item.price * item.qty;
        
        const cartItem = document.createElement('div');
        cartItem.className = 'cart-item';
        cartItem.innerHTML = `
            <div>
                <div class="fw-medium">${item.name}</div>
                <div class="small text-muted">Rp ${item.price.toLocaleString('id-ID')}</div>
            </div>
            <div class="cart-item-controls">
                <button class="dec-btn" data-index="${index}">-</button>
                <div class="fw-medium">${item.qty}</div>
                <button class="inc-btn" data-index="${index}">+</button>
            </div>
        `;
        
        container.appendChild(cartItem);
    });
    
    // Update total
    document.getElementById('cartTotal').textContent = 'Rp ' + total.toLocaleString('id-ID');
    
    // Add event listeners for increment/decrement buttons
    container.querySelectorAll('.inc-btn').forEach(btn => {
        btn.addEventListener('click', function() {
            const index = parseInt(this.getAttribute('data-index'));
            cart[index].qty++;
            updateCartUI();
        });
    });
    
    container.querySelectorAll('.dec-btn').forEach(btn => {
        btn.addEventListener('click', function() {
            const index = parseInt(this.getAttribute('data-index'));
            cart[index].qty--;
            
            if (cart[index].qty <= 0) {
                cart.splice(index, 1);
            }
            
            updateCartUI();
        });
    });
}

// Initialize Cart Modal
function initCartModal() {
    const cartBtn = document.getElementById('cartBtn');
    const cartModal = new bootstrap.Modal(document.getElementById('cartModal'));
    
    cartBtn.addEventListener('click', function() {
        updateCartUI();
        cartModal.show();
    });
    
    // Checkout button
    document.getElementById('checkout').addEventListener('click', function() {
        const total = document.getElementById('cartTotal').textContent;
        alert(`Checkout belum terintegrasi. Total: ${total}`);
    });
}

// Testimonials
const testimonials = [
    {text: 'Roti enak dan vibesnya aesthetic banget!', author: 'Nisa, 21'},
    {text: 'Packagingnya cute, rasanya legit!', author: 'Dimas, 19'},
    {text: 'Suka banget—cocok buat foto feed.', author: 'Ayu, 23'},
    {text: 'Pelayanan ramah dan delivery cepat.', author: 'Rizki, 25'}
];

let currentTestimonial = 0;

function initTestimonials() {
    showTestimonial();
    
    document.getElementById('nextTest').addEventListener('click', function() {
        currentTestimonial = (currentTestimonial + 1) % testimonials.length;
        showTestimonial();
    });
    
    document.getElementById('prevTest').addEventListener('click', function() {
        currentTestimonial = (currentTestimonial - 1 + testimonials.length) % testimonials.length;
        showTestimonial();
    });
}

function showTestimonial() {
    const testimonial = testimonials[currentTestimonial];
    document.getElementById('testText').textContent = `"${testimonial.text}"`;
    
    // Update author if element exists
    const authorElement = document.querySelector('.testimonial-card .fw-medium');
    if (authorElement) {
        authorElement.textContent = `— ${testimonial.author}`;
    }
}

// Smooth Scroll for Navigation Links
function initSmoothScroll() {
    document.querySelectorAll('a[href^="#"]').forEach(anchor => {
        anchor.addEventListener('click', function(e) {
            const targetId = this.getAttribute('href');
            
            if (targetId !== '#' && document.querySelector(targetId)) {
                e.preventDefault();
                
                const target = document.querySelector(targetId);
                const headerOffset = 80;
                const elementPosition = target.getBoundingClientRect().top;
                const offsetPosition = elementPosition + window.pageYOffset - headerOffset;
                
                window.scrollTo({
                    top: offsetPosition,
                    behavior: 'smooth'
                });
                
                // Close offcanvas menu if open
                const