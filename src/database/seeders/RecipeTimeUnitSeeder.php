<?php

namespace Database\Seeders;

use App\Models\RecipeTimeUnit;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class RecipeTimeUnitSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        RecipeTimeUnit::factory(5)->create();
    }
}
