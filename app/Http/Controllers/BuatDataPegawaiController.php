<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;

class BuatDataPegawaiController extends Controller
{
    public function create()
    {
        return view('buat_data_pegawai'); // Mengarahkan ke view buat_data_pegawai.blade.php
    }
}
