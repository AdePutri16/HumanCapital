<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class EditProfilAdminController extends Controller
{
    public function showEditProfilAdminForm()
    {
        return view('edit_profil'); 
    }
}
