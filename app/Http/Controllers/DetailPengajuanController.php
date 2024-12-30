<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DetailPengajuanController extends Controller
{
    public function showDetailPengajuanForm()
    {
        return view('detail_pengajuan'); 
    }
}
