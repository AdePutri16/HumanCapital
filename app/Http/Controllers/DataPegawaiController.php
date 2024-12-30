<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Log;
use Illuminate\Http\Request;
use App\Models\Pegawai;
use App\Models\Absensi;
use App\Models\PengajuanCuti;
use Carbon\Carbon; 
class DataPegawaiController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $dtPegawai = Pegawai::paginate(14);
    
        if ($request->hasFile('image_path')) {
            $request->file('image_path')->move('fotopegawai/', $request->file('image_path')->getClientOriginalName());
            $dtPegawai->image_path = $request->file('image_path')->getClientOriginalName();
            $dtPegawai->save();
        }
    
        return view('data_pegawai_admin', compact('dtPegawai'));
    }
    

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('buat_data_pegawai');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
{
    // Validasi input
    $validated = $request->validate([
        'image_path' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
        'nama' => 'required|string|max:255',
        'nip' => 'required|string|max:20',
        'tmpt_lahir' => 'required|string|max:255',
        'tgl_lahir' => 'required|date',
        'tmt' => 'required|date',
        'pendidikan' => 'required|string|max:255',
        'tahun' => 'required|integer',
        'jenis_kelamin' => 'required|string|max:10',
        'nik' => 'required|string|max:20',
        'jabatan' => 'required|string|max:255',
        'status_kawin' => 'required|string|max:10',
        'no_tlp' => 'required|string|max:20',
        'email' => 'required|email|max:255',
        'user_id' => 'required|exists:users,id', // Pastikan user_id valid dan ada di tabel users
    ]);

    // Ambil user_id dari request
    $userId = $request->user_id;

    // Simpan file gambar jika ada
    $imagePath = null;
    if ($request->hasFile('image_path')) {
        $imagePath = $request->file('image_path')->store('images/pegawai', 'public');
    }

    // Simpan data pegawai, termasuk user_id dan sisa_cuti
    Pegawai::create([
        'image_path' => $imagePath,
        'nama' => $validated['nama'],
        'nip' => $validated['nip'],
        'tmpt_lahir' => $validated['tmpt_lahir'],
        'tgl_lahir' => $validated['tgl_lahir'],
        'tmt' => $validated['tmt'],
        'pendidikan' => $validated['pendidikan'],
        'tahun' => $validated['tahun'],
        'jenis_kelamin' => $validated['jenis_kelamin'],
        'nik' => $validated['nik'],
        'jabatan' => $validated['jabatan'],
        'status_kawin' => $validated['status_kawin'],
        'no_tlp' => $validated['no_tlp'],
        'email' => $validated['email'],
        'user_id' => $userId, // Menambahkan user_id yang sesuai
        'sisa_cuti' => 12, // Menetapkan nilai default sisa_cuti, misalnya 12 hari
    ]);

    return redirect()->route('data_pegawai_admin')->with('success', 'Data pegawai berhasil disimpan.');
}


    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $pegawai = Pegawai::findOrFail($id);
        return view('info_data_pegawai', compact('pegawai'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $pegawai = Pegawai::findOrFail($id); // Cari data berdasarkan ID
        return view('edit_data_pegawai', compact('pegawai'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $pegawai = Pegawai::findOrFail($id);

        // Validasi data yang diupdate
        $validated = $request->validate([
            'image_path' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
            'nama' => 'required|string|max:255',
            'nip' => 'required|string|max:20',
            'tmpt_lahir' => 'required|string|max:255',
            'tgl_lahir' => 'required|date',
            'tmt' => 'required|date',
            'pendidikan' => 'required|string|max:255',
            'tahun' => 'required|integer',
            'jenis_kelamin' => 'required|string|max:10',
            'nik' => 'required|string|max:20',
            'jabatan' => 'required|string|max:255',
            'status_kawin' => 'required|string|max:10',
            'no_tlp' => 'required|string|max:20',
            'email' => 'required|email|max:255',
        ]);

        // Update gambar jika ada file baru
        if ($request->hasFile('image_path')) {
            $imagePath = $request->file('image_path')->store('images/pegawai', 'public');
            $pegawai->image_path = $imagePath;
        }

        // Update data pegawai
        $pegawai->update($validated);

        return redirect()->route('data_pegawai_admin')->with('success', 'Data pegawai berhasil diperbarui.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        // Cari pegawai berdasarkan ID
        $pegawai = Pegawai::findOrFail($id);
    
        // Hapus pengajuan cuti yang terkait dengan pegawai
        $pegawai->pengajuanCuti()->delete(); // Asumsi ada relasi dengan model PengajuanCuti
    
        // Setelah itu, hapus pegawai
        $pegawai->delete();
    
        return back()->with('info', 'Data berhasil dihapus.');
    }
    public function search(Request $request)
    {
        if ($request->has('search')) {
            $search = $request->input('search');
            // Gunakan paginate() untuk paginasi
            $dtPegawai = Pegawai::where('nama', 'LIKE', '%' . $search . '%')
                ->orWhere('jabatan', 'LIKE', '%' . $search . '%')
                ->paginate(10); // Tampilkan 10 data per halaman
        } else {
            $dtPegawai = Pegawai::paginate(10); // Tampilkan 10 data per halaman
        }
    
        return view('data_pegawai_operator', ['dtPegawai' => $dtPegawai]);
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
