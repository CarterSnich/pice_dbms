<?php

use App\Models\Application;
use App\Models\Member;
use App\Models\Religion;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMembersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('members', function (Blueprint $table) {
            $table->id();
            $table->rememberToken();
            $table->timestamps();

            // user account
            $table->string('email')->unique();
            $table->string('password');

            // role
            $table->enum('role', array_keys(Member::ROLES))->default('member');

            // member name
            $table->string('lastname');
            $table->string('firstname');
            $table->string('middlename')->nullable();

            // registration details
            $table->enum('membership_status', Application::MEMBERSHIP_STATUSES)->nullable();
            $table->string('chapter')->nullable();
            $table->string('year_chap_no_natl_no')->nullable();
            $table->string('photo')->nullable();
            $table->enum('membership', Application::MEMBERSHIP_TYPES)->nullable();
            $table->string('prc_registration_no')->nullable();
            $table->date('registration_date')->nullable();

            // member information
            $table->date('date_of_birth')->nullable();
            $table->string('place_of_birth')->nullable();
            $table->enum('gender', ['male', 'female'])->nullable();
            $table->enum('civil_status', Member::CIVIL_STATUSES)->nullable();
            $table->string('religion')->nullable()->default('00');
            $table->string('home_address')->nullable();
            $table->string('office_tel_no')->nullable();
            $table->string('mobile_phone_no', 11)->nullable();
            $table->string('company_name')->nullable();
            $table->string('company_address')->nullable();
            $table->string('position')->nullable();
            $table->string('sector')->nullable();

            // educational details
            $table->string('baccalaureate_degree')->nullable();
            $table->string('baccalaureate_college')->nullable();
            $table->year('baccalaureate_year')->nullable();
            $table->string('post_graduate_degree')->nullable();
            $table->string('post_graduate_college')->nullable();
            $table->year('post_graduate_year')->nullable();
            $table->string('fields_of_specialization')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('members');
    }
}
