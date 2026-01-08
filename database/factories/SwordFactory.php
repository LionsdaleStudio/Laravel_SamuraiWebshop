<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Sword>
 */
class SwordFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            "name" => fake()->word(),
            "length" => fake()->randomFloat(2, 50, 150),
            "price" => fake()->numberBetween(100),
            "exclusive" => fake()->boolean(25),
            "description" => fake()->sentences(3, true),
            "release" => fake()->date()
        ];
    }
}
