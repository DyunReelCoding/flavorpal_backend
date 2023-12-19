<?php

namespace App\Http\Controllers\Api;

use App\Models\Rating;
use App\Http\Controllers\Controller;
use App\Http\Requests\RatingRequest;

class RatingController extends Controller
{
    public function index()
    {
        return Rating::all();
    }

    public function show(string $rating_id)
    {
        return Rating::findOrFail($rating_id);
    }

    public function store(RatingRequest $request)
    {
        $validated = $request->validated();

        $rating = Rating::create($validated);

        return $rating;
    }

    public function update(RatingRequest $request, string $rating_id)
    {
        $validated = $request->validated();

        $rating = Rating::findOrFail($rating_id);

        $rating->update($validated);

        return $rating;
    }

    public function destroy(string $rating_id)
    {
        $rating = Rating::findOrFail($rating_id);

        $rating->delete();

        return $rating;
    }
}
