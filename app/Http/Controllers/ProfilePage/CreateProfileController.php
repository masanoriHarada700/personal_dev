<?php

namespace App\Http\Controllers\ProfilePage;

use App\Http\Controllers\Controller;
use App\Http\Requests\EditProfileRequest;
use App\Models\User;
use Illuminate\Support\Facades\Storage;

class CreateProfileController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(EditProfileRequest $request)
    {
        if (!Storage::exists('public/image')) {
            Storage::makeDirectory(('public/image'));
        }

        $image = $request->file('image', []);

        If($image){
            Storage::putFile('public/image', $image);

            User::where('id', $request->user()->id)
            ->update([
                'introduction' => $request->profile_sentence,
                'profile_image' => $image->hashName(),
            ]);
        } Else {
            User::where('id', $request->user()->id)
            ->update([
                'introduction' => $request->profile_sentence,
            ]);
        }


        return redirect()->route('profilePage.profile');
    }
}
