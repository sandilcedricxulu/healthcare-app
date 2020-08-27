<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRecipientsTable extends Migration
{

    public function up()
    {
        Schema::create('recipients', function (Blueprint $table) {
            $table->string('user_id_number');
            $table->string('blood_type');
            $table->double('amount_payed');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('recipients');
    }
}
