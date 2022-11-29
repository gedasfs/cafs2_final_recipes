<?php

namespace Database\Factories;

use App\Models\User;
use App\Models\Category;
use App\Models\RecipeTimeUnit;
use App\Models\DifficultyLevel;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Recipe>
 */
class RecipeFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'user_id' => User::factory()->create(),
            'category_id' => Category::factory()->create(),
            'name' => fake()->words(fake()->numberBetween(1, 5), true),
            'short_description' => fake()->sentence(fake()->numberBetween(1, 15)),
            'description' => fake()->paragraph(fake()->numberBetween(2, 8), false),
            'prep_time' => fake()->numberBetween(0, 90),
            // 'prep_time_unit_id' => RecipeTimeUnit::factory()->create(),
            'cook_time' => fake()->numberBetween(0, 90),
            'total_time' => fake()->numberBetween(0, 90),
            // 'cook_time_unit_id' => RecipeTimeUnit::factory()->create(),
            'recipe_time_unit_id' => RecipeTimeUnit::factory()->create(),
            'servings' => fake()->numberBetween(1, 20),
            'difficulty_level_id' => DifficultyLevel::factory()->create(),
            'ext_url' => fake()->url(),
            'video_path' => fake()->lexify('????/???/?????/????.???'),
        ];
    }
}
