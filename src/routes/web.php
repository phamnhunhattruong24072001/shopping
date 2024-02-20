<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\HomeController;

Route::group(['prefix' => 'admin', 'as' => 'admin.'], function () {
    Route::get('/dashboard', [HomeController::class, 'showDashboard'])->name('dashboard');
    Route::get('/common', [HomeController::class, 'showCommon'])->name('common');
});

Route::get('/{pathMatch}', function () {
    return view('main-client');
})->where('pathMatch', '.*');
