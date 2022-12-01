<?php

namespace Database\Factories;

use App\Models\User;
use App\Models\Recipe;
use App\Models\Category;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Image>
 */
class ImageFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        $imageable = fake()->randomElement([
            User::class,
            Category::class,
            Recipe::class,
        ]);

        return [
            'path' => fake()->lexify('????/???/?????/????.???'),
            'imageable_type' => $imageable,
            'imageable_id' => $imageable::factory()->create(),
            'alt_text' => fake()->word(),
        ];
    }
}
