<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class FormulirPengajuanController extends Controller
{
    public function showFormulirPengajuanForm()
    {
        return view('formulir_pengajuan'); 
    }
}
