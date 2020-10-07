<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use Illuminate\View\View;
use App\Http\Controllers\Controller;

/**
 * Dashboard controller.
 * 
 * Display default admin pages.
 */
class DashboardController extends Controller
{
    /**
     * Show the admin dashboard.
     *
     * @return View
     */
    public function dashboard(): View {
    	return view("admin.dashboard");
    }
}
