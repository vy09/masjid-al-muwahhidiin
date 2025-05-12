<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class KegiatanMasjidSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('kegiatan_masjids')->insert([
            [
                'nama_kegiatan' => 'Pengajian',
                'nama_pengisi' => 'Ustadz Ahmad',
                'deskripsi' => 'Kegiatan pengajian rutin setiap minggu',
                'tanggal_kegiatan' => now(),
                'waktu_mulai' => '19:00',
                'waktu_selesai' => '20:00',
                'tempat_kegiatan' => 'Masjid Al-Falah',
                'gambar' => 'pengajian.jpg',
            ],
            [
                'nama_kegiatan' => 'Buka Puasa Bersama',
                'nama_pengisi' => 'Ustadz Budi',
                'deskripsi' => 'Kegiatan buka puasa bersama setiap bulan Ramadhan',
                'tanggal_kegiatan' => now(),
                'waktu_mulai' => '17:30',
                'waktu_selesai' => '18:30',
                'tempat_kegiatan' => 'Masjid Al-Falah',
                'gambar' => 'buka_puasa.jpg',
            ],
        ]);
    }
}
