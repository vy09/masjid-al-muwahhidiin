<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class KegiatanJumat extends Model
{
    use HasFactory;
    protected $table = 'kegiatan_jumats';
    protected $fillable = [
        'nama_kegiatan',
        'nama_khatib',
        'nama_muadzin',        
        'tanggal_kegiatan',
        'tempat_kegiatan',
    ];
}
