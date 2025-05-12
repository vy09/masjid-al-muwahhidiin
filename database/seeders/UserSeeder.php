<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('users')->insert([
            [
                'name' => 'Ketua',
                'email' => 'ketua@gmail.com',
                'password' => Hash::make('123456'),
                'role_id' => 1,
            ],
            [
                'name' => 'Bendahara',
                'email' => 'bendahara@gmail.com',
                'password' => Hash::make('123456'),
                'role_id' => 2,
            ],
            [
                'name' => 'Sekretaris',
                'email' => 'sekretaris@gmail.com',
                'password' => Hash::make('123456'),
                'role_id' => 3,
            ],
            [
                'name' => 'Anggota',
                'email' => 'anggota@gmail.com',
                'password' => Hash::make('123456'),
                'role_id' => 4,
            ]
        ]);
    }
}
