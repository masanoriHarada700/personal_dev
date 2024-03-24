<?php

namespace App\Http\Controllers\Learn;

use App\Http\Controllers\Controller;
use App\Http\Requests\LearningTimeRequest;
use Carbon\Carbon;
use App\Models\LearningData;
use App\Models\Category;

class EditTimeController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(LearningTimeRequest $request)
    {
        $categoryName = $request->categoryName;
        $category = Category::where('name', $categoryName)->first();
        $yearMonth = $request->input('month');
        $month = Carbon::createFromFormat('Y-m', $yearMonth)->format('n');
        $time = $request->learning_time;

        LearningData::where('user_id', $request->user()->id)
        ->where('learning_month', $month)
        ->where('learning_item', $request->itemName)
        ->where('category_id', $category->id)
        ->update([
            'learning_time' => $request->learning_time,
            'updated_at' => Carbon::now()
        ]);

        session()->put('yearMonthOfUserAssign', $yearMonth);

        return redirect()->route('show_study')
        ->with('editTime.success',"{$request->itemName}の学習時間を保存しました！");
    }
}
