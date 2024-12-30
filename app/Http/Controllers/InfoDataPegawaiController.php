<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class InfoDataPegawaiController extends Controller
{
    public function index()
    {
        return view('info_data_pegawai');
    }
}

