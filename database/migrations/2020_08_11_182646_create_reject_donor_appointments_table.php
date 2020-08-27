<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRejectDonorAppointmentsTable extends Migration
{

    public function up()
    {
        Schema::create('reject_donor_appointments', function (Blueprint $table) {
            $table->id();
            $table->string('user_id_number');
            $table->string('blood_bank_admin_id');
            $table->string('blood_bank_id');
            $table->string('date_of_reject');
            $table->string('reason');
            $table->timestamps();
        });
    }

   
    public function down()
    {
        Schema::dropIfExists('reject_donor_appointments');
    }
}
