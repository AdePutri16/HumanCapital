<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;

class EmployeeController extends Controller
{
    public function create()
    {
        return view('buat_data_pegawai'); // Mengarahkan ke view create_employee.blade.php
    }
}
