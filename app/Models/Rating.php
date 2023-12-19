<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Login;
use App\Models\Recipe;

class Rating extends Model
{
    protected $primaryKey = 'rating_id';

    protected $fillable = [
        'user_id',
        'recipe_id',
        'score',
        'review',
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
