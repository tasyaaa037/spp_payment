<?php

namespace Database\Seeders;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PembayaranSeeder extends Seeder
{
    public function run()
    {
        DB::table('pembayaran')->insert([
            [
                'id_petugas' => 1,
                'nisn' => '1234567890',
                'tgl_bayar' => '2025-01-01',
                'bulan_dibayar' => 'Januari',
                'tahun_dibayar' => '2025',
                'id_spp' => 1,
                'jumlah_bayar' => 500000,
            ],
            [
                'id_petugas' => 2,
                'nisn' => '0987654321',
                'tgl_bayar' => '2025-02-01',
                'bulan_dibayar' => 'Februari',
                'tahun_dibayar' => '2025',
                'id_spp' => 2,
                'jumlah_bayar' => 550000,
            ],
        ]);
    }
}
