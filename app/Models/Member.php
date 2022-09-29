<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

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

    public static $memberships = ['regular', 'associate', 'lifetime', 'affiliate'];
    public static $civil_statuses = ['single', 'married', 'divorced', 'widowed'];

    protected $fillable = [
        // user account
        'membership_id',
        'password',

        // application details
        'membership_status',
        'chapter',
        'year_chap_no_natl_no',
        'photo',
        'membership',
        'prc_registration_no',
        'registration_date',

        // applicant information
        'lastname',
        'firstname',
        'middlename',
        'date_of_birth',
        'place_of_birth',
        'gender',
        'civil_status',
        'religion',
        'home_address',
        'office_tel_no',
        'mobile_phone_no',
        'company_name',
        'email',
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
