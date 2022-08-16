<?php

namespace Database\Factories;

use Carbon\Carbon;
use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Factories\Factory;

class ApplicationFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $membership = $this->faker->randomElement(['regular', 'associate']);
        $status = $this->faker->randomElement(['pending', 'approved', 'not_approved']);
        return [

            // application date
            'application_id' => strtoupper(Str::random(12)),
            'date' => $this->faker->date(),
            'status' => $status,
            'application_form' => $this->faker->randomElement(['TPJBCobmEj2NdwLeFEw63t5zIultpJKSJdgf4zKK.pdf', null]),
            'reject_reason' =>  $status == 'not_approved' ? $this->faker->word() : null,
            'date_paid' => $this->faker->randomElement([$this->faker->date(), null]),
            'membership_fee' => $membership == 'regular' ? 700 : 900,

            // application details
            'membership_status' => $this->faker->randomElement(['renewed', 'new']),
            'chapter' => $this->faker->word(),
            'year_chap_no_natl_no' => $this->faker->word(),
            'photo' => $this->faker->randomElement([
                'nEeVV2UuSyzZghxl8f3MPRAVybnJv7gUe1gBSWPC.jpg',
                'FD1dXBBgTw0Kwdr73AnQLCTwUeyymXXzSL0Vm44t.png',
                'zYdA6DSoZNIoJrChREmgtCI0W9fiPJltPZHcP3cy.png'
            ]),
            'membership' => $membership,
            'prc_registration_no' => $this->faker->numerify("2000-" . strtoupper(Str::random(4)) . "######"),
            'registration_date' => $this->faker->date(),

            // applicant information
            'lastname' => $this->faker->lastName(),
            'firstname' => $this->faker->firstName(),
            'middlename' => $this->faker->randomElement([$this->faker->lastName(), null]),
            'date_of_birth' => $this->faker->date(),
            'place_of_birth' => $this->faker->city(),
            'gender' => $this->faker->randomElement(['male', 'female']),
            'civil_status' => $this->faker->randomElement(['single', 'married', 'divorced', 'widowed']),
            'religion' => $this->faker->word(),
            'home_address' => $this->faker->address(),
            'office_tel_no' => $this->faker->phoneNumber(),
            'mobile_phone_no' => $this->faker->numerify('09#########'),
            'company_name' => $this->faker->company(),
            'email' => $this->faker->companyEmail(),
            'company_address' => $this->faker->address(),
            'position' => $this->faker->word(),
            'sector' => $this->faker->word(),

            // educational details
            'baccalaureate_degree' => $this->faker->word(),
            'baccalaureate_college' => $this->faker->word(),
            'baccalaureate_year' => $this->faker->year(),
            'post_graduate_degree' => $this->faker->word(),
            'post_graduate_college' => $this->faker->word(),
            'post_graduate_year' => $this->faker->year(),
            'fields_of_specialization' => $this->faker->word()

        ];
    }
}
