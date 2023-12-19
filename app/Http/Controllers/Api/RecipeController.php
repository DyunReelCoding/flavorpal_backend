<?php

namespace App\Http\Controllers\Api;

use App\Models\Recipe;
use App\Http\Controllers\Controller;
use App\Http\Requests\RecipeRequest;

class RecipeController extends Controller
{
    public function index()
    {
        return Recipe::all();
    }

    public function show(string $recipe_id)
    {
        return Recipe::findOrFail($recipe_id);
    }

    public function store(RecipeRequest $request)
    {
        $validated = $request->validated();

        $recipe = Recipe::create($validated);

        return $recipe;
    }

    public function update(RecipeRequest $request, string $recipe_id)
    {
        $validated = $request->validated();

        $recipe = Recipe::findOrFail($recipe_id);

        $recipe->update($validated);

        return $recipe;
    }

    public function destroy(string $recipe_id)
    {
        $recipe = Recipe::findOrFail($recipe_id);

        $recipe->delete();

        return $recipe;
    }
    public function getLatestRecipeId()
    {
        $latestRecipe = Recipe::latest()->first();

        return response()->json(['latest_recipe_id' => $latestRecipe->recipe_id]);
    }
}
