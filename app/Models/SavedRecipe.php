<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Login;
use App\Models\Recipe;

class SavedRecipe extends Model
{
    use HasFactory;

    protected $primaryKey = 'saved_recipe_id';

    protected $fillable = [
        'user_id',
        'recipe_id',
    ];

    public function user()
    {
        return $this->belongsTo(Login::class, 'user_id');
    }

    public function recipe()
    {
        return $this->belongsTo(Recipe::class, 'recipe_id');
    }
}
