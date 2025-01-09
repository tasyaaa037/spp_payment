<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SppSeeder extends Seeder
{
    public function run()
    {
        DB::table('spp')->insert([
            ['nominal' => 500000, 'tahun' => 2023],
            ['nominal' => 550000, 'tahun' => 2024],
            ['nominal' => 600000, 'tahun' => 2025],
        ]);
    }
}
