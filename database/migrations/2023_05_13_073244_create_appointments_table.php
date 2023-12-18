<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAppointmentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('appointments', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger("schedule_id")->nullable();
            $table->unsignedBigInteger("timeslot_id")->nullable();
            $table->unsignedBigInteger("service_id")->nullable();
            $table->string("name");
            $table->string("email");
            $table->string("address");
            $table->string("phone_no");
            $table->string("notes");
            // $table->timestamp("created_at");
            $table->string("status")->default("Pending");
        });
    }

    public function down()
    {
        Schema::dropIfExists('appointments');
    }
    
}
