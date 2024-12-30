<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ProfilOperatorController extends Controller
{
    public function showProfilOperatorForm()
    {
        return view('profil_operator'); 
    }
}
