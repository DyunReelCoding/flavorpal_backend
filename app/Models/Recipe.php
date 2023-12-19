<?php

// app/Recipe.php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Login;

class Recipe extends Model
{
    protected $primaryKey = 'recipe_id';

    protected $fillable = [
        'user_id',
        'title',
        'description',
    ];

    public function user()
    {
        return $this->belongsTo(Login::class, 'user_id');
    }
}
