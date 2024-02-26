<?php

namespace App\Http\Controllers\Learn;

use App\Http\Controllers\Controller;
use App\Http\Requests\DisplayRequest;
use Illuminate\Http\Request;
use App\Models\LearningData;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class IndexController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(DisplayRequest $request)
    {

        $yearMonthOfUserAssign = $request->input('month');

        if($yearMonthOfUserAssign){

            $studyMonth = Carbon::createFromFormat('Y-m', $yearMonthOfUserAssign)->format('n');

            $backend = LearningData::where('user_id', $request->userId())
            ->where('category_id', 1)
            ->whereRaw('EXTRACT(MONTH FROM created_at) = ?', [$studyMonth])
            ->get();

            $frontend = LearningData::where('user_id', $request->userId())
            ->where('category_id', 2)
            ->whereRaw('EXTRACT(MONTH FROM created_at) = ?', [$studyMonth])
            ->get();

            $infrastructure = LearningData::where('user_id', $request->userId())
            ->where('category_id', 3)
            ->whereRaw('EXTRACT(MONTH FROM created_at) = ?', [$studyMonth])
            ->get();

        } else {

        $currentMonth = Carbon::now()->format('n');

        $backend = LearningData::where('user_id', $request->userId())
        ->where('category_id', 1)
        ->whereRaw('EXTRACT(MONTH FROM created_at) = ?', [$currentMonth])
        ->get();

        $frontend = LearningData::where('user_id', $request->userId())
        ->where('category_id', 2)
        ->whereRaw('EXTRACT(MONTH FROM created_at) = ?', [$currentMonth])
        ->get();

        $infrastructure = LearningData::where('user_id', $request->userId())
        ->where('category_id', 3)
        ->whereRaw('EXTRACT(MONTH FROM created_at) = ?', [$currentMonth])
        ->get();
        }

        return view('learn.index')
                ->with('backend', $backend)
                ->with('frontend', $frontend)
                ->with('infrastructure', $infrastructure)
                ->with('yearMonthOfUserAssign', $yearMonthOfUserAssign);
    }
}
