<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class KelasSeeder extends Seeder
{
    public function run()
    {
        DB::table('kelas')->insert([
            ['nama_kelas' => 'X RPL', 'kompetensi_keahlian' => 'Rekayasa Perangkat Lunak'],
            ['nama_kelas' => 'XI RPL', 'kompetensi_keahlian' => 'Rekayasa Perangkat Lunak'],
            ['nama_kelas' => 'XII RPL', 'kompetensi_keahlian' => 'Rekayasa Perangkat Lunak'],
        ]);
    }
}
