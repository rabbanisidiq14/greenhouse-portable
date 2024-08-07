<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ControlParametersTableSeeder extends Seeder
{
    public function run()
    {
        DB::table('control_parameters')->insert([
            ['parameter_name' => 'kelembapan tanah', 'target_value' => 70, 'created_at' => now(), 'updated_at' => now()],
            ['parameter_name' => 'suhu ruangan', 'target_value' => 26, 'created_at' => now(), 'updated_at' => now()],
        ]);
    }
}
