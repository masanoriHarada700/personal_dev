<?php

namespace App\Http\Controllers\ProfilePage;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class LoginController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(Request $request)
    {
        return view('profilePage.login');
    }
}
