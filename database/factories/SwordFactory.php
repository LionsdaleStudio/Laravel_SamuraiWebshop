<?php

namespace Database\Factories;

use App\Models\Samurai;
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

        $samurais = Samurai::all(); //Lekéri az összes szamurájt a factorynak

        return [
            "name" => fake()->unique()->word(),
            "length" => fake()->randomFloat(2, 50, 150),
            "price" => fake()->numberBetween(100),
            "exclusive" => fake()->boolean(25),
            "description" => fake()->sentences(3, true),
            "release" => fake()->date(),
            "samurai_id" => fake()->randomElement($samurais)->id //Random választ egy szamurájt és az id-t adja a samurai_id oszlopnak
        ];
    }
}
