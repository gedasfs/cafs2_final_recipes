<x-layouts.main>
    <section>
        <h1 class="text-center mb-4">Receptai</h1>
        <article class="row justify-content-center">
            @foreach ($recipes as $recipe)
                <div class="col-12 col-md-6 mb-3">
                    <x-cmn.card-recipe :id="$recipe->id">
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

                    </x-cmn.card-recipe>
                </div>
            @endforeach
            <div class="mt-4">
                {{ $recipes->links() }}
            </div>
        </article>
    </section>
</x-layouts.main>
