<?php

// app/Http/Controllers/SettingController.php

// app/Http/Controllers/SettingController.php

namespace App\Http\Controllers;

use App\Models\Setting;
use Illuminate\Http\Request;

class SettingController extends Controller
{
    // Menampilkan pengaturan
    public function index()
    {
        $setting = Setting::first(); // Ambil pengaturan pertama

        // Jika pengaturan tidak ditemukan, buat pengaturan baru
        if (!$setting) {
            $setting = (object)[
                'start_time' => '08:00',
                'end_time' => '17:00',
                'annual_leave' => 12,
                'name' => '' // Pastikan property 'name' ada
            ];
        }

        // Kirim $setting ke view
        return view('report', compact('setting'));
    }

    // Menyimpan pengaturan
    public function store(Request $request)
    {
        $request->validate([
            'start-time' => 'required|date_format:H:i',
            'end-time' => 'required|date_format:H:i',
            'annual-leave' => 'required|integer|min:0',
        ]);

        // Update atau buat pengaturan baru
        Setting::updateOrCreate(
            ['id' => 1], // Cek jika sudah ada pengaturan (id=1), jika belum akan dibuat baru
            [
                'start_time' => $request->input('start-time'),
                'end_time' => $request->input('end-time'),
                'annual_leave' => $request->input('annual-leave'),
            ]
        );

        return redirect()->route('report')->with('success', 'Pengaturan berhasil disimpan!');
    }

    // Menyimpan pengaturan di session
    public function saveSettings(Request $request)
    {
        $validatedData = $request->validate([
            'start-time' => 'required|date_format:H:i',
            'end-time' => 'required|date_format:H:i',
            'annual-leave' => 'required|integer|min:0',
        ]);

        // Simpan pengaturan di session
        session([
            'start_time' => $request->input('start-time'),
            'end_time' => $request->input('end-time'),
            'annual_leave' => $request->input('annual-leave'),
        ]);

        return redirect()->back()->with('status', 'Pengaturan berhasil disimpan!');
    }
}
