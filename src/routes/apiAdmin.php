<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/
use App\Http\Controllers\Api\Admin\AuthController;
use App\Http\Controllers\Api\Admin\CategoryController;

Route::post('/login', [AuthController::class, 'login']);
Route::group(['prefix' => 'category'], function () {
    Route::get('/list', [CategoryController::class, 'list']);
});

Route::fallback(function () {
  return response()->json([
    'message' => 'Page Not Found. If error persists, contact phamnhunhattruong@gmail.com'
  ], 404);
});
