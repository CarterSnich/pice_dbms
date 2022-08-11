<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEventsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('events', function (Blueprint $table) {
            $table->id();
            // event head information
            $table->string('title');
            $table->text('description');
            $table->string('picture');
            // details
            $table->date('start_date');
            $table->date('end_date')->nullable();
            $table->decimal('cost', 8, 2)->nullable();
            // organizer details
            $table->string('organizer');
            $table->string('contact_no');
            $table->string('email');
            $table->string('website');
            // venue details
            $table->string('venue');
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
        Schema::dropIfExists('events');
    }
}
