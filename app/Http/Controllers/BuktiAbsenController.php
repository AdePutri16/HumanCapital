<?php

namespace App\Http\Controllers;

use App\Models\Absensi;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class BuktiAbsenController extends Controller
{
    // Menampilkan daftar absensi
    public function index(Request $request)
    {
        // Ambil data absensi dari database
        $query = Absensi::join('pegawai', 'absensi.id_pegawai', '=', 'pegawai.id')
            ->select('absensi.*', 'pegawai.nama')
            ->orderBy('absensi.tanggal', 'desc'); // Urutkan berdasarkan tanggal

        // Filter pencarian berdasarkan nama pegawai atau tanggal
        if ($request->has('search') && $request->search != '') {
            $searchTerm = $request->search;
            $query->where('pegawai.nama', 'like', "%$searchTerm%")
                  ->orWhere('absensi.tanggal', 'like', "%$searchTerm%");
        }

        // Ambil data absensi yang telah difilter
        $absensiList = $query->get();

        return view('bukti_kehadiran_operator', compact('absensiList'));
    }
}
