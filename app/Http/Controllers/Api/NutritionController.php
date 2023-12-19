<?php

namespace App\Http\Controllers\Api;

use App\Models\Nutrition;
use App\Http\Controllers\Controller;
use App\Http\Requests\NutritionRequest;

class NutritionController extends Controller
{
    public function index()
    {
        return Nutrition::all();
    }

    public function show(string $nutrition_id)
    {
        return Nutrition::findOrFail($nutrition_id);
    }

    public function store(NutritionRequest $request)
    {
        $validated = $request->validated();

        $nutrition = Nutrition::create($validated);

        return $nutrition;
    }

    public function update(NutritionRequest $request, string $nutrition_id)
    {
        $validated = $request->validated();

        $nutrition = Nutrition::findOrFail($nutrition_id);

        $nutrition->update($validated);

        return $nutrition;
    }

    public function destroy(string $nutrition_id)
    {
        $nutrition = Nutrition::findOrFail($nutrition_id);

        $nutrition->delete();

        return $nutrition;
    }

    public function getLatestNutritionId()
    {
        $latestNutrition = Nutrition::latest()->first();

        return response()->json(['latest_nutrition_id' => $latestNutrition->nutrition_id]);
    }
}
