<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\Group;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);

        \App\Models\Group::factory(3)->create();

        \App\Models\Level::factory()->create(['name' => 'Oro']);
        \App\Models\Level::factory()->create(['name' => 'Plata']);
        \App\Models\Level::factory()->create(['name' => 'Bronce']);

       
    }
}
