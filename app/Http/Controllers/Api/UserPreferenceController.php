<?php

namespace App\Http\Controllers\Api;

use App\Models\UserPreference;
use App\Http\Controllers\Controller;
use App\Http\Requests\UserPreferenceRequest;

class UserPreferenceController extends Controller
{
    public function index()
    {
        $userPreferences = UserPreference::all();
        return response()->json($userPreferences, 200);
    }

    public function show($id)
    {
        $userPreference = UserPreference::find($id);

        if (!$userPreference) {
            return response()->json(['message' => 'User preference not found'], 404);
        }

        return response()->json($userPreference, 200);
    }

    public function store(UserPreferenceRequest $request)
    {
        $userPreference = UserPreference::create($request->all());

        return response()->json($userPreference, 201);
    }

    public function update(UserPreferenceRequest $request, $id)
    {
        $userPreference = UserPreference::findOrFail($id);

        if (!$userPreference) {
            return response()->json(['message' => 'User preference not found'], 404);
        }

        $userPreference->update($request->all());

        return response()->json($userPreference, 200);
    }

    public function destroy($id)
    {
        $userPreference = UserPreference::findOrFail($id);

        if (!$userPreference) {
            return response()->json(['message' => 'User preference not found'], 404);
        }

        $userPreference->delete();

        return response()->json(['message' => 'User preference deleted'], 200);
    }
}
