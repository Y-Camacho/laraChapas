<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Collector;
use App\Enums\BottleCapState;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\BottleCap>
 */
class BottleCapFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        // Tomamos un collector aleatorio de la tabla
        $collectorIds = Collector::pluck('id')->toArray();

        return [
            'title' => $this->faker->words(3, true), // título de 3 palabras
            'description' => $this->faker->sentence(10), // descripción de 10 palabras
            'state' => $this->faker->randomElement(BottleCapState::cases()), // valor aleatorio del enum
            'img_nom' => 'chapa-defecto.jpg',
            'date_edition' => $this->faker->dateTimeBetween('-5 years', 'now'),
            'collector_id' => $this->faker->randomElement($collectorIds),
        ];
    }
}
