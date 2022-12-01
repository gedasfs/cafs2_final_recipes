<?php

namespace Database\Factories;

use App\Models\Recipe;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Ingredient>
 */
class IngredientFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'recipe_id' => Recipe::factory()->create(),
            'name' => fake()->word(),
            'quantity' => fake()->randomNumber(1, 950),
            'unit' => fake()->randomElement(['g', 'kg', 'pcs.', 'tb']),
        ];
    }
}
