<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\AuthController;
use App\Http\Controllers\Api\NutritionController;
use App\Http\Controllers\Api\RecipeController;
use App\Http\Controllers\Api\UserPreferenceController;
use App\Http\Controllers\Api\SavedRecipeController;
use App\Http\Controllers\Api\RatingController;





/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});



Route::post('/register', [AuthController::class, 'register']);
Route::post('/login', [AuthController::class, 'login']);
Route::get('/login/{id}', [AuthController::class, 'show']);
Route::get('/latest-login-id', [AuthController::class, 'getLatestLoginId']);


// Routes for the RecipeController API

Route::controller(RecipeController::class)->group(function () {
    Route::get('/recipe',             'index');
    Route::get('/recipe/{recipe_id}',   'show');
    Route::get('/latest-recipe-id', 'getLatestRecipeId');
    Route::post('/recipe',            'store');
    Route::put('/recipe/{recipe_id}',   'update');
    Route::delete('/recipe/{recipe_id}',     'destroy');
});

// Routes for the NutritionController API

Route::controller(NutritionController::class)->group(function () {
    Route::get('/nutrition',             'index');
    Route::get('/nutrition/{nutrition_id}',   'show');
    Route::post('/nutrition',            'store');
    Route::put('/nutrition/{nutrition_id}',   'update');
    Route::delete('/nutrition/{nutrition_id}',     'destroy');
    Route::get('/latest-nutrition-id', 'getLatestNutritionId');
});

// Routes for the RatingController API

Route::controller(RatingController::class)->group(function () {
    Route::get('/rating',             'index');
    Route::get('/rating/{rating_id}',   'show');
    Route::post('/rating',            'store');
    Route::put('/rating/{rating_id}',   'update');
    Route::delete('/rating/{rating_id}',     'destroy');
});

// Routes for the SavedRecipeController API

Route::controller(SavedRecipeController::class)->group(function () {
    Route::get('/saved-recipe',             'index');
    Route::get('/saved-recipe/{saved_recipe_id}',   'show');
    Route::post('/saved-recipe',            'store');
    Route::put('/saved-recipe/{saved_recipe_id}',   'update');
    Route::delete('/saved-recipe/{saved_recipe_id}',     'destroy');
});

// Routes for the UserPreferenceController API

Route::controller(UserPreferenceController::class)->group(function () {
    Route::get('/user-preference',             'index');
    Route::get('/user-preference/{preference_id}',   'show');
    Route::post('/user-preference',            'store');
    Route::put('/user-preference/{preference_id}',   'update');
    Route::delete('/user-preference/{preference_id}',     'destroy');
});
