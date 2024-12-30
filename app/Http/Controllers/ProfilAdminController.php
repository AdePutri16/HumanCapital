<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ProfilAdminController extends Controller
{
    public function showProfilAdminForm()
    {
        return view('profil_admin'); 
    }
}
