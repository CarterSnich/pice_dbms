<?php

use Carbon\Carbon;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateApplicationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('applications', function (Blueprint $table) {
            $table->id();

            // application date
            $table->string('application_id')->unique();
            $table->date('date')->default(Carbon::now());
            $table->enum('status', ['pending', 'approved', 'not_approved'])->default('pending');
            $table->string('application_form')->nullable();
            $table->string('reject_reason')->nullable();
            $table->date('date_paid')->nullable();
            $table->decimal('membership_fee', 8, 2, true)->nullable();

            // application details
            $table->enum('membership_status', ['renewed', 'new']);
            $table->string('chapter');
            $table->string('year_chap_no_natl_no');
            $table->string('photo');
            $table->enum('membership', ['regular', 'associate']);
            $table->string('prc_registration_no');
            $table->date('registration_date');

            // applicant information
            $table->string('lastname');
            $table->string('firstname');
            $table->string('middlename')->nullable();
            $table->date('date_of_birth');
            $table->string('place_of_birth');
            $table->enum('gender', ['male', 'female']);
            $table->enum('civil_status', ['single', 'married', 'divorced', 'widowed']);
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

            // action of the secretariat
            $table->string('processed_by')->nullable();
            $table->date('processed_date')->nullable();
            $table->string('encoded_by')->nullable();
            // payment
            $table->string('payment_or_no')->nullable();
            $table->boolean('paid')->default(false);

            // --------------------------------------
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
        Schema::dropIfExists('applications');
    }
}
