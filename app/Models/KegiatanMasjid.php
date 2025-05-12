<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class KegiatanMasjid extends Model
{
    use HasFactory;

    protected $table = 'kegiatan_masjids';

    protected $fillable = [
        'nama_kegiatan',
        'nama_pengisi',
        'tanggal_kegiatan',
        'waktu_mulai',
        'waktu_selesai',
        'tempat_kegiatan',
        'deskripsi',
        'gambar',
    ];

}
