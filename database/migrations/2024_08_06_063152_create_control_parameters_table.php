<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateControlParametersTable extends Migration
{
    public function up()
    {
        Schema::create('control_parameters', function (Blueprint $table) {
            $table->id();
            $table->string('parameter_name');
            $table->float('target_value');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('control_parameters');
    }
}
