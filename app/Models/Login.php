<?php

namespace App\models;

use Illuminate\Database\Eloquent\Model;

class Login extends Model
{
    protected $fillable = ['email', 'login_time'];
}
