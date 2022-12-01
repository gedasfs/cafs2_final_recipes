<?php

namespace App\Http\Controllers\Recipes;

use Faker\Core\File;
use App\Models\Image;
use App\Models\Recipe;
use App\Models\Ingredient;
use App\Models\Instruction;
use Illuminate\Http\Request;
use App\Models\RecipeTimeUnit;
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
        $recipes = Recipe::paginate(10);

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
    public function store(StoreRecipeRequest $request)
    {
        $recipeValidated = $request->validated();
        $user = Auth::user();
        $recipeValidated['user_id'] = $user->id;

        $recipe = Recipe::create($recipeValidated);

        $instructions = [];
        foreach ($recipeValidated['instruction_description'] as $description) {
            $instructions[] = new Instruction(['description' => $description]);
        }
        $recipe->instructions()->saveMany($instructions);

        $ingredients = [];
        for ($i=0; $i < count($recipeValidated['ingredient_name']); $i++) {
            $ingredients[] = new Ingredient([
                'name' => $recipeValidated['ingredient_name'][$i],
                'quantity' => $recipeValidated['ingredient_quantity'][$i],
                'unit' =>$recipeValidated['ingredient_unit'][$i]
            ]);
        }
        $recipe->ingredients()->saveMany($ingredients);


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


        return redirect()->route('recipes.show', $recipe->id);

        dd($recipeValidated, $filePath);
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
        //
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
        //
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
