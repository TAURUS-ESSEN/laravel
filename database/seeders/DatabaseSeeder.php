<?php

namespace Database\Seeders;

use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Spell;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

        // User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);
    $this->call([
        SchoolSeeder::class,
        SpellSeeder::class,
        UserSeeder::class,
        AbfrageSeeder::class,
    ]);

    // 🔧 Дополнительно — только для демонстрации
    Spell::factory()->count(5)->create();
    }
}
