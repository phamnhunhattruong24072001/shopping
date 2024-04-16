<?php
use Illuminate\Support\Facades\Route;
use Modules\Categories\src\Http\Controllers\Admin\CategoryController;

Route::get('/category/list', [CategoryController::class, 'list']);
