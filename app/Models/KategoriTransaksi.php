<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class KategoriTransaksi extends Model
{
    use HasFactory;

    protected $table = 'kategori_transaksis';

    protected $fillable = [
        'nama_kategori',
    ];


    public function transaksi()
    {
        return $this->hasMany(Transaksi::class);
    }
}
