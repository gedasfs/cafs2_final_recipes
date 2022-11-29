<?php

namespace App\Providers;

use App\Models\Category;
use App\Models\RecipeTimeUnit;
use App\Models\DifficultyLevel;
use Illuminate\Support\ServiceProvider;

class ViewServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        view()->composer(['index', 'recipes.index' , 'recipes.create', 'recipes.show'], function ($view) {
            $timeUnits = RecipeTimeUnit::all();
            $difficultyLevels = DifficultyLevel::all();

            return $view->with(compact('timeUnits', 'difficultyLevels'));
        });

        view()->composer(['recipes.create'], function ($view) {
            $categories = Category::all();

            return $view->with(compact('categories'));
        });
    }
}
