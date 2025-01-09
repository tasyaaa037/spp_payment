<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class PetugasSeeder extends Seeder
{
    public function run()
    {
        DB::table('petugas')->insert([
            [
                'username' => 'admin1',
                'password' => Hash::make('password123'),
                'nama_petugas' => 'Admin Utama',
                'level' => 'admin',
            ],
            [
                'username' => 'petugas1',
                'password' => Hash::make('password123'),
                'nama_petugas' => 'Petugas Sekolah',
                'level' => 'petugas',
            ],
        ]);
    }
}
