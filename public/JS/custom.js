// Product sample
const products = [
  {id:1, name:'Milk Loaf', price:18000, desc:'Roti susu lembut'},
  {id:2, name:'Butter Croissant', price:12000, desc:'Croissant renyah'},
  {id:3, name:'Matcha Cake', price:25000, desc:'Cake matcha lembut'},
];

const menuGrid = document.getElementById('menuGrid');
if(menuGrid){
  products.forEach(p=>{
    const col = document.createElement('div');
    col.className = "col-md-4";
    col.innerHTML = `
      <div class="card h-100 shadow-sm">
        <div class="card-body text-center">
          <h5 class="card-title">${p.name}</h5>
          <p class="card-text small text-muted">${p.desc}</p>
          <p class="fw-bold">Rp ${p.price.toLocaleString('id-ID')}</p>
          <button class="btn btn-pink addBtn" data-id="${p.id}">Tambah</button>
        </div>
      </div>`;
    menuGrid.appendChild(col);
  });
}

// Cart logic
let cart = [];
function updateCartUI(){
  const cartCount = document.getElementById('cartCount');
  const cartItems = document.getElementById('cartItems');
  const cartTotal = document.getElementById('cartTotal');
  cartCount.textContent = cart.length;
  cartItems.innerHTML = '';
  let total = 0;
  if(cart.length===0){
    cartItems.innerHTML = '<p>Belum ada item.</p>';
  } else {
    cart.forEach((it,i)=>{
      total += it.price;
      cartItems.innerHTML += `<div class="d-flex justify-content-between mb-2">
        <span>${it.name}</span>
        <span>Rp ${it.price.toLocaleString('id-ID')}</span>
      </div>`;
    });
  }
  cartTotal.textContent = 'Rp ' + total.toLocaleString('id-ID');
}

// Add to cart buttons
document.addEventListener('click', e=>{
  if(e.target.classList.contains('addBtn')){
    const id = e.target.dataset.id;
    const product = products.find(p=>p.id==id);
    cart.push(product);
    updateCartUI();
    new bootstrap.Modal(document.getElementById('cartModal')).show();
  }
});

// Testimonials
const tests = [
  'Roti enak dan vibesnya aesthetic banget!',
  'Packagingnya cute, rasanya legit!',
  'Suka banget—cocok buat foto feed.'
];
let ti=0;
function showTest(){
  document.getElementById('testText').textContent = '"' + tests[ti] + '"';
}
document.getElementById('nextTest').addEventListener('click', ()=>{ti=(ti+1)%tests.length;showTest();});
document.getElementById('prevTest').addEventListener('click', ()=>{ti=(ti-1+tests.length)%tests.length;showTest();});
showTest();