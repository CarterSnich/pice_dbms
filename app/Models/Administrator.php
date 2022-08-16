<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class Administrator extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    // fillables
    protected $fillable = [
        'email',
        'name',
        'password'
    ];

    // hidden
    protected $hidden = [
        'password',
        'remember_token'
    ];
}
