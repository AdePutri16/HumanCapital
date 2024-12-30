<?php

namespace App\Http\Controllers;

use App\Models\PengajuanCuti;
use App\Models\Pegawai; // Mengimpor model Pegawai
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PengajuanCutiController extends Controller
{
    public function simpanCuti(Request $request)
    {
        $user = Auth::user(); // Mendapatkan user yang sedang login
        $pegawai = $user->pegawai; // Mendapatkan relasi pegawai dari user
    
        if (!$pegawai) {
            return redirect()->back()->withErrors('Pegawai tidak ditemukan untuk user ini');
        }
    
        // Validasi input
        $request->validate([
            'nip' => 'required|unique:pengajuan_cuti',
            'nama_lengkap' => 'required|string',
            'jabatan' => 'required|string',
            'jenis_cuti' => 'required|string',
            'mulai_cuti' => 'required|date',
            'selesai_cuti' => 'required|date',
            'alamat' => 'required|string',
        ]);
    
        // Menghitung lama cuti (dalam hari)
        $mulaiCuti = \Carbon\Carbon::parse($request->mulai_cuti);
        $selesaiCuti = \Carbon\Carbon::parse($request->selesai_cuti);
        $jumlahCuti = $selesaiCuti->diffInDays($mulaiCuti) + 1; // Tambah 1 agar perhitungan cuti termasuk hari mulai
    
        // Cek apakah pegawai memiliki sisa cuti yang cukup
        if ($pegawai->sisa_cuti < $jumlahCuti) {
            return back()->withErrors('Sisa cuti tidak cukup untuk pengajuan ini.');
        }
    
        // Menyimpan data pengajuan cuti
        $pengajuan = new PengajuanCuti();
        $pengajuan->pegawai_id = $pegawai->id;
        $pengajuan->user_id = $user->id;
        $pengajuan->nama_lengkap = $request->nama_lengkap;
        $pengajuan->jabatan = $request->jabatan;
        $pengajuan->nip = $request->nip;
        $pengajuan->jenis_cuti = $request->jenis_cuti;
        $pengajuan->mulai_cuti = $request->mulai_cuti;
        $pengajuan->selesai_cuti = $request->selesai_cuti;
        $pengajuan->alamat = $request->alamat;
        $pengajuan->status = 'pending';  // Statusnya "pending"
        $pengajuan->save();
    
        // Kurangi sisa cuti pegawai
        $pegawai->sisa_cuti -= $jumlahCuti;
        $pegawai->save();
    
        // Redirect ke halaman notifikasi
        return redirect()->route('notifikasi')->with('success', 'Pengajuan cuti berhasil disimpan.');
    }
    
    public function notifikasi()
    {
        $user = Auth::user(); // Mendapatkan user yang sedang login
        $pengajuanCuti = PengajuanCuti::where('user_id', $user->id)
            ->orderBy('created_at', 'desc')
            ->get();
    
        // Tambahkan fallback jika created_at kosong
        foreach ($pengajuanCuti as $pengajuan) {
            if (!$pengajuan->created_at) {
                $pengajuan->created_at = now(); // Tambahkan nilai default jika kosong
            }
        }
    
        return view('notifikasi', ['pengajuanCuti' => $pengajuanCuti]);
    }
    
    public function rekapitulasi()
    {
        $pengajuanCuti = PengajuanCuti::with('pegawai') // Memuat relasi pegawai
            ->orderBy('created_at', 'desc')
            ->get();
    
        return view('table_cuti_operator', ['pengajuanCuti' => $pengajuanCuti]);
    }
  

}
