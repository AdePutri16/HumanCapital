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
                return redirect()->route('dashboard_user')->with('success', 'Absen pulang berhasil.');
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
                return redirect()->route('dashboard_user')->with('success', 'Absen masuk berhasil.');
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

    public function rekapAbsen(Request $request)
{
    // Ensure bulan is an integer
    $bulan = (int) $request->input('bulan', date('m')); 
    $tahun = $request->input('tahun', date('Y')); 
    
    // Ambil nama bulan dalam format teks
    $namaBulan = Carbon::create($tahun, $bulan, 1)->locale('id')->translatedFormat('F');

    // Ambil data absensi berdasarkan bulan dan tahun
    $absensi = Absensi::whereMonth('tanggal', $bulan)
        ->whereYear('tanggal', $tahun)
        ->with('pegawai') // Pastikan eager load pegawai untuk menghindari query N+1
        ->get();

    // Loop untuk menambahkan status kehadiran
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

    // Kembalikan data ke view
    return view('rekap_kehadiran_operator', compact('absensi', 'bulan', 'tahun', 'namaBulan'));
}

    
}
