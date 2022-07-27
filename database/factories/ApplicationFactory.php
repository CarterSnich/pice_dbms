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
        return [
            // application details
            'date' => Carbon::now(),
            'new_membership' => $this->faker->boolean(),
            'chapter' => 'Leyte',
            'membership' => $this->faker->randomElement(['regular', 'associate']),
            'prc_registration_no' => Str::random(12),
            'registration_date' => Carbon::now(),
            // applicant information
            'lastname' => $this->faker->lastName(),
            'firstname' => $this->faker->firstName(),
            'middlename' => $this->faker->randomElement([null, $this->faker->lastName()]),
            'birth_date' => $this->faker->date(),
            'birth_place' => $this->faker->date(),
            'gender' => $this->faker->randomElement(['male', 'female']),
            'civil_status' => $this->faker->randomElement(['single', 'married', 'divorced', 'widowed']),
            'religion' => ucfirst(strtolower("{$this->faker->word()} {$this->faker->word()}")),
            'home_address' => $this->faker->address(),
            'contact_no' => $this->faker->numerify('09#########'),
            'email' => $this->faker->email(),
            'company_name' => $this->faker->company(),
            'company_address' => $this->faker->address(),
            'position' => ucfirst(strtolower("{$this->faker->word()} {$this->faker->word()}")),
            'sector' => ucfirst(strtolower("{$this->faker->word()} {$this->faker->word()}")),
            'office_tel_no' => $this->faker->phoneNumber(),
            // educational details
            'baccalaureate_degree' => ucfirst(strtolower("{$this->faker->word()} {$this->faker->word()}")),
            'baccalaureate_college' => ucfirst(strtolower("{$this->faker->word()} {$this->faker->word()}")),
            'baccalaureate_year' => $this->faker->year(),
            'post_grad_degree' => ucfirst(strtolower("{$this->faker->word()} {$this->faker->word()}")),
            'post_grad_college' => ucfirst(strtolower("{$this->faker->word()} {$this->faker->word()}")),
            'post_grad_year' => $this->faker->year(),
            'field_of_specialization' => ucfirst(strtolower("{$this->faker->word()} {$this->faker->word()}")),
            // action of the secretariat
            'processed_by' => $this->faker->name('female'),
            'processed_date' => Carbon::now(),
            'encoded_by' => $this->faker->name()
        ];
    }
}
