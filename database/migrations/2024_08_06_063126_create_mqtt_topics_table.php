<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMqttTopicsTable extends Migration
{
    public function up()
    {
        Schema::create('mqtt_topics', function (Blueprint $table) {
            $table->id();
            $table->string('topic_name');
            $table->foreignId('client_id')->constrained('mqtt_clients')->onDelete('cascade');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('mqtt_topics');
    }
}
