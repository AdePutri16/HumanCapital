<?php

namespace App\Http\Controllers;
use App\Models\Absensi;
use Illuminate\Support\Facades\Log;
use Illuminate\Http\Request;
use Carbon\Carbon;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;
class AbsensiController extends Controller
{
    public function showAbsensiForm()
    {
        $idPegawai = auth()->user()->id; // Ambil ID pengguna yang login
        $statusAbsensi = $this->checkAbsensiStatus($idPegawai); // Panggil metode checkAbsensiStatus

        return view('absen_user', compact('statusAbsensi')); // Kirim ke view
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'id_pegawai' => 'required|exists:pegawai,id',
            'tanggal' => 'required|date',
            'jam_masuk' => 'nullable|date_format:H:i',
            'jam_keluar' => 'nullable|date_format:H:i',
            'lokasi_masuk' => 'nullable|string|max:255',
            'lokasi_keluar' => 'nullable|string|max:255',
            'foto_masuk' => 'nullable|string',
            'foto_keluar' => 'nullable|string',
        ]);

        try {
            $imagePathMasuk = null;
            $imagePathKeluar = null;

            // Validasi base64 gambar sebelum diproses
            if (!empty($validated['foto_masuk']) && !$this->isValidBase64Image($validated['foto_masuk'])) {
                throw new \Exception('Foto masuk tidak valid.');
            }
            if (!empty($validated['foto_keluar']) && !$this->isValidBase64Image($validated['foto_keluar'])) {
                throw new \Exception('Foto keluar tidak valid.');
            }

            // Proses foto masuk (opsional)
            if (!empty($validated['foto_masuk'])) {
                $imagePathMasuk = $this->processImage($validated['foto_masuk']);
            }

            // Proses foto keluar (opsional)
            if (!empty($validated['foto_keluar'])) {
                $imagePathKeluar = $this->processImage($validated['foto_keluar']);
            }

            // Cari data absensi hari ini
            $existingAbsensi = Absensi::where('id_pegawai', $validated['id_pegawai'])
                ->where('tanggal', $validated['tanggal'])
                ->first();

            if ($existingAbsensi) {
                // Absen pulang
                $existingAbsensi->jam_keluar = $validated['jam_keluar'] ?? now()->format('H:i');
                $existingAbsensi->lokasi_keluar = $validated['lokasi_keluar'];
                if ($imagePathKeluar) {
                    $existingAbsensi->foto_keluar = $imagePathKeluar;
                }
                $existingAbsensi->save();
                return redirect()->route('rekap_absen_user')->with('success', 'Absen pulang berhasil.');
            } else {
                // Absen masuk
                $absensi = new Absensi();
                $absensi->id_pegawai = $validated['id_pegawai'];
                $absensi->tanggal = $validated['tanggal'];
                $absensi->jam_masuk = $validated['jam_masuk'] ?? now()->format('H:i');
                $absensi->lokasi_masuk = $validated['lokasi_masuk'];
                if ($imagePathMasuk) {
                    $absensi->foto_masuk = $imagePathMasuk;
                }
                $absensi->save();
                return redirect()->route('rekap_absen_user')->with('success', 'Absen masuk berhasil.');
            }
        } catch (\Exception $e) {
            Log::error('Error storing absensi: ' . $e->getMessage(), ['request_data' => $request->all()]);
            return redirect()->route('dashboard_user')->with('error', 'Terjadi kesalahan saat menyimpan absensi.');
        }
    }

    private function processImage($base64Image)
    {
        $imageData = preg_replace('#^data:image/\w+;base64,#i', '', $base64Image);
        $imageData = str_replace(' ', '+', $imageData);
        $image = base64_decode($imageData);

        if (preg_match('/^data:image\/(\w+);base64,/', $base64Image, $type)) {
            $extension = strtolower($type[1]);
            if (!in_array($extension, ['jpg', 'jpeg', 'png'])) {
                throw new \Exception('Ekstensi gambar tidak valid.');
            }
        } else {
            throw new \Exception('Data gambar tidak valid.');
        }

        $fileName = Str::random(10) . '.' . $extension;
        Storage::disk('public')->makeDirectory('images/pegawai');
        Storage::disk('public')->put('images/pegawai/' . $fileName, $image);

        return 'images/pegawai/' . $fileName;
    }

    private function isValidBase64Image($base64Image)
    {
        return preg_match('/^data:image\/(jpg|jpeg|png);base64,/', $base64Image);
    }

    public function checkAbsensiStatus($idPegawai)
    {
        $today = date('Y-m-d');
        $absensi = Absensi::where('id_pegawai', $idPegawai)
            ->where('tanggal', $today)
            ->first();

        if (!$absensi) {
            return 'Absen Masuk';
        } elseif ($absensi && !$absensi->jam_keluar) {
            return 'Absen Pulang';
        } else {
            return 'Selesai';
        }
    }

    public function rekapAbsen(Request $request, $bulan = null, $tahun = null)
    {
        // Jika bulan dan tahun tidak diberikan, gunakan bulan dan tahun saat ini.
        $bulan = $bulan ? (int) $bulan : (int) date('m');
        $tahun = $tahun ? (int) $tahun : (int) date('Y');
    
        // Ambil nama bulan dalam format teks
        $namaBulan = Carbon::create($tahun, $bulan, 1)->locale('id')->translatedFormat('F');
    
        // Ambil data absensi jika route adalah 'tabel_rekap_kehadiran_operator'
        $absensi = [];
        if ($request->route()->getName() === 'tabel_rekap_kehadiran_operator') {
            $absensi = Absensi::whereMonth('tanggal', $bulan)
                ->whereYear('tanggal', $tahun)
                ->with('pegawai')
                ->get();
    
            // Tambahkan status ke absensi
            foreach ($absensi as $absen) {
                $pegawai = $absen->pegawai;
                if ($pegawai->isOnCuti($absen->tanggal)) {
                    $absen->status = 'Cuti';
                } elseif ($absen->hadir) {
                    $absen->status = 'Hadir';
                } else {
                    $absen->status = 'Alpa';
                }
            }
    
            // Kembalikan tabel rekap kehadiran ke view
            return view('tabel_rekap_kehadiran_operator', compact('absensi', 'namaBulan', 'tahun', 'bulan'));
        }
    
        // Kembalikan rekap kehadiran operator ke view
        return view('rekap_kehadiran_operator', compact('namaBulan', 'tahun', 'bulan'));
    }
    
    
    public function rekapAbsensi(Request $request)
{
    $idPegawai = auth()->user()->id;
    $bulan = $request->input('bulan', date('m'));
    $tahun = $request->input('tahun', date('Y'));

    $dataAbsensi = Absensi::where('id_pegawai', $idPegawai)
        ->whereYear('tanggal', $tahun)
        ->whereMonth('tanggal', $bulan)
        ->get();

    // Hitung jumlah hari kerja dalam bulan
    $jumlahHari = cal_days_in_month(CAL_GREGORIAN, $bulan, $tahun);

    // Hitung jumlah hadir
    $jumlahHadir = $dataAbsensi->count();

    // Hitung jumlah cuti (asumsi ada kolom 'status' pada tabel absensi untuk menandai cuti)
    $jumlahCuti = $dataAbsensi->where('status', 'cuti')->count();

    // Hitung jumlah terlambat (asumsi ada kolom 'terlambat' bernilai true jika pegawai terlambat)
    $jumlahTerlambat = $dataAbsensi->where('terlambat', true)->count();

    // Hitung persentase kehadiran
    $persentaseHadir = $jumlahHadir > 0 ? ($jumlahHadir / $jumlahHari) * 100 : 0;

    return view('rekap_absen_user', compact(
        'dataAbsensi', 
        'bulan', 
        'tahun', 
        'persentaseHadir', 
        'jumlahHari', 
        'jumlahCuti', 
        'jumlahTerlambat'
    ));
}
public function rekapAbsensiDashboard(Request $request)
{
    // Ambil ID Pegawai dari user yang sedang login
    $idPegawai = auth()->user()->id;

    // Default bulan dan tahun saat ini jika tidak ada input filter
    $bulan = $request->input('bulan', date('m'));
    $tahun = $request->input('tahun', date('Y'));

    // Ambil data absensi berdasarkan ID Pegawai, tahun, dan bulan
    $dataAbsensi = Absensi::where('id_pegawai', $idPegawai)
        ->whereYear('tanggal', $tahun)
        ->whereMonth('tanggal', $bulan)
        ->get();

    // Hitung jumlah hari kerja dalam bulan
    $jumlahHari = cal_days_in_month(CAL_GREGORIAN, $bulan, $tahun);

    // Hitung jumlah hadir (absensi tidak kosong)
    $jumlahHadir = $dataAbsensi->count();

    // Hitung jumlah cuti (misalnya berdasarkan keterangan 'cuti')
    $jumlahCuti = $dataAbsensi->where('keterangan', 'cuti')->count();

    // Hitung jumlah terlambat (misalnya jika jam masuk lebih dari jam 08:00)
    $jumlahTerlambat = $dataAbsensi->filter(function ($absen) {
        return $absen->jam_masuk > '08:00:00';
    })->count();

    // Hitung persentase kehadiran
    $persentaseHadir = $jumlahHari > 0 ? ($jumlahHadir / $jumlahHari) * 100 : 0;

    // Kirim data ke view untuk ditampilkan
    return view('dashboard_user', compact(
        'dataAbsensi',
        'bulan',
        'tahun',
        'jumlahHari',
        'jumlahHadir',
        'jumlahCuti',
        'jumlahTerlambat',
        'persentaseHadir'
    ));
}

}