<?php

namespace App\Services;

use App\Models\Image;
use App\Models\Recipe;
use App\Models\Ingredient;
use App\Models\Instruction;

class RecipeService
{
    protected const DEF_RECIPE_IMG_PATH = 'images/recipes/default-recipe-img.png';

    public function saveRecipe(array $recipeValidated) : Recipe
    {
        $user = auth()->user();
        $recipeValidated['user_id'] = $user->id;

        $recipe = Recipe::create($recipeValidated);

        $this->saveRecipeIngredients($recipeValidated, $recipe);
        $this->saveRecipeInstructions($recipeValidated, $recipe);
        $this->saveRecipeImages($recipeValidated, $recipe);

        return $recipe;
    }

    private function saveRecipeImages(array $recipeValidated, Recipe $recipe) : void
    {
        if (array_key_exists('recipe_photo', $recipeValidated)) {
            $file = $recipeValidated['recipe_photo'];

            $filePath = $file->store('images/recipes');
        } else {
            $filePath = self::DEF_RECIPE_IMG_PATH;
        }

        $images = [];
        for ($i=0; $i < 2; $i++) {
            $images[] = new Image([
                'path' => $filePath,
                'alt_text' => 'recipe-img',
            ]);
        }
        $recipe->images()->saveMany($images);
    }

    private function saveRecipeIngredients(array $recipeValidated, Recipe $recipe) : void
    {
        $ingredients = [];
        for ($i=0; $i < count($recipeValidated['ingredient_name']); $i++) {
            $ingredients[] = new Ingredient([
                'name' => $recipeValidated['ingredient_name'][$i],
                'quantity' => $recipeValidated['ingredient_quantity'][$i],
                'unit' =>$recipeValidated['ingredient_unit'][$i]
            ]);
        }
        $recipe->ingredients()->saveMany($ingredients);
    }

    private function saveRecipeInstructions(array $recipeValidated, Recipe $recipe) : void
    {
        $instructions = [];
        foreach ($recipeValidated['instruction_description'] as $description) {
            $instructions[] = new Instruction(['description' => $description]);
        }
        $recipe->instructions()->saveMany($instructions);
    }
}
