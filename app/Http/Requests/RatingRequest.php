<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RatingRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'user_id' => 'required|exists:Logins,user_id',
            'recipe_id' => 'required|exists:Recipes,recipe_id',
            'score' => 'required|integer',
            'review' => 'nullable|string',
        ];
    }
}
