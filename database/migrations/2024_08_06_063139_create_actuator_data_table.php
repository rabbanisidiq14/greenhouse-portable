<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateActuatorDataTable extends Migration
{
    public function up()
    {
        Schema::create('actuator_data', function (Blueprint $table) {
            $table->id();
            $table->foreignId('topic_id')->constrained('mqtt_topics')->onDelete('cascade');
            $table->string('actuator_state');
            $table->timestamp('timestamp')->useCurrent();
        });
    }

    public function down()
    {
        Schema::dropIfExists('actuator_data');
    }
}
