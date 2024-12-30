<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AbsenGpsController extends Controller
{
    public function showAbsenGpsForm()
    {
        return view('absen_gps');
    }
}
