<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ActuatorDataTableSeeder extends Seeder
{
    public function run()
    {
        DB::table('actuator_data')->insert([
            ['topic_id' => 13, 'actuator_state' => 'on', 'timestamp' => '2024-07-08 08:40:00'],
            ['topic_id' => 14, 'actuator_state' => 'on', 'timestamp' => '2024-07-08 08:40:00'],
            ['topic_id' => 13, 'actuator_state' => 'on', 'timestamp' => '2024-07-08 08:39:00'],
            ['topic_id' => 14, 'actuator_state' => 'on', 'timestamp' => '2024-07-08 08:39:00'],
            ['topic_id' => 13, 'actuator_state' => 'on', 'timestamp' => '2024-07-08 08:38:00'],
            ['topic_id' => 14, 'actuator_state' => 'on', 'timestamp' => '2024-07-08 08:38:00'],
            ['topic_id' => 13, 'actuator_state' => 'on', 'timestamp' => '2024-07-08 08:37:00'],
            ['topic_id' => 14, 'actuator_state' => 'on', 'timestamp' => '2024-07-08 08:37:00'],
            ['topic_id' => 13, 'actuator_state' => 'on', 'timestamp' => '2024-07-08 08:36:00'],
            ['topic_id' => 14, 'actuator_state' => 'on', 'timestamp' => '2024-07-08 08:36:00'],
            ['topic_id' => 13, 'actuator_state' => 'on', 'timestamp' => '2024-07-08 08:35:00'],
            ['topic_id' => 14, 'actuator_state' => 'on', 'timestamp' => '2024-07-08 08:35:00'],
            ['topic_id' => 13, 'actuator_state' => 'off', 'timestamp' => '2024-07-08 08:34:00'],
            ['topic_id' => 14, 'actuator_state' => 'on', 'timestamp' => '2024-07-08 08:34:00'],
            ['topic_id' => 13, 'actuator_state' => 'off', 'timestamp' => '2024-07-08 08:33:00'],
            ['topic_id' => 14, 'actuator_state' => 'on', 'timestamp' => '2024-07-08 08:33:00'],
            ['topic_id' => 13, 'actuator_state' => 'off', 'timestamp' => '2024-07-08 08:32:00'],
            ['topic_id' => 14, 'actuator_state' => 'on', 'timestamp' => '2024-07-08 08:32:00'],
            ['topic_id' => 13, 'actuator_state' => 'off', 'timestamp' => '2024-07-08 08:31:00'],
            ['topic_id' => 14, 'actuator_state' => 'on', 'timestamp' => '2024-07-08 08:31:00'],
            ['topic_id' => 13, 'actuator_state' => 'off', 'timestamp' => '2024-07-08 08:30:00'],
            ['topic_id' => 14, 'actuator_state' => 'on', 'timestamp' => '2024-07-08 08:30:00'],
            ['topic_id' => 13, 'actuator_state' => 'off', 'timestamp' => '2024-07-08 08:29:00'],
            ['topic_id' => 14, 'actuator_state' => 'on', 'timestamp' => '2024-07-08 08:29:00'],
            ['topic_id' => 13, 'actuator_state' => 'off', 'timestamp' => '2024-07-08 08:28:00'],
            ['topic_id' => 14, 'actuator_state' => 'on', 'timestamp' => '2024-07-08 08:28:00'],
            ['topic_id' => 13, 'actuator_state' => 'off', 'timestamp' => '2024-07-08 08:27:00'],
            ['topic_id' => 14, 'actuator_state' => 'off', 'timestamp' => '2024-07-08 08:27:00'],
            ['topic_id' => 13, 'actuator_state' => 'off', 'timestamp' => '2024-07-08 08:26:00'],
            ['topic_id' => 14, 'actuator_state' => 'off', 'timestamp' => '2024-07-08 08:26:00'],
            ['topic_id' => 13, 'actuator_state' => 'off', 'timestamp' => '2024-07-08 08:25:00'],
            ['topic_id' => 14, 'actuator_state' => 'off', 'timestamp' => '2024-07-08 08:25:00'],
            ['topic_id' => 13, 'actuator_state' => 'off', 'timestamp' => '2024-07-08 08:24:00'],
            ['topic_id' => 14, 'actuator_state' => 'off', 'timestamp' => '2024-07-08 08:24:00'],
            ['topic_id' => 13, 'actuator_state' => 'off', 'timestamp' => '2024-07-08 08:23:00'],
            ['topic_id' => 14, 'actuator_state' => 'off', 'timestamp' => '2024-07-08 08:23:00'],
            ['topic_id' => 13, 'actuator_state' => 'off', 'timestamp' => '2024-07-08 08:22:00'],
            ['topic_id' => 14, 'actuator_state' => 'off', 'timestamp' => '2024-07-08 08:22:00'],
            ['topic_id' => 13, 'actuator_state' => 'off', 'timestamp' => '2024-07-08 08:21:00'],
            ['topic_id' => 14, 'actuator_state' => 'off', 'timestamp' => '2024-07-08 08:21:00'],
            ['topic_id' => 13, 'actuator_state' => 'off', 'timestamp' => '2024-07-08 08:20:00'],
            ['topic_id' => 14, 'actuator_state' => 'off', 'timestamp' => '2024-07-08 08:20:00'],
            ['topic_id' => 13, 'actuator_state' => 'off', 'timestamp' => '2024-07-08 08:19:00'],
            ['topic_id' => 14, 'actuator_state' => 'off', 'timestamp' => '2024-07-08 08:19:00'],
            ['topic_id' => 13, 'actuator_state' => 'off', 'timestamp' => '2024-07-08 08:18:00'],
            ['topic_id' => 14, 'actuator_state' => 'off', 'timestamp' => '2024-07-08 08:18:00'],
        ]);
    }
}
