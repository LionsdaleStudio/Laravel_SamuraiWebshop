<?php

namespace Database\Seeders;

use App\Models\Role;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Role::insert([
            [
                "name" => "Administrator",
                "slug" => "admin",
                "created_at" => now()
            ],
            [
                "name" => "Basic User",
                "slug" => "basic",
                "created_at" => now()
            ]
        ]);
    }
}
