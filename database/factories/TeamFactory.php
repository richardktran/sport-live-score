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
        // Generate unique 2 letter
        $alias = $this->faker->unique()->regexify('[A-Z]{2}');

        return [
            'name' => $this->faker->unique()->city(),
            'alias' => $alias,
            'logo' => "team-logo/$alias.png",
        ];
    }
}
