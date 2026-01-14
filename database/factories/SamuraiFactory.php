<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Samurai>
 */
class SamuraiFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'name' => fake()->name(),
            'birthdate' => fake()->dateTimeBetween('-900 years', '-200 years')->format("Y-m-d"),
            'height' => fake()->randomFloat(2, 1.5, 2.0), // meters
            'ageOfDeath' => fake()->numberBetween(18, 110),
        ];
    }
}
