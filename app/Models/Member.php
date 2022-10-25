<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;


class Member extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    public const ROLES = [
        'super_admin' => 'Super Administrator',
        'president' => 'President',
        'secretary' => 'Secretary',
        'treasure' => 'Treasure',
        'information_officer' => 'Information Officer',
        'member' => 'Member'
    ];

    public const CIVIL_STATUSES = Application::CIVIL_STATUSES;

    protected $fillable = [
        // user account
        'email',
        'password',

        // role
        'role',

        // member name
        'lastname',
        'firstname',
        'middlename',

        // registration details
        'picture',
        'prc_registration_no',
        'registration_date',

        // member information
        'date_of_birth',
        'place_of_birth',
        'gender',
        'civil_status',
        'religion',
        'home_address',
        'office_tel_no',
        'mobile_phone_no',
        'company_name',
        'company_address',
        'position',
        'sector',

        // educational details
        'baccalaureate_degree',
        'baccalaureate_college',
        'baccalaureate_year',
        'post_graduate_degree',
        'post_graduate_college',
        'post_graduate_year',
        'fields_of_specialization',
    ];


    // hidden
    protected $hidden = [
        'password',
        'remember_token'
    ];
}
