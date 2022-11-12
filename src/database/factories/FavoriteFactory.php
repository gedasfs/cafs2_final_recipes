<?php

namespace Database\Factories;

use App\Models\User;
use App\Models\Recipe;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Favorite>
 */
class FavoriteFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        $favoriteable = fake()->randomElement([
            Recipe::class,
        ]);

        return [
            'user_id' => User::factory()->create(),
            'favoriteable_type' => $favoriteable,
            'favoriteable_id' => $favoriteable::factory()->create(),
        ];
    }
}
