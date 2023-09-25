<?php

use Illuminate\Support\Facades\Route;
//Controller
use App\Http\Controllers\Api\Admin\AuthController;

Route::fallback(function () {
  return response()->json([
    'message' => 'Page Not Found. If error persists, contact phamnhunhattruong@gmail.com'
  ], 404);
});

Route::post('login', [AuthController::class, 'login']);

Route::group(['middleware' => ['auth:api']], function () {
});
