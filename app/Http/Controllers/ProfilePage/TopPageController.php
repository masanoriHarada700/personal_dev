<?php

namespace App\Http\Controllers\profilePage;

use App\Http\Controllers\Controller;
use Carbon\Carbon;
use App\Models\LearningData;
use App\Models\Category;
use App\Models\User;
use Illuminate\Http\Request;

class TopPageController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(Request $request)
    {

        $user = User::where('id', $request->user()->id)->first();

        // $categoryIds = [];
        $months = [];

        // $categoryIds = Category::pluck('id')->toArray();
        $categoryIds = Category::pluck('id','name')->toArray();

        $thisMonth = Carbon::now()->format('n');
        $lastMonth = Carbon::now()->subMonth(1)->format('n');
        $monthBeforeLast = Carbon::now()->subMonth(2)->format('n');

        $months = [$monthBeforeLast, $lastMonth, $thisMonth];
        // dd($thisMonth);
        // dd($categoryIds);
        // 対象となる年

        // 1月から3月までの各月に対してループ
        $amountTimesByCategoryId = [];

        foreach ($categoryIds as $categoryName => $id) {
            // 各カテゴリーIDごとに新しい配列を初期化
            $amountTimes = [];

            foreach ($months as $month) {
                // 指定された月の合計学習時間を合計
                $amountTime = LearningData::where('user_id', $request->user()->id)
                                ->where('category_id', $id)
                                ->where('learning_month', $month)
                                ->sum('learning_time');
                // その月の合計学習時間を配列に追加
                $amountTimes[] = $amountTime;
            }
            // 各カテゴリーIDごとに月ごとの合計学習時間を格納
            $amountTimesByCategoryId[$categoryName] = $amountTimes;
            // dd($amountTimes);
        }
        // dd($amountTimesByCategoryId);
        return view('profilePage.profile',compact('amountTimesByCategoryId', 'user'));
    }
}