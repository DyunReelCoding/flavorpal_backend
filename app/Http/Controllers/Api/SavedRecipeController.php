<?php

namespace App\Http\Controllers\Api;

use App\Models\SavedRecipe;
use App\Http\Controllers\Controller;
use App\Http\Requests\SavedRecipeRequest;

class SavedRecipeController extends Controller
{
    public function index()
    {
        $savedRecipes = SavedRecipe::all();
        return response()->json($savedRecipes, 200);
    }

    public function show($id)
    {
        $savedRecipe = SavedRecipe::findOrFail($id);

        if (!$savedRecipe) {
            return response()->json(['message' => 'Saved recipe not found'], 404);
        }

        return response()->json($savedRecipe, 200);
    }

    public function store(SavedRecipeRequest $request)
    {
        $savedRecipe = SavedRecipe::create($request->all());

        return response()->json($savedRecipe, 201);
    }

    public function update(SavedRecipeRequest $request, $id)
    {
        $savedRecipe = SavedRecipe::findOrFail($id);

        if (!$savedRecipe) {
            return response()->json(['message' => 'Saved recipe not found'], 404);
        }

        $savedRecipe->update($request->all());

        return response()->json($savedRecipe, 200);
    }

    public function destroy($id)
    {
        $savedRecipe = SavedRecipe::findOrFail($id);

        if (!$savedRecipe) {
            return response()->json(['message' => 'Saved recipe not found'], 404);
        }

        $savedRecipe->delete();

        return response()->json(['message' => 'Saved recipe deleted'], 200);
    }
}
