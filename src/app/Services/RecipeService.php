<?php

namespace App\Services;

use App\Models\Image;
use App\Models\Recipe;
use App\Models\Ingredient;
use App\Models\Instruction;
use App\Models\RecipeTimeUnit;
use Illuminate\Support\Facades\Storage;
use App\Traits\ImageTrait;

class RecipeService
{
    use ImageTrait;

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
        $this->saveRecipeIngredients($recipeValidated, $recipe, true);
        $this->saveRecipeInstructions($recipeValidated, $recipe, true);

        if (isset($recipeValidated['recipe_photos'])) {
            $this->saveRecipeImages($recipeValidated, $recipe);
        }

        if (isset($recipeValidated['delete_imageable_id'])) {
            $this->deleteRecipeImages($recipeValidated, $recipe);
        }

        return $recipe;
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
            $filePaths = $this->storeImagesInStorage($recipeValidated['recipe_photos'], 'recipes');
        }

        if (!empty($filePaths)) {
            $images = [];
            foreach ($filePaths as $path) {
                $images[] = new Image([
                    'path' => $path,
                    'alt_text' => 'recipe-img',
                ]);
            }

            $recipe->images()->saveMany($images);
        }

    }

    public function deleteRecipeImages(array $recipeValidated, Recipe $recipe)
    {
        if (array_key_exists('delete_imageable_id', $recipeValidated)) {
            $deletableImages = $recipe->images()->whereIn('id', $recipeValidated['delete_imageable_id'])->get();
            $this->deleteImagesFromStorage($deletableImages->pluck('path')->all());
            foreach ($deletableImages as $image) {
                $image->delete();
            }
        }

    }

    private function saveRecipeIngredients(array $recipeValidated, Recipe $recipe, bool $isUpdate = false) : void
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

        if ($isUpdate) {
            $origIngredients = Ingredient::where('recipe_id', $recipe->id)->get();
            $newIngrediendtIds = collect($ingredients)->pluck('id')->all();

            foreach ($origIngredients as $origIngredient) {
                if (!in_array($origIngredient->id, $newIngrediendtIds)) {
                    $origIngredient->delete();
                }
            }
        }
    }

    private function saveRecipeInstructions(array $recipeValidated, Recipe $recipe, bool $isUpdate = false) : void
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

        if ($isUpdate) {
            $origInstructions = Instruction::where('recipe_id', $recipe->id)->get();
            $newInstructionIds = collect($instrutions)->pluck('id')->all();

            foreach ($origInstructions as $origInstruction) {
                if (!in_array($origInstruction->id, $newInstructionIds)) {
                    $origInstruction->delete();
                }
            }
        }
    }

    public function getRecipe(Recipe $recipe) : array
    {
        $recipe = $recipe->load(['user', 'ingredients', 'instructions', 'images']);
        $timeUnit = RecipeTimeUnit::find($recipe->recipe_time_unit_id);

        if (count($recipe->images) === 0) {
            $recipe->images[0] = new Image([
                'path' => self::DEF_RECIPE_IMG_PATH,
                'alt_text' => 'recipe-img',
            ]);
        }

        return compact('recipe', 'timeUnit');
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
