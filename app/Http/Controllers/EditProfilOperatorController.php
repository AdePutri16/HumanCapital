<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class EditProfilOperatorController extends Controller
{
    public function showEditProfilOperatorForm()
    {
        return view('edit_profil_operator'); 
    }
}
