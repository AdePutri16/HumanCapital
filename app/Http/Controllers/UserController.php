<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pegawai;
use Illuminate\Support\Facades\Auth;
class UserController extends Controller
{
   public function index(){
    return view('dashboard_user');
   }

   public function show()
{
    if (!Auth::check()) {
        return redirect()->route('login')->with('error', 'Silakan login untuk mengakses halaman ini.');
    }

    // Ambil data user yang sedang login
    $user = Auth::user();

    // Ambil data pegawai menggunakan relasi
    $pegawai = $user->pegawai;

    // Jika data pegawai tidak ditemukan
    if (!$pegawai) {
        return redirect()->route('dashboard_user')->with('error', 'Data pegawai tidak ditemukan.');
    }

    // Kirim data pegawai ke view
    return view('data_diri_user', compact('pegawai'));
}


}
