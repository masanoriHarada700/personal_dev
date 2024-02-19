<?php

namespace App\Http\Controllers\ProfilePage;

use App\Http\Controllers\Controller;
use App\Models\Users_profiles;
use App\Http\Requests\ProfilePage\CreateUserRequest;
use Illuminate\Support\Facades\Hash;

class CreateUserController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(CreateUserRequest $request)
    {
       $user = new Users_profiles;
       $user->name = $request->name;
       $user->mail_address = $request->mail_address;
       $user->password = Hash::make($request->password);
       $user->save();
        // $user = Users_profiles::create([
        //     'name' => $request->name,
        //     'mail_address' => $request->email,
        //     'password' => Hash::make($request->password),
        // ]);

        return redirect()->route('profilePage.profile');
    }
}
