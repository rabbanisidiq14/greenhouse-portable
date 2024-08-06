<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMqttClientsTable extends Migration
{
    public function up()
    {
        Schema::create('mqtt_clients', function (Blueprint $table) {
            $table->id();
            $table->string('client_id')->unique();
            $table->string('client_name');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('mqtt_clients');
    }
}
