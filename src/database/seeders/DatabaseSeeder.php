<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call([
            UserSeeder::class,
            CategorySeeder::class,
            RecipeTimeUnitSeeder::class,
            DifficultyLevelSeeder::class,
            RecipeSeeder::class,
            TagSeeder::class,
            IngredientSeeder::class,
            InstructionSeeder::class,
            FavoriteSeeder::class,
            ImageSeeder::class,
        ]);
    }
}
