<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class RoleMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @param  array|string  ...$roles
     * @return mixed
     */
    public function handle($request, Closure $next, ...$roles)
    {
        // Pastikan pengguna sudah login
        if (!Auth::check()) {
            return redirect('/login')->with('error', 'Silakan login terlebih dahulu.');
        }

        // Ambil role dari pengguna yang sedang login
        $userRole = $request->user()->role;

        // Log role pengguna untuk keperluan debugging
        \Log::info('Role Pengguna: ' . $userRole);
        \Log::info('Roles yang Diperbolehkan: ' . json_encode($roles));

        // Cek apakah role pengguna sesuai dengan salah satu role yang diizinkan
        if (!in_array($userRole, $roles)) {
            return redirect('/')->with('error', 'Akses ditolak! Anda tidak memiliki izin.');
        }

        // Lanjutkan ke request berikutnya
        return $next($request);
    }
}
