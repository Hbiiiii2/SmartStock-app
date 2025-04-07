<?php

namespace App\Http\Controllers;

use App\Http\Controllers\DashboardController;
use Illuminate\Http\Request;

class StaffController extends Controller
{
    public function dashboard()
    {
        // Use the DashboardController to get the data
        $dashboardController = new DashboardController();
        return $dashboardController->index();
    }
} 