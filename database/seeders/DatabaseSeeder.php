<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    public function run()
    {
        $this->call([
            KategoriTransaksiSeeder::class,
            RoleSeeder::class,
            KegiatanMasjidSeeder::class,
            KegiatanJumatSeeder::class,
            UserSeeder::class,
            TransaksiSeeder::class,
        ]);
    }
}
