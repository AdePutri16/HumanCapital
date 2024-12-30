<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ProfilUserController extends Controller
{
    public function showProfilUserForm()
    {
        return view('profil_user'); 
    }
}
