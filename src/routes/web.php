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
    $timeUnits = RecipeTimeUnit::all();
    $difficultyLevels = DifficultyLevel::all();

    return view('index', compact('recipes', 'timeUnits', 'difficultyLevels'));
})->name('index');

// Route::prefix('/auth')->name('auth.')->group(function() {
//     Route::get('/', function() {
//         return redirect()->route('auth.login');
//     });

//     Route::get('/login', function() {
//         return view('authorization.login');
//     })->name('login');

//     Route::get('/register', function() {
//         return view('authorization.register');
//     })->name('register');

//     Route::get('/forgot-password', function() {
//         return view('authorization.forgot-password');
//     })->name('password.request');
// });

Route::prefix('/recipes')->name('recipes.')->group(function () {
    Route::get('/', function() {
        $recipes = Recipe::paginate(10);
        $timeUnits = RecipeTimeUnit::all();
        $difficultyLevels = DifficultyLevel::all();

        return view('recipes.index', compact('recipes', 'timeUnits', 'difficultyLevels'));
    })->name('index');

    Route::get('/{recipe}', function(Recipe $recipe) {
        // $timeUnits = RecipeTimeUnit::all();

        return view('recipes.show', compact('recipe'));
    })->name('show');

    Route::get('/create', function() {

        $categories = Category::all();
        $timeUnits = RecipeTimeUnit::all();
        $difficultyLevels = DifficultyLevel::all();

        return view('recipes.create', compact('categories', 'timeUnits', 'difficultyLevels'));
    })->name('create')->middleware(['auth', 'verified']);

    Route::post('/store', function(Request $request) {
        dd($request);
    })->name('store');



});

Route::prefix('/categories')->name('categories.')->group(function () {
    Route::get('/', function() {
        return view('categories.index');
    })->name('index');
});

// Route::get('/dashboard', function () {
//     return view('dashboard');
// })->middleware(['auth', 'verified'])->name('dashboard');

require __DIR__.'/auth.php';
