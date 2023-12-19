<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class UserPreference extends Model
{
    protected $table = 'UserPreference'; // Specify the table name

    protected $primaryKey = 'preference_id'; // Specify the primary key

    protected $fillable = [
        'user_id',
        'preference_type',
    ];

    public function user()
    {
        return $this->belongsTo(Login::class, 'user_id');
    }
}
