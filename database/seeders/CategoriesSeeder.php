<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Category;

class CategoriesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // データの配列
        $categories = ['バックエンド', 'フロントエンド', 'インフラ'];

        // 各カテゴリーに対してループ処理
        foreach ($categories as $categoryName) {
            Category::create([
                'name' => $categoryName,
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    }
}
