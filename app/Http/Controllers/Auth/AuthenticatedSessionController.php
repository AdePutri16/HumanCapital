<?php
namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Pegawai;
use Illuminate\Support\Facades\Log;

use App\Models\User; // Pastikan model User diimpor
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;
class AuthenticatedSessionController extends Controller
{
    public function create()
    {
        return view('login');  // Ganti dengan path view form login Anda
    }

    // Menangani login
    public function store(Request $request)
    {
        // Validasi input form login
        $request->validate([
            'username' => 'required|string',
            'password' => 'required|string',
        ]);

        // Jika login berhasil
       
        if (Auth::attempt(['username' => $request->username, 'password' => $request->password])) {
            $user = Auth::user();
            $userId = $user->id; // Akses id pengguna setelah login berhasil
            $userRole = Auth::user()->role;
        
            switch ($userRole) {
                case 'admin':
                    return redirect()->route('dashboard')->with('success', 'Login Berhasil sebagai Admin');
                case 'pegawai':
                    return redirect()->route('dashboard_user')->with('success', 'Login Berhasil sebagai Pegawai');
                case 'operator':
                    return redirect()->route('dashboard_operator')->with('success', 'Login Berhasil sebagai Operator');
                default:
                    Auth::logout();
                    return redirect('/login')->withErrors(['login' => 'Akses tidak diizinkan.']);
            }
        }
        

        // Jika gagal login
       return back()->withErrors(['username' => 'Invalid credentials']);

    }

    // Menangani logout
    public function destroy(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect('/login');
    }

    public function registrasi()
    {
        return view('buat_akun'); // Ganti dengan path view form registrasi Anda
    }

    public function simpanregistrasi(Request $request)
    {
        // Validasi input
        $request->validate([
            'username' => 'required|string|unique:users,username',
            'password' => 'required|string|min:6',
            'role' => 'required|string|in:pegawai,operator',
        ]);
    
        // Buat user baru
        $user = User::create([
            'username' => $request->username,
            'password' => Hash::make($request->password),
            'role' => $request->role,
        ]);
    
        // Jika role adalah pegawai, arahkan ke form input data pegawai
        if ($user->role === 'pegawai') {
            return redirect()->route('buat_data_pegawai', ['user_id' => $user->id]);
        }
    
        // Jika role adalah operator, langsung kembali ke dashboard
        return redirect()->route('dashboard')->with('success', 'Akun operator berhasil dibuat.');
    }
    
    public function authenticate(Request $request)
    {
        $credentials = $request->only('username', 'password');

        if (Auth::attempt($credentials)) {
            // Ambil user yang sedang login
            $user = Auth::user();
        
            // Ambil data pegawai yang terhubung dengan user ini
            $pegawai = $user->pegawai;

            // Redirect ke dashboard dan kirim data pegawai
            return redirect()->route('dashboard_user')->with([
                'user' => $user,
                'pegawai' => $pegawai
            ]);
        }

        return back()->withErrors([
            'username' => 'Username atau password salah',
        ]);
    }
    public function showChangePasswordForm()
    {
        return view('profil_user'); // Buat view untuk form ganti password
    }
    
    public function updatePassword(Request $request)
    {
        // Validasi input
        $request->validate([
            'old_password' => 'required|string',
            'new_password' => 'required|string|min:6|confirmed', // "confirmed" will check if new_password == new_password_confirmation
        ]);
    
        // Ambil user yang sedang login
        $user = Auth::user();
    
        // Periksa apakah password lama sesuai
        if (!Hash::check($request->old_password, $user->password)) {
            return back()->withErrors(['old_password' => 'Password lama tidak sesuai.']);
        }
    
        // Perbarui password user
        $user->password = Hash::make($request->new_password);
        $user->save();
    
        return redirect()->route('dashboard_user')->with('success', 'Password berhasil diperbarui.');
    }
}
