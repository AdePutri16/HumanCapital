<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PengajuanCuti extends Model
{
    use HasFactory;

    protected $table = 'pengajuan_cuti';

    // Kolom yang dapat diisi
    protected $fillable = [
        'nama_lengkap',
        'jabatan',
        'nip',
        'jenis_cuti',
        'mulai_cuti',
        'selesai_cuti',
        'alamat',
        'status',
        'pegawai_id',
        'user_id', // Pastikan user_id juga bisa diisi
    ];

    // Relasi ke Pegawai
    public function pegawai()
    {
        return $this->belongsTo(Pegawai::class, 'pegawai_id');
    }

    // Relasi ke User
    public function user()
    {
        return $this->belongsTo(User::class, 'user_id'); // Relasi dengan User
    }
    
}
