<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $this->call([
            MqttClientsTableSeeder::class,
            MqttTopicsTableSeeder::class,
            ControlParametersTableSeeder::class,
            ActuatorDataTableSeeder::class,
            SensorDataTableSeeder::class,
        ]);
    }
}
