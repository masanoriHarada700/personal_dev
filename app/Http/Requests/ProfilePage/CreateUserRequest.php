<?php

namespace App\Http\Requests\ProfilePage;

use Illuminate\Foundation\Http\FormRequest;

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
            'mail_address' => ['required', 'email:strict,dns,spoof'],
            'password' => ['required', 'regex:/[a-zA-Z]/', 'regex:/[0-9]/', 'min:8'],
            'introduction' => 'min:50|max:200'
        ];
    }
}
