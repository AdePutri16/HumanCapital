<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Pegawai; // Tambahkan ini
use Illuminate\Http\Request; // Tambahkan ini
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

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

public function edit()
{
    // Ambil data pegawai yang sedang login
    $pegawai = auth()->user(); // Sesuaikan jika Anda menggunakan guard khusus
    
    // Pastikan data pegawai tersedia
    if (!$pegawai) {
        return redirect()->route('login')->with('error', 'Silakan login untuk mengakses halaman ini.');
    }

    return view('edit_data_user', compact('pegawai'));
}

/**
 * Update profil pegawai.
 */
public function update(Request $request)
{
    // Validasi input
    $validated = $request->validate([
        'email' => 'required|email',
        'phone' => 'required|numeric',
        'profile_image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
    ]);

    // Ambil data pegawai yang sedang login
    $pegawai = auth()->user(); // Sesuaikan jika Anda menggunakan guard khusus

    if (!$pegawai) {
        return redirect()->route('login')->with('error', 'Silakan login untuk memperbarui data.');
    }

    // Update email dan nomor telepon
    $pegawai->email = $validated['email'];
    $pegawai->phone = $validated['phone'];

    // Cek jika ada gambar yang diupload
    if ($request->hasFile('profile_image')) {
        // Simpan gambar baru di folder images/pegawai
        $path = $request->file('profile_image')->store('images/pegawai', 'public');

        // Hapus gambar lama jika ada
        if ($pegawai->image_path) {
            Storage::disk('public')->delete($pegawai->image_path);
        }

        // Simpan path gambar baru ke database
        $pegawai->image_path = $path;
    }

    // Simpan perubahan ke database
    $pegawai->save();

    // Redirect dengan pesan sukses
    return redirect()->route('data_diri_user')->with('success', 'Profil pegawai berhasil diperbarui!');
}
}
