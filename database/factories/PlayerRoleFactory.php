<?php

namespace Database\Factories;

use App\Models\PlayerRole;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\PlayerRole>
 */
class PlayerRoleFactory extends Factory
{
    protected $model = PlayerRole::class;
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'player_id' => fake()->randomDigit(),
            'role_id' => fake()->randomDigit()
        ];
    }
}
