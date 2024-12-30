<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class RekapKehadiranOperatorController extends Controller
{
    public function showRekapKehadiranOperatorForm()
    {
        return view('rekap_kehadiran_operator'); // Pastikan view ini ada
    }
}

