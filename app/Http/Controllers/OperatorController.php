<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class OperatorController extends Controller
{
    public function index()
    {
        return view('dashboard_operator'); // Pastikan view file ini ada
    }
}
