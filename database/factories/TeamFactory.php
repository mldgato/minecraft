<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Team>
 */
class TeamFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'school' => $this->faker->words(2, true),
            'category' => $this->faker->randomElement(['Categoría A', 'Categoría B']),
            'team_name' => $this->faker->word()
        ];
    }
}
