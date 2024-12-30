<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Facades\Hash;

class User extends Authenticatable
{
    use HasFactory, Notifiable;

    // Field yang bisa diisi saat create/update
    protected $fillable = [
        'username', 
        'password', 
        'role',
    ];

    // Field yang disembunyikan saat serialisasi (misal ke JSON)
    protected $hidden = [
        'password',
        'remember_token',
    ];

    // Casting atribut
    protected $casts = [
        'password' => 'hashed', 
    ];

    // Role yang diizinkan
    const ROLES = ['admin', 'pegawai', 'operator'];

    public function getAuthIdentifierName()
    {
        return 'username';
    }

    public function isValidRole($role)
    {
        return in_array($role, self::ROLES);
    }

    public function getRoleNameAttribute()
    {
        $userRole = $user->role; // Menampilkan 'admin', 'pegawai', atau 'operator'

    }

    public function findForPassport($username)
    {
        return $this->where('username', $username)->first();
    }

    public function getRoleAttribute($value)
    {
        \Log::info("Role fetched: {$value}");
        return $value;
    }
    public function pegawai()
    {
        return $this->hasOne(Pegawai::class, 'user_id');
    }
   
}
