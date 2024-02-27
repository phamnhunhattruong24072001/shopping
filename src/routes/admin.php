<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\HomeController as AdminHomeController;

Route::get('/', [AdminHomeController::class, 'showDashboard'])->name('home');
Route::get('/dashboard', [AdminHomeController::class, 'showDashboard'])->name('dashboard');
Route::get('/common', [AdminHomeController::class, 'showCommon'])->name('common');
