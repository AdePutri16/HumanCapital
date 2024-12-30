<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;


use Illuminate\Http\Request;

class DashboardUserController extends Controller
{
    public function showDashboardUserForm()
    {
        dd(Auth::user()); // Debug data pengguna login
        return view('dashboard_user');
    }
}
