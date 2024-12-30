<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pegawai;
use Illuminate\Support\Facades\Auth; // Import Auth

class UserPegawaiController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        // Menampilkan data pegawai dengan pagination
        $dtPegawai = Pegawai::paginate(14);

        return view('data_diri_user', compact('dtPegawai'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        // Halaman form untuk menambahkan pegawai (jika ada)
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // Validasi data sebelum menyimpan
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

        // Menyimpan gambar jika ada yang diupload
        $imagePath = null;
        if ($request->hasFile('image_path')) {
            $imagePath = $request->file('image_path')->storeAs('images/pegawai', $request->file('image_path')->getClientOriginalName(), 'public');
        }

        // Menyimpan data pegawai ke database
        Pegawai::create([
            'image_path' => $imagePath,
            'nama' => $request->nama,
            'nip' => $request->nip,
            'tmpt_lahir' => $request->tmpt_lahir,
            'tgl_lahir' => $request->tgl_lahir,
            'tmt' => $request->tmt,
            'pendidikan' => $request->pendidikan,
            'tahun' => $request->tahun,
            'jenis_kelamin' => $request->jenis_kelamin,
            'nik' => $request->nik,
            'jabatan' => $request->jabatan,
            'status_kawin' => $request->status_kawin,
            'no_tlp' => $request->no_tlp,
            'email' => $request->email,
        ]);

        // Redirect ke halaman data pegawai dengan pesan sukses
        return redirect()->route('data_pegawai_admin')->with('success', 'Data pegawai berhasil disimpan.');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        // // Menampilkan detail pegawai berdasarkan ID (jika diperlukan)
        // $pegawai = Pegawai::findOrFail($id);
        // return view('show_pegawai', compact('pegawai'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        // // Menampilkan form edit untuk pegawai tertentu
        // $pegawai = Pegawai::findOrFail($id);
        // return view('edit_pegawai', compact('pegawai'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        // Validasi data sebelum update
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

        // Mencari pegawai berdasarkan ID dan memperbarui data
        $pegawai = Pegawai::findOrFail($id);

        // Memperbarui data pegawai
        if ($request->hasFile('image_path')) {
            $imagePath = $request->file('image_path')->storeAs('images/pegawai', $request->file('image_path')->getClientOriginalName(), 'public');
            $pegawai->image_path = $imagePath;
        }

        // $pegawai->update($request->all());

        // // Redirect ke halaman data pegawai dengan pesan sukses
        // return redirect()->route('data_pegawai_admins')->with('success', 'Data pegawai berhasil diperbarui.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        // // Mencari pegawai berdasarkan ID dan menghapusnya
        // $pegawai = Pegawai::findOrFail($id);
        // $pegawai->delete();

        // // Redirect ke halaman data pegawai dengan pesan sukses
        // return redirect()->route('data_pegawai_admin')->with('success', 'Data pegawai berhasil dihapus.');
    }
}
