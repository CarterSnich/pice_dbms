<?php

use App\Models\Member;
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

            // user account
            $table->string('membership_id')->unique();
            $table->string('password');
            $table->enum('role', Member::$roles)->nullable()->default(null);

            // application details
            $table->enum('membership_status', ['renewed', 'new']);
            $table->string('chapter');
            $table->string('year_chap_no_natl_no');
            $table->string('photo');
            $table->enum('membership', Member::$memberships);
            $table->string('prc_registration_no');
            $table->date('registration_date');

            // applicant information
            $table->string('lastname');
            $table->string('firstname');
            $table->string('middlename')->nullable();
            $table->date('date_of_birth');
            $table->string('place_of_birth');
            $table->enum('gender', ['male', 'female']);
            $table->enum('civil_status', Member::$civil_statuses);
            $table->string('religion')->nullable();
            $table->string('home_address');
            $table->string('office_tel_no');
            $table->string('mobile_phone_no', 11);
            $table->string('company_name');
            $table->string('email');
            $table->string('company_address');
            $table->string('position');
            $table->string('sector');

            // educational details
            $table->string('baccalaureate_degree');
            $table->string('baccalaureate_college');
            $table->year('baccalaureate_year');
            $table->string('post_graduate_degree');
            $table->string('post_graduate_college');
            $table->year('post_graduate_year');
            $table->string('fields_of_specialization');

            // --------------------------------------
            $table->rememberToken();
            $table->timestamps();
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
