<?php

namespace Database\Seeders;

use App\Models\Administrator;
use App\Models\Application;
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
        // admin
        Administrator::factory(1)->create();

        // applications
        for ($i = 0; $i < 120; $i++) {
            Application::factory()->create();
        }
    }
}
