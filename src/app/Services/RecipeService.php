<?php

namespace App\Services;

use App\Models\Image;
use App\Models\Recipe;
use App\Models\Ingredient;
use App\Models\Instruction;
use Illuminate\Support\Str;
use App\Models\RecipeTimeUnit;
use App\Traits\StoreImagesTrait;
use Illuminate\Support\Facades\Storage;

class RecipeService
{
    use StoreImagesTrait;

    // private const DEF_RECIPE_IMG_SAVE_PATH = 'public/images/recipes';
    private const DEF_RECIPE_IMG_PATH = 'images/recipes/default-recipe-img.png';

    private const ORDER_VALUES = [
        'created_at:desc' => 'Naujausi viršuje',
        'created_at:asc' => 'Seniausi viršuje',
        'name:asc' => 'A...Ž',
        'name:desc' => 'Ž...A',
    ];

    private const ORDER_DEFAULT_VALUE = 'created_at:desc';

    public function updateRecipe(array $recipeValidated, $recipe) : Recipe
    {
        $recipe->fill($recipeValidated);
        $recipe->save();
        $this->updateRecipeIngredients($recipeValidated, $recipe);
        $this->updateRecipeInstructions($recipeValidated, $recipe);

        return $recipe;
    }

    private function updateRecipeIngredients(array $recipeValidated, Recipe $recipe) : void
    {
        $ingredients = [];
        for ($i = 0; $i < count($recipeValidated['ingredient_id']); $i++) {
            $ingredients[] = $recipe->ingredients()->updateOrCreate(
                ['id' => $recipeValidated['ingredient_id'][$i]],
                [
                    'name' => $recipeValidated['ingredient_name'][$i],
                    'quantity' => $recipeValidated['ingredient_quantity'][$i],
                    'unit' =>$recipeValidated['ingredient_unit'][$i]
                ]
            );
        }

        $origIngredients = Ingredient::where('recipe_id', $recipe->id)->get();
        $newIngrediendtIds = collect($ingredients)->pluck('id')->all();

        foreach ($origIngredients as $origIngredient) {
            if (!in_array($origIngredient->id, $newIngrediendtIds)) {
                $origIngredient->delete();
            }
        }
    }

    private function updateRecipeInstructions(array $recipeValidated, Recipe $recipe) : void
    {
        $instructions = [];
        for ($i = 0; $i < count($recipeValidated['instruction_id']); $i++) {
            $instrutions[] = $recipe->instructions()->updateOrCreate(
                ['id' => $recipeValidated['instruction_id'][$i]],
                [
                    'description' => $recipeValidated['instruction_description'][$i],
                ]
            );
        }

        $origInstructions = Instruction::where('recipe_id', $recipe->id)->get();
        $newInstructionIds = collect($instrutions)->pluck('id')->all();

        foreach ($origInstructions as $origInstruction) {
            if (!in_array($origInstruction->id, $newInstructionIds)) {
                $origInstruction->delete();
            }
        }
    }


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
        if (array_key_exists('recipe_photos', $recipeValidated)) {
            $filePaths = $this->storeImages($recipeValidated['recipe_photos'], 'recipes');
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

            if (!Storage::disk('local')->exists('public/' . $recipeImagePath)) {
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
