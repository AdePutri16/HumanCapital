<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AbsenUserController extends Controller
{
    public function showAbsenUserForm()
    {
        return view('absen_user');
    }
}
