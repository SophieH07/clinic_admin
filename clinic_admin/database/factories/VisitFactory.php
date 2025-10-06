<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Patient;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Visit>
 */
class VisitFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'patient_id' => Patient::factory(),
            'visit_date' => fake()->dateTimeBetween('-1 year', 'now'),
            'reason' => fake()->randomElement(['Kontroll', 'Új panasz', 'Receptírás', 'Beutaló', 'Éves szűrés']),
            'notes' => fake()->sentence(),
        ];
    }
}
