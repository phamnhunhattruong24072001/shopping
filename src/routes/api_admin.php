<?php

use Illuminate\Support\Facades\Route;
//Controller
use App\Http\Controllers\Api\Admin\AuthController;
use App\Http\Controllers\Api\Clients\CheckoutController;

Route::fallback(function () {
  return response()->json([
    'message' => 'Page Not Found. If error persists, contact phamnhunhattruong@gmail.com'
  ], 404);
});

Route::post('/handle-checkout', [CheckoutController::class, 'handleCheckout']);
Route::post('login', [AuthController::class, 'login']);
Route::post('register', [AuthController::class, 'register']);
