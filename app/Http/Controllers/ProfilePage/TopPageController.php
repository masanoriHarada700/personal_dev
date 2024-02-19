<?php

namespace App\Http\Controllers\profilePage;

use App\Http\Controllers\Controller;
// use Illuminate\Http\Request;

class TopPageController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke()
    {
        return view('profilePage.profile');
    }
}
