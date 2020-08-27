<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateNormAppointmentsTable extends Migration
{

    public function up()
    {
        Schema::create('norm_appointments', function (Blueprint $table) {
            $table->id();
            $table->string('user_id_number');
            $table->integer('hospital_id');
            $table->string('hospital_admin_id');
            $table->date('date_of_booking');
            $table->date('date_of_appointment');
            $table->string('reason');
            $table->string('conductor');
            $table->rememberToken();
            $table->timestamps();
        });
    }

    
    public function down()
    {
        Schema::dropIfExists('norm_appointments');
    }
}
