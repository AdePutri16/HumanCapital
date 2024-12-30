<?php

namespace App\Http\Controllers;
use App\Models\PengajuanCuti;
use Illuminate\Http\Request;

class ValidasiCutiController extends Controller
{
    public function index()
    {
        $pengajuanCuti = PengajuanCuti::with('pegawai')->where('status', 'pending')->get();
        return view('validasi_cuti_izin', compact('pengajuanCuti'));
    }

    public function validasi($id, $status)
    {
        $pengajuanCuti = PengajuanCuti::findOrFail($id);
        $pegawai = $pengajuanCuti->pegawai;  // Mengambil pegawai terkait pengajuan cuti
    
        // Jika status sudah "disetujui" sebelumnya, tidak perlu melakukan pengurangan cuti lagi
        if ($pengajuanCuti->status == 'disetujui') {
            return redirect()->route('validasi_cuti_izin')->with('info', 'Pengajuan cuti ini sudah disetujui sebelumnya.');
        }
    
        if ($status == 'disetujui') {
            // Hitung jumlah hari cuti
            $mulaiCuti = \Carbon\Carbon::parse($pengajuanCuti->mulai_cuti);
            $selesaiCuti = \Carbon\Carbon::parse($pengajuanCuti->selesai_cuti);
            $jumlahHariCuti = $selesaiCuti->diffInDays($mulaiCuti) + 1;  // Menghitung jumlah hari cuti (termasuk hari pertama)
    
            // Periksa apakah pegawai memiliki cukup sisa cuti
            if ($pegawai->sisa_cuti >= $jumlahHariCuti) {
                // Kurangi sisa cuti pegawai
                $pegawai->sisa_cuti -= $jumlahHariCuti;
                $pegawai->save();  // Simpan perubahan ke database
    
                // Ubah status pengajuan cuti menjadi disetujui
                $pengajuanCuti->status = 'disetujui';
                $pengajuanCuti->save();
    
                return redirect()->route('validasi_cuti_izin')->with('success', 'Pengajuan cuti berhasil disetujui dan sisa cuti pegawai berkurang.');
            } else {
                // Jika sisa cuti pegawai tidak cukup, beri notifikasi
                return redirect()->route('validasi_cuti_izin')->with('error', 'Sisa cuti pegawai tidak cukup.');
            }
        } else {
            // Jika ditolak, status hanya diubah tanpa mengubah sisa cuti
            $pengajuanCuti->status = 'ditolak';
            $pengajuanCuti->save();
    
            return redirect()->route('validasi_cuti_izin')->with('success', 'Pengajuan cuti berhasil ditolak.');
        }
    }
    

    public function detail($id)
{
    $pengajuanCuti = PengajuanCuti::with('pegawai')->find($id);  // Gunakan find() jika ingin menangani kasus null
    
    if (!$pengajuanCuti) {
        return redirect()->route('validasi_cuti_izin')->with('error', 'Pengajuan Cuti tidak ditemukan');
    }

    return view('detail_pengajuan', compact('pengajuanCuti'));
}

}
