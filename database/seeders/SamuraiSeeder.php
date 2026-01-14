<?php

namespace Database\Seeders;

use App\Models\Samurai;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class SamuraiSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Samurai::create([
            'name' => 'Miyamoto Musashi',
            'birthdate' => '1584-03-12',
            'height' => 1.65,
            'ageOfDeath' => 60,
            'image' => 'miyamoto_musashi.png',
        ]);

        Samurai::create([
            'name' => 'Oda Nobunaga',
            'birthdate' => '1534-06-23',
            'height' => 1.70,
            'ageOfDeath' => 47,
            'image' => 'oda_nobunaga.png',
        ]);

        Samurai::create([
            'name' => 'Takeda Shingen',
            'birthdate' => '1521-12-01',
            'height' => 1.68,
            'ageOfDeath' => 52,
            'image' => 'takeda_shingen.png',
        ]);

        Samurai::create([
            'name' => 'Date Masamune',
            'birthdate' => '1567-09-05',
            'height' => 1.72,
            'ageOfDeath' => 68,
            'image' => 'date_masamune.png',
        ]);

        Samurai::create([
            'name' => 'Sanada Yukimura',
            'birthdate' => '1567-01-01',
            'height' => 1.69,
            'ageOfDeath' => 48,
            'image' => 'sanada_yukimura.png',
        ]);

        Samurai::factory(10)->create();
    }
}
