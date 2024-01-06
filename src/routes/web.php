<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\HomeController;

Route::prefix('admin')->group(function () {
    Route::get('/dashboard', [HomeController::class, 'showDashboard'])->name('dashboard');
});


Route::get('/{pathMatch}', function () {
        return view('main-client');
})->where('pathMatch', '.*');
