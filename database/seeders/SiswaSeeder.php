<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SiswaSeeder extends Seeder
{
    public function run()
    {
        DB::table('siswa')->insert([
            [
                'nisn' => '1234567890',
                'nis' => '20230001',
                'nama' => 'Ahmad Fauzan',
                'alamat' => 'Jl. Merdeka No. 1',
                'no_telp' => '081234567890',
                'id_kelas' => 1,
                'id_spp' => 1,
            ],
            [
                'nisn' => '0987654321',
                'nis' => '20230002',
                'nama' => 'Siti Aminah',
                'alamat' => 'Jl. Sudirman No. 2',
                'no_telp' => '081987654321',
                'id_kelas' => 2,
                'id_spp' => 2,
            ],
        ]);
    }
}
