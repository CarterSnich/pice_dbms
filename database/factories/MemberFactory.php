<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class MemberFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
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
    }
}
