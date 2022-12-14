<?php

namespace App\Http\Controllers\Recipes;


use App\Models\Recipe;
use Illuminate\Http\Request;
use App\Services\RecipeService;
use App\Http\Controllers\Controller;
use App\Http\Requests\Recipes\StoreRecipeRequest;
use App\Http\Requests\Recipes\UpdateRecipeRequest;

class RecipeController extends Controller
{
    public function __construct()
    {
        $this->middleware(['auth', 'verified'])->except(['index', 'show']);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function index(RecipeService $recipeService, Request $request)
    {
        $orderByValues = $recipeService->getOrderByValues();
        $recipes = $recipeService->getPaginatedRecipes($request->only('order_by'));


        return view('recipes.index', compact('recipes', 'orderByValues'));
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
        $recipe = $recipeService->saveRecipe($request->validated());

        return redirect()->route('recipes.show', $recipe->id);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Recipe  $recipe
     * @return \Illuminate\Http\Response
     */
    public function show(Recipe $recipe, RecipeService $recipeService)
    {
        $result = $recipeService->getRecipe($recipe);

        return view('recipes.show', $result);
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
    public function update(UpdateRecipeRequest $request, RecipeService $recipeService, Recipe $recipe)
    {
        $this->authorize('update', $recipe);

        $recipeService->updateRecipe($request->validated(), $recipe);

        return redirect()->route('recipes.show', $recipe->id);

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Recipe  $recipe
     * @return \Illuminate\Http\Response
     */
    public function destroy(Recipe $recipe)
    {
        $this->authorize('delete', $recipe);

        $recipe->delete();

        return redirect()->route('recipes.index');
    }
}
