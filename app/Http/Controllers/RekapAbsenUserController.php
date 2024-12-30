<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class RekapAbsenUserController extends Controller
{
    public function showRekapAbsenUserForm()
    {
        return view('rekap_absen_user');
    }
}
