<?php

namespace Database\Seeders;

use App\Models\Sword; //A modell osztályt meghívom
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class SwordSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {

        //Teljesen saját
        Sword::create(
            [
                "name" => "Katana of the Wind Form",
                "length" => 112.68,
                "price" => 345,
                "exclusive" => true,
                "description" => "The katana of the wind form is a powerful and sharp weapon",
                "release" => "1523-08-02"
            ]
        );

        //Saját adatok (bulk insert)
        Sword::insert(
            [
                [
                    "name" => "Odachi of the Fire Form",
                    "length" => 172.68,
                    "price" => 3450,
                    "exclusive" => false,
                    "description" => "The Odachi of the fire form is a huge, powerful and sharp weapon",
                    "release" => "1723-08-02",
                    "created_at" => now(),
                    "updated_at" => now()
                ],
                [
                    "name" => "Sword of Destiny",
                    "length" => 92.68,
                    "price" => 1345,
                    "exclusive" => true,
                    "description" => "Will make you bleed...",
                    "release" => "1623-08-02",
                    "created_at" => now(),
                    "updated_at" => now()
                ]
            ]
        );

        //Véletlenszerű
        Sword::factory(10)->create();

        //Véletlenszerű félig kitöltött adatokkal
        Sword::factory()->create([
            "name" => "Gunblade"
        ]);

        //Objektum létrehozása modell alapján adatbázis nélkül
        $basicSword = new Sword();
        $basicSword->name = "Basic Kard";
        $basicSword->length = 75.3;
        $basicSword->price = 23;
        $basicSword->exclusive = false;
        $basicSword->description = "This is the way";
        $basicSword->release = "2002-12-01";
        $basicSword->save();

    }
}
