<?php

namespace App\Http\Controllers\Learn;

use App\Http\Controllers\Controller;
use App\Http\Requests\DisplayRequest;
use Illuminate\Http\Request;
use App\Models\LearningData;
use App\Models\Category;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class IndexController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(DisplayRequest $request)
    {

        if(session('yearMonthOfUserAssign')){

            $yearMonthOfUserAssign = session('yearMonthOfUserAssign');

        } else {

            $yearMonthOfUserAssign = $request->input('month');

        }

        if($yearMonthOfUserAssign){

            $studyMonth = Carbon::createFromFormat('Y-m', $yearMonthOfUserAssign)->format('n');

            $backend = LearningData::where('user_id', $request->userId())
            ->where('category_id', 1)
            ->where('learning_month', [$studyMonth])
            ->get();

            $frontend = LearningData::where('user_id', $request->userId())
            ->where('category_id', 2)
            ->where('learning_month', [$studyMonth])
            ->get();

            $infrastructure = LearningData::where('user_id', $request->userId())
            ->where('category_id', 3)
            ->where('learning_month', [$studyMonth])
            ->get();

        } else {

        $currentMonth = Carbon::now()->format('n');

        $backend = LearningData::where('user_id', $request->userId())
        ->where('category_id', 1)
        ->where('learning_month', [$currentMonth])
        ->get();

        $frontend = LearningData::where('user_id', $request->userId())
        ->where('category_id', 2)
        ->where('learning_month', [$currentMonth])
        ->get();

        $infrastructure = LearningData::where('user_id', $request->userId())
        ->where('category_id', 3)
        ->where('learning_month', [$currentMonth])
        ->get();
        }

        $values = Category::pluck('name')->toArray();
        $keys = ['strBackend', 'strFrontend', 'strInfrastructure'];
        $categories = array_combine($keys, $values);

        if(session('editTime.success') || session('delete.success')){

            session()->put('yearMonthOfUserAssign', $yearMonthOfUserAssign);

        } else {
            session()->forget('yearMonthOfUserAssign');
        }

        return view('Learn.index')
                ->with([
                    'categories' => $categories,
                    'backend' => $backend,
                    'frontend' => $frontend,
                    'infrastructure' => $infrastructure,
                    'yearMonthOfUserAssign' => $yearMonthOfUserAssign,
                ]);
    }
}