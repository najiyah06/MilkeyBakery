<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\CartController;
use Illuminate\Support\Facades\Route;

use Illuminate\Http\Request;

Route::get('/cart', [CartController::class, 'index']);
Route::post('/cart/add', [CartController::class, 'add']);
Route::get('/cart/remove/{id}', [CartController::class, 'remove']);
Route::post('/cart/update', [CartController::class, 'update']);
Route::get('/cart/clear', [CartController::class, 'clear']);

Route::post('/cart/add', function (Request $request) {
    $cart = session()->get('cart', []);

    $id = $request->id;

    if (isset($cart[$id])) {
        $cart[$id]['qty']++;
    } else {
        $cart[$id] = [
            'name' => $request->name,
            'price' => $request->price,
            'image' => $request->image,
            'qty' => 1,
        ];
    }

    session()->put('cart', $cart);

    return back()->with('success', 'Produk ditambahkan ke cart!');
});

Route::get('/cart', function () {
    $cart = session('cart', []);
    return view('cart.index', compact('cart'));
});


// Route::get('/menu', function () {
//     return view('bread');
// });

Route::get('/dashboard', function () {
    return view('dashboard');   
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';

Route::get('/profile/welcome', function () {
    return view('welcome');
});

//Menu//

Route::get('/menu/bread', function () {
    return view('menu.bread');
});

Route::get('/menu/cakes', function () {
    return view('menu.cakes');
});

Route::get('/menu/pastry', function () {
    return view('menu.pastry');
});

Route::get('/menu/sandwiches', function () {
    return view('menu.sandwiches');
});

Route::get('/menu/coffee', function () {
    return view('menu.coffee');
});

Route::get('/cart/increment/{id}', [CartController::class, 'increment']);
Route::get('/cart/decrement/{id}', [CartController::class, 'decrement']);
Route::get('/cart/remove/{id}', [CartController::class, 'remove']);
