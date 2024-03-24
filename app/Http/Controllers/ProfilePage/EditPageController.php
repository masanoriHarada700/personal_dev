<?php

namespace App\Http\Controllers\ProfilePage;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;

class EditPageController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(Request $request)
    {
        $introduction = User::where('id', $request->user()->id)->first()->introduction;

        return view('profilePage.edit',compact('introduction'));
    }
}
