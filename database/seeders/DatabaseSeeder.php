<?php

namespace Database\Seeders;

use App\Models\Administrator;
use App\Models\Application;
use App\Models\Member;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // admin member
        Member::factory()->create();



        // // applications
        // for ($i = 0; $i < 120; $i++) {
        //     Application::factory()->create();
        // }
    }
}
