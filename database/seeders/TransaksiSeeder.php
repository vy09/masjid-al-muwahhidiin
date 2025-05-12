<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Faker\Factory as Faker;

class TransaksiSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = Faker::create('id_ID');
        $data = [];

        for ($i = 0; $i < 60; $i++) { // 60 data (2 transaksi per hari selama 30 hari)
            $date = now()->subDays(rand(0, 29)); // Acak dalam rentang 30 hari ke belakang

            $tipe = $i % 2 == 0 ? 'pemasukan' : 'pengeluaran';
            $kategoriId = $tipe === 'pemasukan' ? rand(1, 3) : rand(4, 6);

            $data[] = [
                'user_id' => 1,
                'kategori_transaksi_id' => $kategoriId,
                'nominal' => $faker->numberBetween(50000, 500000),
                'deskripsi' => $faker->sentence(),
                'tipe_transaksi' => $tipe,
                'tanggal_transaksi' => $date,
                'created_at' => now(),
                'updated_at' => now(),
            ];
        }

        DB::table('transaksis')->insert($data);
    }
}
