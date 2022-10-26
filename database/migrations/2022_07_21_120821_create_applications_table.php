<?php

use App\Models\Application;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

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
            $table->timestamps();

            // member applicant
            $table->unsignedBigInteger('member_id');
            $table->foreign('member_id')->references('id')->on('members');

            // application date
            $table->date('date')->default(DB::raw('CURRENT_TIMESTAMP'));
            $table->string('application_id')->unique();
            $table->enum('status', array_keys(Application::APPLICATION_STATUSES))->default('pending');
            $table->string('application_form')->nullable();
            $table->string('reject_reason')->nullable();
            $table->date('date_paid')->nullable();
            $table->decimal('membership_fee', 8, 2, true)->nullable();

            // application details
            $table->enum('membership_status', Application::MEMBERSHIP_STATUSES);
            $table->string('chapter');
            $table->string('year_chap_no_natl_no');
            $table->string('photo');
            $table->enum('membership', Application::MEMBERSHIP_TYPES);
            $table->string('prc_registration_no');
            $table->date('registration_date');

            // applicant information
            $table->string('lastname');
            $table->string('firstname');
            $table->string('middlename')->nullable();
            $table->date('date_of_birth');
            $table->string('place_of_birth');
            $table->enum('gender', ['male', 'female']);
            $table->enum('civil_status', Application::CIVIL_STATUSES);
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
