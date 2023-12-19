<?php

// app/Http/Requests/CreateSavedRecipeRequest.php
namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class SavedRecipeRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'user_id' => 'required|exists:Logins,user_id',
            'recipe_id' => 'required|exists:recipes,recipe_id',
        ];
    }
}
