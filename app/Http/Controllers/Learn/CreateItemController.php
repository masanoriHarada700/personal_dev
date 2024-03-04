<?php

namespace App\Http\Controllers\Learn;

use App\Http\Controllers\Controller;
use App\Http\Requests\CreateRequest;
use App\Models\LearningData;
use App\Models\Category;
use Carbon\Carbon;
use App\Providers\RouteServiceProvider;
use Illuminate\Http\Request;

class CreateItemController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(CreateRequest $request)
    {
        $categoryName = $request->session()->get('categoryName');
        $category = Category::where('name', $categoryName)->first();
        $yearMonth = $request->session()->get('yearMonthOfUserAssign');
        $month = Carbon::createFromFormat('Y-m', $yearMonth)->format('n');

        $learningData = new LearningData;
        $learningData->category_id = $category->id;
        $learningData->user_id = $request->userId();
        $learningData->learning_item = $request->input('item');
        $learningData->learning_time = $request->input('learning_time');
        $learningData->learning_month = $month;
        $learningData->save();

        $item = $request->item;
        $learningTime = $request->learning_time;

        return redirect()->route('input.item')
                ->with('addItem.success',"{$categoryName}に{$item}を\n{$learningTime}分で追加しました！");
    }
}
