<?php

namespace Database\Factories;

use App\Models\Role;
use App\Models\Team;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Player>
 */
class PlayerFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        // Get team id
        $team = Team::inRandomOrder()->first()->id;

        // Get role player id
        $role = Role::where('name', 'player')->first()->id;

        return [
            'name' => $this->faker->name,
            'team_id' => $team,
            'role_id' => $role,
            'position' => $this->faker->randomElement(['GK', 'DF', 'MF', 'FW']),
        ];
    }
}
