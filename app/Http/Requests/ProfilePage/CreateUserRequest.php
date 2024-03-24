<?php

namespace App\Http\Requests\ProfilePage;

use Illuminate\Foundation\Http\FormRequest;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\RateLimiter;
use Illuminate\Validation\ValidationException;
use Illuminate\Support\Facades\Hash;

class CreateUserRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'name' => 'required|max:255',
            'email' => ['required', 'email:strict,dns,spoof'],
            'password' => ['required', 'regex:/[a-zA-Z]/', 'regex:/[0-9]/', 'min:8'],
            'introduction' => 'min:50|max:200'
        ];
    }

    public function withValidator($validator)
    {
        $validator->after(function ($validator) {

            $exists = User::where('email', $this->email)->exists();

            if ($exists) {
                $validator->errors()->add('Duplication', "登録しようとしたメールアドレスは既に登録されています。");
            }
            // $this->session()->flash('Duplication', 'メールアドレス、もしくはパスワードが既に登録されています。');

            // $password = User::where('email', $this->email)->pluck('password')->toArray();

            // Hash::check();

            // if ($exists) {
            //     $validator->errors()->add('Duplication_password', "登録しようとしたパスワードは既に登録されています。");
            // }
        });
    }
}
