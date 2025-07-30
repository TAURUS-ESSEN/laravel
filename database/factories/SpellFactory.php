<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Spell>
 */
class SpellFactory extends Factory
{
    public function definition(): array
    {
         $name = fake()->unique()->words(2, true);
        
    return [
        'name' => $name,
        'description' => fake()->realText(130),
        'price' => fake()->numberBetween(5, 100),
        'slug' => Str::slug($name),
        'school_id' => fake()->numberBetween(1, 6),
    ];
    }
}
