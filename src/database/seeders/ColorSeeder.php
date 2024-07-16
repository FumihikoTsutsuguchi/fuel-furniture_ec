<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ColorSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('colors')->insert([
            [
                'owner_id' => 1,
                'name' => 'shockingPink',
                'filename' => 'color1.jpg',
            ],
            [
                'owner_id' => 1,
                'name' => 'Pink',
                'filename' => 'color2.jpg',
            ],
            [
                'owner_id' => 1,
                'name' => 'lime',
                'filename' => 'color3.jpg',
            ],
        ]);
    }
}
