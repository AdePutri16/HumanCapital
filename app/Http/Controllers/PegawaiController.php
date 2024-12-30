<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Pegawai; // Tambahkan ini
use Illuminate\Http\Request; // Tambahkan ini
use Illuminate\Support\Facades\Auth;

class PegawaiController extends Controller
{
    public function show()
{
    // Ambil data pegawai berdasarkan pengguna yang login
    $pegawai = auth()->user()->pegawai;

    // Periksa apakah data pegawai ditemukan
    if (!$pegawai) {
        return redirect()->back()->with('error', 'Data pegawai tidak ditemukan.');
    }

    // Kirim data pegawai ke view
    return view('data_diri_user', compact('pegawai'));
}

    
}
