<?php

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
            // application details
            $table->date('date');
            $table->boolean('new_membership');
            $table->string('chapter');
            $table->enum('membership', ['regular', 'associate']);
            $table->string('prc_registration_no');
            $table->date('registration_date');
            // applicant information
            $table->string('lastname');
            $table->string('firstname');
            $table->string('middlename')->nullable();
            $table->date('birth_date');
            $table->date('birth_place');
            $table->enum('gender', ['male', 'female']);
            $table->enum('civil_status', ['single', 'married', 'divorced', 'widowed']);
            $table->string('religion')->nullable();
            $table->string('home_address');
            $table->string('contact_no', 11);
            $table->string('email');
            $table->string('company_name');
            $table->string('company_address');
            $table->string('position');
            $table->string('sector');
            $table->string('office_tel_no');
            // educational details
            $table->string('baccalaureate_degree');
            $table->string('baccalaureate_college');
            $table->year('baccalaureate_year');
            $table->string('post_grad_degree');
            $table->string('post_grad_college');
            $table->year('post_grad_year');
            $table->string('field_of_specialization');
            // action of the secretariat
            $table->string('processed_by');
            $table->date('processed_date');
            $table->string('encoded_by');
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
