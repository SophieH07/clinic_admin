<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        \App\Models\Patient::factory(25)
            ->create()
            ->each(function ($patient) {
                \App\Models\Visit::factory(rand(1, 8))->create(['patient_id' => $patient->id]);
            });
    }
}
