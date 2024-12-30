<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class BuatAkunController extends Controller
{
    public function showBuatAkunForm()
    {
        return view('buat_akun'); // Mengembalikan view dashboard_admin.blade.php
    }
}
