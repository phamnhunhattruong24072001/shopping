<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * The function show dashboard
     *
     * @return View
     */
    public function showDashboard()
    {
        return view('admin.dashboard');
    }

    /**
     * The function show common
     *
     * @return View
     */
    public function showCommon()
    {
        return view('admin.common');
    }
}
