<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class KategoriTransaksiSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('kategori_transaksis')->insert([
            [
                'nama_kategori' => 'Zakat',
            ],
            [
                'nama_kategori' => 'Infaq',
            ],
            [
                'nama_kategori' => 'Sedekah',
            ],
            [
                'nama_kategori' => 'Wakaf',
            ],
            [
                'nama_kategori' => 'Donasi',
            ],
            [
                'nama_kategori' => 'Lainnya',
            ],
        ]);
    }
}
