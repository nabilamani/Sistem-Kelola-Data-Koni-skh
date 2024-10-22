<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Coach>
 */
class CoachFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'id' => fake()->unique()->regexify('P[0-9]{4}'),
            'name' => fake()->name(),
            'sport_category' => fake()->randomElement(['Bycle', 'Volleyball', 'Basketball','Football', 'Badminton']),
            'address' => fake()->address(),
            'age' => fake()->numberBetween(20, 85),
            'description' => fake()->text()
        ];
    }
}
