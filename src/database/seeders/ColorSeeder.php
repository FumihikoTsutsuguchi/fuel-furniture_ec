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
                'name' => 'red',
                'filename' => 'color1.jpg',
            ],
            [
                'name' => 'blue',
                'filename' => 'color2.jpg',
            ],
            [
                'name' => 'yellow',
                'filename' => 'color3.jpg',
            ],
        ]);
    }
}
