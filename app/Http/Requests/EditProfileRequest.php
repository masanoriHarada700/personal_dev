<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class EditProfileRequest extends FormRequest
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
            'profile_sentence' => 'required|min:50|max:200',
            // 'image' => 'array|max:1',
        ];
    }

    public function messages(): array
    {
        return [
            'profile_sentence.min' => '自己紹介は50文字以上、200文字以下で入力してください',
        ];
    }
}
