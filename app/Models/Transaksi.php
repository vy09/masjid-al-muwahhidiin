<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Transaksi extends Model
{
    use HasFactory;
    protected $table = 'transaksis';
    protected $fillable = [
        'kategori_transaksi_id',
        'user_id',
        'tanggal_transaksi',
        'nominal',
        'deskripsi',
        'tipe_transaksi',
    ];

    public function kategoriTransaksi()
    {
        return $this->belongsTo(KategoriTransaksi::class);
    }   
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
