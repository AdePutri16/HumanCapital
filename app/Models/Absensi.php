<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
class Absensi extends Model
{
    use HasFactory;

    protected $table = 'absensi'; // Nama tabel, jika tidak sama dengan nama model

    protected $fillable = [
        'id_pegawai',
        'tanggal',
        'jam_masuk',
        'jam_keluar',
        'lokasi_masuk',
        'lokasi_keluar',
        'foto_masuk',
        'foto_keluar',
    ];

    /**
     * Mendefinisikan relasi antara Absensi dan Pegawai
     */
    public function pegawai()
    {
        return $this->belongsTo(Pegawai::class, 'id_pegawai'); // Relasi ke Pegawai
    }
    public function user()
    {
        return $this->pegawai->user(); // Mengakses relasi user melalui pegawai
    }
}
