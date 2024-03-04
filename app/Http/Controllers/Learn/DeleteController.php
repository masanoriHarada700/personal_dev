<?php

namespace App\Http\Controllers\Learn;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Carbon\Carbon;
use App\Models\LearningData;
use App\Models\Category;

class DeleteController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(Request $request)
    {
        $categoryName = $request->categoryName;
        $category = Category::where('name', $categoryName)->first();
        $yearMonth = $request->input('month');
        $month = Carbon::createFromFormat('Y-m', $yearMonth)->format('n');

        LearningData::where('user_id', $request->user()->id)
        ->where('learning_month', $month)
        ->where('learning_item', $request->itemName)
        ->where('category_id', $category->id)
        ->delete();

        // session()->put('categoryName', $categoryName);
        session()->put('yearMonthOfUserAssign', $yearMonth);

        return redirect()->route('show_study')
        ->with('delete.success',"{$request->itemName}を削除しました！");
    }
}
