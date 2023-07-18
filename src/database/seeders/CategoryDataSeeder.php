<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Data\CategoriesData;
use App\Models\Category;

class CategoryDataSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $this->seedFull(CategoriesData::DATA, uniqueSeeds: false, updateEntry: false);
    }

    private function seedFull(array $data, bool $uniqueSeeds = false, bool $updateEntry = false) : void
    {
        foreach ($data as $element) {
            if($uniqueSeeds && $updateEntry) {
                Category::updateOrCreate(
                    ['name' => $element['name']],
                    $element
                );
                continue;
            }

            if ($uniqueSeeds) {
                Category::firstOrCreate(
                    ['name' => $element['name']],
                    $element
                );
                continue;
            }

            Category::create($element);
        }
    }
}
