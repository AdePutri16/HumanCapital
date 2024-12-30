<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Carbon\Carbon;
use App\Models\Absensi;
use Illuminate\Support\Facades\Auth;


class DashboardUserController extends Controller
{
    public function showDashboardUserForm()
    {
        dd(Auth::user()); // Debug data pengguna login
        return view('dashboard_user');
    }

    public function index(Request $request)
    {
        // Ambil bulan dan tahun dari request atau gunakan bulan dan tahun sekarang
        $bulan = $request->input('bulan', Carbon::now()->month);
        $tahun = $request->input('tahun', Carbon::now()->year);

        // Hitung jumlah hari dalam bulan tersebut
        $jumlahHari = Carbon::create($tahun, $bulan)->daysInMonth;

        // Ambil data absensi untuk pengguna yang sedang login
        $userId = auth()->user()->id;
        $dataAbsensi = Absensi::where('id_pegawai', $userId) // Gunakan id_pegawai
            ->whereMonth('tanggal', $bulan)
            ->whereYear('tanggal', $tahun)
            ->get();

        // Hitung total kehadiran, izin, sakit, terlambat, dll.
        $totalHadir = $dataAbsensi->where('status', 'hadir')->count();
        $totalCuti = $dataAbsensi->where('status', 'Cuti')->count();
        $totalSakit = $dataAbsensi->where('status', 'sakit')->count();
        $totalLain = $dataAbsensi->where('status', 'lain')->count();
        $totalTerlambat = $dataAbsensi->where('terlambat', true)->count();

        // Hitung persentase kehadiran
        $persentaseHadir = $jumlahHari > 0 ? ($totalHadir / $jumlahHari) * 100 : 0;

        // Kirim data ke view
        return view('dashboard_user', [
            'bulan' => $bulan,
            'tahun' => $tahun,
            'jumlahHari' => $jumlahHari,
            'totalHadir' => $totalHadir,
            'totalCuti' => $totalCuti,
            'totalSakit' => $totalSakit,
            'totalLain' => $totalLain,
            'totalTerlambat' => $totalTerlambat,
            'persentaseHadir' => $persentaseHadir,
            'dataAbsensi' => $dataAbsensi
        ]);
    }
}

