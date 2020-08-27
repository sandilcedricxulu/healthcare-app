<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBloodGroupsTable extends Migration
{
    
    public function up()
    {
        Schema::create('blood_groups', function (Blueprint $table) {
            $table->id();
            $table->string('blood_group_id');
            $table->string('blood_type');
            $table->string('blood_amount');
            $table->timestamps();
        });
    }


    public function down()
    {
        Schema::dropIfExists('blood_groups');
    }
}
