<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use App\Models\Category;
use App\Models\User;
use Carbon\Carbon;


class LearningDataSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $userIds = User::pluck('id')->toArray();
        $categoryIds = Category::pluck('id')->toArray();
        foreach ($userIds as $userId){
            foreach ($categoryIds as $categoryId){
                switch ($categoryId) {
                    case 1:
                            // category_idが1の場合の処理
                            $learningItems[] = ['user_id' => $userId, 'category_id' => 1, 'learning_item' => 'Ruby', 'learning_time' => rand(1, 100), 'learning_month' => 2, 'created_at' => Carbon::now()->subMonth(), 'updated_at' => now()];
                            $learningItems[] = ['user_id' => $userId, 'category_id' => 1, 'learning_item' => 'PHP', 'learning_time' => rand(1, 100), 'learning_month' => 2, 'created_at' => Carbon::now()->subMonth(), 'updated_at' => now()];
                            $learningItems[] = ['user_id' => $userId, 'category_id' => 1, 'learning_item' => 'Java', 'learning_time' => rand(1, 100), 'learning_month' => 2, 'created_at' => Carbon::now()->subMonth(), 'updated_at' => now()];
                            break;
                    case 2:
                            // category_idが2の場合の処理
                            $learningItems[] = ['user_id' => $userId, 'category_id' => 2, 'learning_item' => 'HTML', 'learning_time' => rand(1, 100), 'learning_month' => 1, 'created_at' => now(), 'updated_at' => now()];
                            $learningItems[] = ['user_id' => $userId, 'category_id' => 2, 'learning_item' => 'CSS', 'learning_time' => rand(1, 100), 'learning_month' => 1, 'created_at' => now(), 'updated_at' => now()];
                            break;
                    case 3:
                            // category_idが3の場合の処理
                            $learningItems[] = ['user_id' => $userId, 'category_id' => 3, 'learning_item' => 'AWS', 'learning_time' => rand(1, 100), 'learning_month' => 1, 'created_at' => now(), 'updated_at' => now()];
                            $learningItems[] = ['user_id' => $userId, 'category_id' => 3, 'learning_item' => 'Heroku', 'learning_time' => rand(1, 100), 'learning_month' => 1, 'created_at' => now(), 'updated_at' => now()];
                            $learningItems[] = ['user_id' => $userId, 'category_id' => 3, 'learning_item' => 'Render', 'learning_time' => rand(1, 100), 'learning_month' => 1, 'created_at' => now(), 'updated_at' => now()];
                            break;
                    default:
                            $learningItems[] = [];
                            break;
                }

            }
        };

        // 各レコードをデータベースに挿入
        foreach ($learningItems as $item) {
            DB::table('learning_data')->insert($item);
        }

        // LearningDataモデルを使用してデータベースに登録
        // LearningData::factory()->count(10)->create();
    }
}
