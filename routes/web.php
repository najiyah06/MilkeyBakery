<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\MenuController;
use App\Http\Controllers\Admin\AuthController as AdminAuthController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\MenuController as AdminMenuController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\CheckoutController;
use App\Http\Middleware\AdminMiddleware;

/*
|--------------------------------------------------------------------------
| PUBLIC (USER - NO LOGIN)
|--------------------------------------------------------------------------
*/

Route::get('/', fn () => view('welcome'))->name('welcome');

Route::view('/about/about', 'about.about');
Route::view('/contact/service', 'contact.service');
Route::view('/contact/pengiriman', 'contact.pengiriman');

/*
|--------------------------------------------------------------------------
| MENU PUBLIC
|--------------------------------------------------------------------------
*/

// SEARCH HARUS DI ATAS SLUG
Route::get('/menu/search', [MenuController::class, 'search'])->name('menu.search');

// CATEGORY BY SLUG
Route::get('/menu/{slug}', [MenuController::class, 'category'])->name('menu.category');

/*
|--------------------------------------------------------------------------
| AUTH USER
|--------------------------------------------------------------------------
*/

require __DIR__.'/auth.php';

/*
|--------------------------------------------------------------------------
| USER AREA (LOGIN REQUIRED)
|--------------------------------------------------------------------------
*/

Route::middleware('auth')->group(function () {

    // PROFILE
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    // CART
    Route::get('/cart', [CartController::class, 'index'])->name('cart.index');
    Route::post('/cart/add', [CartController::class, 'add'])->name('cart.add');
    Route::put('/cart/{id}', [CartController::class, 'update'])->name('cart.update');
    Route::delete('/cart/{id}', [CartController::class, 'remove'])->name('cart.remove');
    Route::post('/cart/coupon', [CartController::class, 'applyCoupon'])->name('cart.applyCoupon');

    // CHECKOUT
    Route::get('/checkout', [CheckoutController::class, 'index'])->name('checkout.index');
    Route::post('/checkout/process', [CheckoutController::class, 'process'])->name('checkout.process');

    // PAYMENT
    // Route::get('/checkout/payment/{order}', [CheckoutController::class, 'payment'])
    //     ->name('checkout.payment');

    // SUCCESS
    Route::view('/checkout/success', 'checkout.success')->name('checkout.success');

    // ORDERS
    Route::get('/orders', [CheckoutController::class, 'orders'])->name('orders.index');
    Route::get('/orders/{order}', [CheckoutController::class, 'showOrder'])->name('orders.show');
});

/*
|--------------------------------------------------------------------------
| MIDTRANS WEBHOOK (PUBLIC)
|--------------------------------------------------------------------------
*/

Route::post('/midtrans/webhook', [CheckoutController::class, 'webhook'])
    ->name('midtrans.webhook');

/*
|--------------------------------------------------------------------------
| ADMIN AUTH
|--------------------------------------------------------------------------
*/

Route::prefix('admin')->name('admin.')->group(function () {
    Route::get('/login', [AdminAuthController::class, 'showLogin'])->name('login');
    Route::post('/login', [AdminAuthController::class, 'login'])->name('login.submit');
});

/*
|--------------------------------------------------------------------------
| ADMIN AREA (PROTECTED)
|--------------------------------------------------------------------------
*/

Route::prefix('admin')
    ->name('admin.')
    ->middleware(['auth', AdminMiddleware::class])
    ->group(function () {

        Route::get('/', [DashboardController::class, 'index'])->name('dashboard');
        Route::post('/logout', [AdminAuthController::class, 'logout'])->name('logout');

        Route::resource('menus', AdminMenuController::class);
        Route::resource('categories', CategoryController::class);
    });

Route::get('/debug-midtrans-response', function() {
    
    \Midtrans\Config::$serverKey = config('services.midtrans.server_key');
    \Midtrans\Config::$isProduction = false;
    
    // Disable SSL
    \Midtrans\Config::$curlOptions = [
        CURLOPT_SSL_VERIFYPEER => false,
        CURLOPT_SSL_VERIFYHOST => false
    ];
    
    $url = \Midtrans\Config::getSnapBaseUrl() . '/transactions';
    
    $params = [
        'transaction_details' => [
            'order_id' => 'DEBUG-' . time(),
            'gross_amount' => 50000,
        ],
        'customer_details' => [
            'first_name' => 'Debug User',
            'email' => 'debug@test.com',
            'phone' => '081234567890',
        ],
        'item_details' => [
            [
                'id' => 'ITEM-1',
                'price' => 50000,
                'quantity' => 1,
                'name' => 'Test Item'
            ]
        ]
    ];
    
    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, $url);
    curl_setopt($ch, CURLOPT_POST, true);
    curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($params));
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
    curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, false);
    curl_setopt($ch, CURLOPT_HTTPHEADER, [
        'Content-Type: application/json',
        'Accept: application/json',
        'Authorization: Basic ' . base64_encode(config('services.midtrans.server_key') . ':')
    ]);
    
    $response = curl_exec($ch);
    $httpCode = curl_getinfo($ch, CURLINFO_HTTP_CODE);
    $error = curl_error($ch);
    curl_close($ch);
    
    return [
        'http_code' => $httpCode,
        'curl_error' => $error ?: null,
        'raw_response' => $response,
        'decoded_response' => json_decode($response, true),
        'server_key_prefix' => substr(config('services.midtrans.server_key'), 0, 20),
        'api_url' => $url
    ];
    
})->middleware('auth');