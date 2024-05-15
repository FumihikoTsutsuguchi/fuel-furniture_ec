<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('primary_categories')->insert([
            [
                'name' => 'テーブル/デスク',
                'sort_order' => 1,
            ],
            [
                'name' => 'シェルフ',
                'sort_order' => 2,
            ],
            [
                'name' => 'ラック',
                'sort_order' => 3,
            ],
            [
                'name' => 'DIY',
                'sort_order' => 4,
            ],
            [
                'name' => 'TVボード',
                'sort_order' => 5,
            ],
        ]);

        DB::table('secondary_categories')->insert([
            [
                'name' => 'ダイニングテーブル',
                'sort_order' => 1,
                'primary_category_id' => 1
            ],
            [
                'name' => 'カフェテーブル',
                'sort_order' => 2,
                'primary_category_id' => 1
            ],
            [
                'name' => 'ブックシェルフ',
                'sort_order' => 3,
                'primary_category_id' => 2
            ],
            [
                'name' => 'シューズシェルフ',
                'sort_order' => 4,
                'primary_category_id' => 2
            ],
            [
                'name' => 'ハンガーラック',
                'sort_order' => 5,
                'primary_category_id' => 3
            ],
        ]);
    }
}
