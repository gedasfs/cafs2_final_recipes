<?php

namespace Database\Factories;

use App\Models\InstructionGroup;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Instruction>
 */
class InstructionFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'instruction_group_id' => InstructionGroup::factory()->create(),
            'description' => fake()->paragraph(),
        ];
    }
}
