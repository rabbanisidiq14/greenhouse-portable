<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class MqttTopicsTableSeeder extends Seeder
{
    public function run()
    {
        DB::table('mqtt_topics')->insert([
            ['id' => 1, 'topic_name' => 'sensor/sensor_luar/1/kecepatan_angin', 'client_id' => 1, 'created_at' => now(), 'updated_at' => now()],
            ['id' => 2, 'topic_name' => 'sensor/sensor_luar/1/hujan', 'client_id' => 1, 'created_at' => now(), 'updated_at' => now()],
            ['id' => 3, 'topic_name' => 'sensor/sensor_lingkungan/1/kelembapan', 'client_id' => 2, 'created_at' => now(), 'updated_at' => now()],
            ['id' => 4, 'topic_name' => 'sensor/sensor_lingkungan/1/temperature', 'client_id' => 2, 'created_at' => now(), 'updated_at' => now()],
            ['id' => 5, 'topic_name' => 'sensor/sensor_lingkungan/1/co2', 'client_id' => 2, 'created_at' => now(), 'updated_at' => now()],
            ['id' => 6, 'topic_name' => 'sensor/sensor_lingkungan/1/kualitas_udara', 'client_id' => 2, 'created_at' => now(), 'updated_at' => now()],
            ['id' => 7, 'topic_name' => 'sensor/sensor_lingkungan/1/kecerahan', 'client_id' => 2, 'created_at' => now(), 'updated_at' => now()],
            ['id' => 8, 'topic_name' => 'sensor/sensor_tanah/1/pH', 'client_id' => 3, 'created_at' => now(), 'updated_at' => now()],
            ['id' => 9, 'topic_name' => 'sensor/sensor_tanah/1/n', 'client_id' => 3, 'created_at' => now(), 'updated_at' => now()],
            ['id' => 10, 'topic_name' => 'sensor/sensor_tanah/1/p', 'client_id' => 3, 'created_at' => now(), 'updated_at' => now()],
            ['id' => 11, 'topic_name' => 'sensor/sensor_tanah/1/k', 'client_id' => 3, 'created_at' => now(), 'updated_at' => now()],
            ['id' => 12, 'topic_name' => 'sensor/sensor_tanah/1/kelembapan', 'client_id' => 3, 'created_at' => now(), 'updated_at' => now()],
            ['id' => 13, 'topic_name' => 'aktuator/1/pompa', 'client_id' => 4, 'created_at' => now(), 'updated_at' => now()],
            ['id' => 14, 'topic_name' => 'aktuator/1/kipas', 'client_id' => 4, 'created_at' => now(), 'updated_at' => now()],
        ]);
    }
}
