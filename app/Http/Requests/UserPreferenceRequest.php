<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UserPreferenceRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'user_id' => 'required|exists:Logins,user_id',
            'preference_type' => 'required|string',
        ];
    }

    public function response(array $errors)
    {
        return response()->json(['error' => $errors], 422);
    }
}
