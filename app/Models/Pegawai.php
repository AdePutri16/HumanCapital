<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Pegawai extends Model
{
    protected $table = "pegawai"; 
    protected $primaryKey = "id";  
    
    protected $fillable = [
        'user_id', // Relasi ke user
        'nama', 'nip', 'tmpt_lahir', 'tgl_lahir', 'tmt', 
        'pendidikan', 'tahun', 'jenis_kelamin', 'nik', 
        'jabatan', 'status_kawin', 'no_tlp', 'email', 'image_path', 'sisa_cuti'
    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
    public function pengajuanCuti()
{
    return $this->hasMany(PengajuanCuti::class, 'pegawai_id', 'id');
}

    
    public function absensi()
    {
        return $this->hasMany(Absensi::class, 'id_pegawai', 'id');
    }
    public function isOnCuti($tanggal)
    {
        return $this->pengajuanCuti()
            ->where('mulai_cuti', '<=', $tanggal)
            ->where('selesai_cuti', '>=', $tanggal)
            ->where('status', 'disetujui') // Pastikan hanya cuti yang disetujui
            ->exists();
    }
       
}

