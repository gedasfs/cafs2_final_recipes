<?php

namespace App\Http\Controllers\Recipes;

use Faker\Core\File;
use App\Models\Image;
use App\Models\Recipe;
use App\Models\Ingredient;
use App\Models\Instruction;
use Illuminate\Http\Request;
use App\Models\RecipeTimeUnit;
use App\Services\RecipeService;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use App\Http\Requests\Recipes\StoreRecipeRequest;

class RecipeController extends Controller
{
    protected const DEF_RECIPE_IMG_PATH = 'images/recipes/default-recipe-img.png';

    public function __construct()
    {
        $this->middleware(['auth', 'verified'])->except(['index', 'show']);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function index()
    {
        $recipes = Recipe::with('images')->paginate(10);

        return view('recipes.index', compact('recipes'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('recipes.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreRecipeRequest $request, RecipeService $recipeService)
    {
        // $recipeValidated = $request->validated();
        $recipe = $recipeService->saveRecipe($request->validated());

        return redirect()->route('recipes.show', $recipe->id);

        // dd($recipeValidated, $filePath);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Recipe  $recipe
     * @return \Illuminate\Http\Response
     */
    public function show(Recipe $recipe)
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

        return view('recipes.show', compact('recipe', 'timeUnit', 'recipeImagePath'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Recipe  $recipe
     * @return \Illuminate\Http\Response
     */
    public function edit(Recipe $recipe)
    {
        $this->authorize('update', $recipe);

        return view('recipes.edit', compact('recipe'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Recipe  $recipe
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Recipe $recipe)
    {
        $this->authorize('store', $recipe);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Recipe  $recipe
     * @return \Illuminate\Http\Response
     */
    public function destroy(Recipe $recipe)
    {
        //
    }
}
