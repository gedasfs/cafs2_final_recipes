<?php

use App\Models\Recipe;
use App\Models\Category;
use Illuminate\Http\Request;
use App\Models\RecipeTimeUnit;
use App\Models\DifficultyLevel;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Recipe\RecipeController;
use App\Http\Controllers\Category\CategoryController;

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

Route::resource('/recipes', RecipeController::class);
Route::resource('/categories', CategoryController::class);

require __DIR__.'/auth.php';
