<?php

namespace App\Http\Controllers;

use App\Models\Preference;
use Illuminate\Http\Request;

class PreferenceController extends Controller
{
    public function index()
    {
        // Ambil preferensi yang ada atau default jika kosong
        $preference = Preference::firstOrCreate([], [
            'start_time' => '08:00',
            'end_time' => '17:00',
            'annual_leave' => 12,
        ]);

        return view('report', compact('preference'));
    }

    public function update(Request $request)
    {
        $request->validate([
            'start_time' => 'required|date_format:H:i',
            'end_time' => 'required|date_format:H:i',
            'annual_leave' => 'required|integer|min:0',
        ]);

        $preference = Preference::first();
        if (!$preference) {
            $preference = new Preference();
        }

        $preference->start_time = $request->start_time;
        $preference->end_time = $request->end_time;
        $preference->annual_leave = $request->annual_leave;
        $preference->save();

        return redirect()->back()->with('success', 'Pengaturan berhasil disimpan.');
    }
}

