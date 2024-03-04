<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class DisplayRequest extends FormRequest
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
            //
        ];
    }

    public function userId(): int
    {
        return $this->user()->id;
    }

    public function month(): int
    {
        return $this->month;
    }

    public function categoryName()
    {
        return $this->categoryName;
    }
}
