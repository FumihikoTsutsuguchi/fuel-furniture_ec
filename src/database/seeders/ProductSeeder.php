<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('products')->insert([
            [
                'shop_id' => 1,
                'secondary_category_id' => 1,
                'image1' => 1,
                'color_id' => 1,
                'size_id' => 1,
            ],
            [
                'shop_id' => 1,
                'secondary_category_id' => 2,
                'image1' => 2,
                'color_id' => 2,
                'size_id' => 2,
            ],
            [
                'shop_id' => 1,
                'secondary_category_id' => 4,
                'image1' => 3,
                'color_id' => 3,
                'size_id' => 3,
            ],
            [
                'shop_id' => 1,
                'secondary_category_id' => 4,
                'image1' => 4,
                'color_id' => 1,
                'size_id' => 2,
            ],
            [
                'shop_id' => 1,
                'secondary_category_id' => 5,
                'image1' => 4,
                'color_id' => 2,
                'size_id' => 3,
            ],
        ]);
    }
}
