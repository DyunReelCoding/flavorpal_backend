<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class NutritionRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'recipe_id' => 'required|exists:recipes,recipe_id',
            'calories' => 'required|numeric|min:0',
            'protein' => 'required|numeric|min:0',
            'carbohydrates' => 'required|numeric|min:0',
            'fat' => 'required|numeric|min:0',
            'fiber' => 'required|numeric|min:0',
        ];
    }
}
