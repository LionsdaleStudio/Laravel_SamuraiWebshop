<?php

namespace Database\Seeders;

use App\Models\User;
use DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    use WithoutModelEvents;

    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $this->call([
            RoleSeeder::class,
            UserSeeder::class,
            SamuraiSeeder::class,
            SwordSeeder::class
        ]);

        DB::table("samurai_user")->insert([
            [
                "samurai_id" => 1,
                "user_id" => 1
            ],
            [
                "samurai_id" => 2,
                "user_id" => 1
            ],
            [
                "samurai_id" => 1,
                "user_id" => 2
            ]
        ]);
    }
}
