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
        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);

        $this->call([
            UserSeeder::class,
            CategorySeeder::class,
            RecipeTimeUnitSeeder::class,
            DifficultyLevelSeeder::class,
            RecipeSeeder::class,
            TagSeeder::class,
            IngredientGroupSeeder::class,
            IngredientSeeder::class,
            InstructionGroupSeeder::class,
            InstructionSeeder::class,
            ImageSeeder::class,
        ]);
    }
}
