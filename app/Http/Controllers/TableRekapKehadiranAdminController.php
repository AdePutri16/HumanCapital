<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class TableRekapKehadiranAdminController extends Controller
{
    public function showTableRekapKehadiranAdminForm()
    {
        return view('table_rekap_kehadiran'); // Pastikan view ini ada
    }
}

