<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class AkunSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $data = [
            [
                'name' => 'Ivan',
                'email' => 'admin@gmail.com',
                'password' => bcrypt ('admin01'),
                'role' => '1',
            ],
             [
                'name' => 'Tasya',
                'email' => 'tugas@gmail.com',
                'password' => bcrypt ('tugas02'),
                'role' => '2',
            ],
             [
                'name' => 'Ayu',
                'email' => 'ayu@gmail.com',
                'password' => bcrypt ('ayu03'),
                'role' => '3',
            ],
        ];
        foreach($data as $key => $d){
            User::create($d);
        }
    }
}