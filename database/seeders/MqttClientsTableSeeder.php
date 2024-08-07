<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class MqttClientsTableSeeder extends Seeder
{
    public function run()
    {
        DB::table('mqtt_clients')->insert([
            ['id' => 1, 'client_id' => 'sen1', 'client_name' => 'sensor luar 1', 'created_at' => now(), 'updated_at' => now()],
            ['id' => 2, 'client_id' => 'sen2', 'client_name' => 'sensor lingkungan 1', 'created_at' => now(), 'updated_at' => now()],
            ['id' => 3, 'client_id' => 'sen3', 'client_name' => 'sensor tanah 1', 'created_at' => now(), 'updated_at' => now()],
            ['id' => 4, 'client_id' => 'akt1', 'client_name' => 'aktuator 1', 'created_at' => now(), 'updated_at' => now()],
        ]);
    }
}

