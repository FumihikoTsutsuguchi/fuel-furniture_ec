<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;


class OwnerSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('owners')->insert([
            [
                'name' => '筒口 オーナー',
                'email' => 'fumisamu927@gmail.com',
                'password' => Hash::make('password123'),
                'created_at' => '2024/05/01 11:11:11'
            ]
        ]);
    }
}
