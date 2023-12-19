<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Recipe;

class Nutrition extends Model
{
    use HasFactory;

    protected $primaryKey = 'nutrition_id';

    protected $fillable = [
        'recipe_id',
        'calories',
        'protein',
        'carbohydrates',
        'fat',
        'fiber',
    ];

    public function recipe()
    {
        return $this->belongsTo(Recipe::class, 'recipe_id');
    }
}
