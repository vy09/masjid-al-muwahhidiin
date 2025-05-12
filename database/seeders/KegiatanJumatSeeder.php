<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class KegiatanJumatSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('kegiatan_jumats')->insert([
            [
                'nama_kegiatan' => 'Khutbah Jumat',
                'nama_khatib' => 'Ustadz Ali',
                'nama_muadzin' => 'Ustadz Hasan',
                'tanggal_kegiatan' => now(),
                'tempat_kegiatan' => 'Masjid Al-Falah',
            ],
            [
                'nama_kegiatan' => 'Shalat Jumat',
                'nama_khatib' => 'Ustadz Ahmad',
                'nama_muadzin' => 'Ustadz Budi',
                'tanggal_kegiatan' => now(),
                'tempat_kegiatan' => 'Masjid Al-Falah',
            ],
        ]);
    }
}
