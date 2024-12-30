<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class BuktiKehadiranController extends Controller
{
    public function showBuktiKehadiranForm()
    {
        return view('bukti_kehadiran_operator'); // Mengembalikan view dashboard_admin.blade.php
    }
}
