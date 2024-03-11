<?php

namespace App\Http\Controllers\ProfilePage;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class EditPageController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(Request $request)
    {
        return view('profilePage.edit');
    }
}
