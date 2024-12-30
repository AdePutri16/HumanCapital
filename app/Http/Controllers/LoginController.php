<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function store(Request $request)
    {
        // Validasi input
        $request->validate([
            'email' => 'required|string|email',
            'password' => 'required|string',
        ]);

        // Ambil kredensial dari input
        $credentials = $request->only('email', 'password');

        // Cek kredensial
        if (Auth::attempt($credentials)) {
            // Regenerate session untuk keamanan
            $request->session()->regenerate();

            // Ambil data user yang sedang login
            $user = Auth::user();

            // Cek role user dan arahkan ke dashboard sesuai role
            if ($user->role === 'admin') {
                return redirect()->route('dashboard'); // Pastikan route ini ada
            } elseif ($user->role === 'operator') {
                return redirect()->route('dashboard_operator'); // Pastikan route ini ada
            } elseif ($user->role === 'pegawai') {
                return redirect()->route('dashboard_user'); // Pastikan route ini ada
            } else {
                // Logout jika role tidak dikenali
                Auth::logout();
                return redirect()->back()->withErrors(['login' => 'Role tidak dikenali.']);
            }
        }

        // Jika login gagal
        return redirect()->back()->withErrors(['login' => 'Email atau password salah.']);
    }
}
