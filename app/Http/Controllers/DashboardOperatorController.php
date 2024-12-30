<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DashboardOperatorController extends Controller
{
    public function showDashboardOperatorForm()
    {
        return view('dashboard_operator'); // Mengembalikan view dashboard_admin.blade.php
    }
}
