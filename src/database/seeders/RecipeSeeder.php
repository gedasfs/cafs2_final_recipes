<?php

namespace Database\Seeders;

use App\Models\Recipe;
use App\Models\Ingredient;
use App\Models\Instruction;
use App\Models\IngredientGroup;
use Illuminate\Database\Seeder;
use App\Models\InstructionGroup;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class RecipeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Recipe::factory(10)
            ->has(Ingredient::factory()->count(3))
            ->has(Instruction::factory()->count(5))
            ->create();
    }
}
