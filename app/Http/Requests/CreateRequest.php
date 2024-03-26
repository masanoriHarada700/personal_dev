<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use App\Models\LearningData;
use Carbon\Carbon;
use App\Models\Category;
use App\Http\Requests\DisplayRequest;

class CreateRequest extends DisplayRequest
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
            'item' => ['required', 'string', 'max:50',],
            'learning_time' => ['required', 'numeric', 'decimal:0', 'min:0',],
        ];
    }

    public function withValidator($validator)
    {
        $validator->after(function ($validator) {

            $yearMonth = $this->session()->get('yearMonthOfUserAssign');
            $month = Carbon::createFromFormat('Y-m', $yearMonth)->format('n');
            $categoryName = $this->session()->get('categoryName');
            $category = Category::where('name', $categoryName)->first();

            $exists = LearningData::where('user_id', $this->userId())
                                  ->where('learning_month', $month)
                                  ->where('learning_item', $this->item)
                                  ->where('category_id', $category->id)
                                  ->exists();
            if ($exists) {
                $validator->errors()->add('item', "{$this->item}は既に登録されています。");
            }
        });
    }

    public function messages(): array
    {
        return [
            'learning_time.min' => '学習時間には、0以上の数字を指定してください。',
        ];
    }
}
