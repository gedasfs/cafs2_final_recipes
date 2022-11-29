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

        $recipes = Recipe::factory(10)->create();

        foreach ($recipes as $recipe) {
            IngredientGroup::factory(2)
                ->has(Ingredient::factory()->count(2))
                ->create([
                    'recipe_id' => $recipe->id,
                ]);

            InstructionGroup::factory(2)
                ->has(Instruction::factory()->count(2))
                ->create([
                    'recipe_id' => $recipe->id,
                ]);
        }

        // Recipe::factory(10)
        //     ->has(IngredientGroup::factory()->count(3))
        //     ->has(InstructionGroup::factory()->count(5))
        //     ->create();
    }
}
