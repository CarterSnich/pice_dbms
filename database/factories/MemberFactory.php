<?php

namespace Database\Factories;

use App\Models\Member;
use Illuminate\Support\Facades\Hash;
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
            'email' => 'admin@pice.org',
            'password' =>  Hash::make('admin'),

            // role
            'role' => 'super_admin',

            // member information
            'lastname' => 'admin',
            'firstname' => 'admin',
            'middlename' => 'admin'
        ];
    }
}
