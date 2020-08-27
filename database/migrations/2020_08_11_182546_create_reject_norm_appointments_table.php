<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRejectNormAppointmentsTable extends Migration
{
     
    public function up()
    {
        Schema::create('reject_norm_appointments', function (Blueprint $table) {
            $table->id();
            $table->string('user_id_number');
            $table->string('hospital_admin_id');
            $table->string('hospital_id');
            $table->string('date_of_reject');
            $table->string('reason');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('reject_norm_appointments');
    }
}
