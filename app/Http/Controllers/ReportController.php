<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ReportController extends Controller
{
    public function showReportForm()
    {
        return view('report'); // Pastikan view ini ada
    }
}

