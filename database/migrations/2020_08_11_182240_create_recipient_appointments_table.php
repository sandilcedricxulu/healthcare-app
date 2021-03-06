<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRecipientAppointmentsTable extends Migration
{

    public function up()
    {
        Schema::create('recipient_appointments', function (Blueprint $table) {
            $table->id();
            $table->string('user_id_number');
            $table->integer('blood_bank_id');
            $table->string('blood_bank_admin_id');
            $table->date('date_of_booking');
            $table->date('date_of_appointment');
            $table->string('blood_type');
            $table->string('conductor');
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
        Schema::dropIfExists('recipient_appointments');
    }
}
