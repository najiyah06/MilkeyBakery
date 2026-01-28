<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CheckoutController;

/*
|--------------------------------------------------------------------------
| API Routes - Midtrans Webhook
|--------------------------------------------------------------------------
*/

Route::post('/midtrans/webhook', [CheckoutController::class, 'webhook']);

/*
|--------------------------------------------------------------------------
| Test API
|--------------------------------------------------------------------------
*/

Route::get('/test', function () {
    return response()->json([
        'status' => 'success',
        'message' => 'API Midtrans OK'
    ]);
});