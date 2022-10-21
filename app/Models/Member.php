<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

use function PHPSTORM_META\map;

class Member extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    public static $roles = [
        'super_admin',
        'president',
        'secretary',
        'treasure',
        'information_officer'
    ];

    public static $memberships = ['regular', 'associate', 'affiliate', 'lifetime'];
    public static $civil_statuses = ['single', 'married', 'divorced', 'widowed'];

    protected $fillable = [
        'email',
        'password',
        'lastname',
        'firstname',
        'middlename',
        'picture'
    ];


    // hidden
    protected $hidden = [
        'password',
        'remember_token'
    ];
}
