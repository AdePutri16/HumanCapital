<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DataDiriUserController extends Controller
{
    public function showDataDiriUserForm()
    {
        return view('data_diri_user'); 
    }
}
