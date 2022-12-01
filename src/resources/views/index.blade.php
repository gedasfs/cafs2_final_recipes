<x-layouts.main>
    <section class="py-2 bg-light">
        <h1 class="text-center text-secondary my-4">NAUJAUSI RECEPTAI</h1>
        <article class="row justify-content-center">
            @foreach ($recipes as $recipe)
                <div class="col-12 col-md-6 mb-3">
                    <x-recipes.card-recipe :recipeId="$recipe->id">
                        @php
                            $timeUnit = $timeUnits->first(fn($value, $key) => $value->id == $recipe->recipe_time_unit_id);
                            $difficultyLevel = $difficultyLevels->first(fn($value, $key) => $value->id == $recipe->difficulty_level_id)
                        @endphp

                        <x-slot:name>{{ $recipe->name }}</x-slot:name>
                        <x-slot:shortDescription>{{ $recipe->short_description }}</x-slot:shortDescription>
                        <x-slot:cookTime>{{ $recipe->cook_time }}</x-slot:cookTime>
                        <x-slot:timeUnit>{{ $timeUnit->name }}</x-slot:timeUnit>
                        <x-slot:servings>{{ $recipe->servings }}</x-slot:servings>
                        <x-slot:difficulty>{{ $difficultyLevel->name }}</x-slot:difficulty>
                        <x-slot:imagePath>{{ asset($recipe->images[0]->path ?? 'images/recipes/default-recipe-img.png') }}</x-slot:imagePath>

                    </x-recipes.card-recipe>
                </div>
            @endforeach
        </article>
    </section>

    <section class="py-2">
        <h1 class="text-center text-secondary my-4">NAUJAUSIOS KATEGORIJOS</h1>
        <article class="row justify-content-center">
            @foreach ($categories as $category)
                <div class="col-6 col-lg-3 mb-3 d-flex justify-content-center">
                    <x-categories.card-category class="bg-light">
                        <x-slot:cardTitle>{{ $category->name }}</x-slot:cardTitle>
                    </x-categories.card-category>
                </div>
            @endforeach
        </article>
    </section>
</x-layouts.main>
