<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Category;
use App\Models\User;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\LearningData>
 */
class LearningDataFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        // $categoryIds = Category::pluck('id')->toArray();
        // $randomKey = array_rand($categoryIds);
        // $randomCategoryId = $categoryIds[$randomKey];


        // $userIds = User::pluck('id')->toArray();
        // $randomUserKey = array_rand($userIds);
        // $randomUserId = $userIds[$randomUserKey];

        // // Category IDに応じて学習アイテムを選択
        // $learningItems = [
        //     1 => ['Ruby', 'PHP', 'Java'],
        //     2 => ['HTML', 'CSS'],
        //     3 => ['AWS', 'Heroku', 'Render'],
        // ];

        // // 選択したCategory IDに基づいてランダムに学習アイテムを選択
        // $selectedLearningItem = $learningItems[$randomCategoryId][array_rand($learningItems[$randomCategoryId])];

        return [
            // 'category_id' => $randomCategoryId,
            // 'user_id' => $randomUserId,
            // 'learning_item' => $selectedLearningItem,
            // 'learning_time' => rand(1, 100),
            // 'learning_month' => 2,
            // 'created_at' => now(),
            // 'updated_at' => now(),
        ];
    }
}
