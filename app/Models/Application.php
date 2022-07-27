<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Application extends Model
{
    use HasFactory;

    protected $fillable = [
        'date',
        'new_membership',
        'chapter',
        'membership',
        'prc_registration_no',
        'registration_date',
        'lastname',
        'firstname',
        'middlename',
        'birth_date',
        'birth_place',
        'gender',
        'civil_status',
        'religion',
        'home_address',
        'contact_no',
        'email',
        'company_name',
        'company_address',
        'position',
        'sector',
        'office_tel_no',
        'baccalaureate_degree',
        'baccalaureate_college',
        'baccalaureate_year',
        'post_grad_degree',
        'post_grad_college',
        'post_grad_year',
        'field_of_specialization',
        'processed_by',
        'processed_date',
        'encoded_by',
        'payment_or_no',
        'paid'
    ];
}
