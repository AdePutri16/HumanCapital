<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class TableCutiAdminController extends Controller
{
    public function showTableCutiAdminForm()
    {
        return view('table_cuti_admin'); // Pastikan view ini ada
    }
}

