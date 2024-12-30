<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class EditUserController extends Controller
{
    public function showEditUserForm()
    {
        return view('edit_data_user'); 
    }
}
