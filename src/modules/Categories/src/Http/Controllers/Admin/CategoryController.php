<?php

namespace Modules\Categories\src\Http\Controllers\Admin;

use App\Http\Controllers\Controller;

class CategoryController extends Controller
{
    public function list()
    {
        return view('Categories::category');
    }
}
