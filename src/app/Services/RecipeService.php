<?php

namespace App\Services;

use App\Models\Image;
use App\Models\Recipe;
use App\Models\Ingredient;
use App\Models\Instruction;
use App\Models\RecipeTimeUnit;
use Illuminate\Support\Facades\Storage;

class RecipeService
{
    private const DEF_RECIPE_IMG_PATH = 'images/recipes/default-recipe-img.png';

    private const ORDER_VALUES = [
        'created_at:desc' => 'Naujausi viršuje',
        'created_at:asc' => 'Seniausi viršuje',
        'name:asc' => 'A...Ž',
        'name:desc' => 'Ž...A',
    ];

    private const ORDER_DEFAULT_VALUE = 'created_at:desc';


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
        $filePaths = [];
        // dd($recipeValidated['recipe_photo']);
        if (array_key_exists('recipe_photo', $recipeValidated)) {
            $files = $recipeValidated['recipe_photo'];

            foreach ($files as $file) {
                $filePaths[] = $file->store('images/recipes');
            }
        } else {
            $filePaths[] = self::DEF_RECIPE_IMG_PATH;
        }

        $images = [];
        foreach ($filePaths as $path) {
            $images[] = new Image([
                'path' => $path,
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

    public function getRecipe(Recipe $recipe) : array
    {
        $recipe = $recipe->load(['user', 'ingredients', 'instructions', 'images']);
        $timeUnit = RecipeTimeUnit::find($recipe->recipe_time_unit_id);

        if (count($recipe->images)) {
            $recipeImagePath = $recipe->images[0]->path;

            if (!Storage::disk('local')->exists($recipeImagePath)) {
                $recipeImagePath = self::DEF_RECIPE_IMG_PATH;
            }
        } else {
            $recipeImagePath = self::DEF_RECIPE_IMG_PATH;
        }

        return compact('recipe', 'timeUnit', 'recipeImagePath');
    }

    public function getPaginatedRecipes(array $filters = [])
    {
        $orderBy = data_get($filters, 'order_by');
        $orderBy = array_key_exists($orderBy, self::ORDER_VALUES) ? $orderBy : self::ORDER_DEFAULT_VALUE;
        $orderBy = explode(':', $orderBy);

        $orderByCol = $orderBy[0];
        $orderByDir = $orderBy[1] ?? 'desc';

        $recipesQuery = Recipe::query()->orderBy($orderByCol, $orderByDir);


        $recipes = $recipesQuery->with('images')->paginate(10);

        return $recipes;
    }

    public function getOrderByValues() : array
    {
        return self::ORDER_VALUES;
    }
}
