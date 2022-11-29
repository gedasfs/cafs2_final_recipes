<?php

use App\Models\Recipe;
use App\Models\Category;
use Illuminate\Http\Request;
use App\Models\RecipeTimeUnit;
use App\Models\DifficultyLevel;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    $recipes = Recipe::latest()->take(4)->get();

    return view('index', compact('recipes'));
})->name('index');

Route::prefix('/recipes')->name('recipes.')->group(function () {
    Route::get('/', function() {
        $recipes = Recipe::paginate(10);

        return view('recipes.index', compact('recipes'));
    })->name('index');

    Route::get('/create', function() {

        return view('recipes.create');
    })->name('create')->middleware(['auth', 'verified']);

    Route::post('/store', function(Request $request) {
        dd($request);
    })->name('store');

    Route::get('/{recipe}', function(Recipe $recipe) {
        $recipe = $recipe->load(['user', 'ingredientGroups', 'ingredientGroups.ingredients', 'instructionGroups', 'instructionGroups.instructions']);
        // dd($recipe);
        $timeUnit = RecipeTimeUnit::find($recipe->recipe_time_unit_id);

        return view('recipes.show', compact('recipe', 'timeUnit'));
    })->name('show');

});

Route::prefix('/categories')->name('categories.')->group(function () {
    Route::get('/', function() {
        $categories = Category::paginate(12);

        return view('categories.index', compact('categories'));
    })->name('index');
});

// Route::get('/dashboard', function () {
//     return view('dashboard');
// })->middleware(['auth', 'verified'])->name('dashboard');

require __DIR__.'/auth.php';
