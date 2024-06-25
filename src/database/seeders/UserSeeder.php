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
            'name' => '筒口 ユーザー',
            'email' => 'fumisamu927@gmail.com',
            'address' => '福岡県福岡市博多区1-1-1-101',
            'tel' => '080-1111-1111',
            'password' => Hash::make('password123'),
            'created_at' => '2024/05/10 11:11:11'
        ]);
    }
}
