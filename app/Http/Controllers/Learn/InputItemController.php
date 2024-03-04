<?php

namespace App\Http\Controllers\Learn;

use App\Http\Controllers\Controller;
use App\Http\Requests\DisplayRequest;
use Illuminate\Support\Facades\Log;

class InputItemController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(DisplayRequest $request)
    {
        if($request->categoryName() || $request->input('month')){

            $categoryName = $request->categoryName();
            $yearMonth = $request->input('month');

        } Else {

            $categoryName = $request->session()->get('categoryName');
            $yearMonth = $request->session()->get('yearMonthOfUserAssign');

        }

        // if(!session('addItem.success') || !session('editTime.success')){

            $request->session()->put('categoryName', $categoryName);
            $request->session()->put('yearMonthOfUserAssign', $yearMonth);

        // }

        return view('Learn.register');

    }
}
