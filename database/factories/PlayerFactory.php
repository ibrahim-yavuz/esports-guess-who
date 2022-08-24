<?php

namespace Database\Factories;

use App\Models\Player;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Player>
 */
class PlayerFactory extends Factory
{
    protected $model = Player::class;
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'nick' => fake()->firstName,
            'name' => fake()->name,
            'birth_date' => now(),
            'country_id' => fake()->randomDigit(),
            'team_id' => fake()->randomDigit(),
            'game_id' => fake()->randomDigit(),
            'mvp_count' => fake()->randomDigit(),
            'won_tournament_count' => fake()->randomDigit(),
        ];
    }
}
