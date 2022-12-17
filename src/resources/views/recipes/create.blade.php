@props(['update' => 'false'])
@php
    $route = $update && isset($recipe) ? route('recipes.update', $recipe->id) : route('recipes.store');
@endphp

<x-layouts.main>
    <x-cmn.card>
        <x-slot:header class="py-3 text-center">Receptas</x-slot:header>

        <div id="recipeCreate">
            <form
                enctype="multipart/form-data"
                method="POST"
                action="{{ $route }}"
                >

                @if ($update && isset($recipe))
                    @method('PUT')
                @endif

                @csrf

                <x-recipes.recipe-create-section id="recipeGeneral">
                    <x-slot:title>Bendra informacija</x-slot:title>
                    <div>
                        <x-cmn.floating-input
                            name="name"
                            id="name"
                            value="{{ old('name', $recipe->name ?? '') }}"
                            error="{{ $errors->first('name') ?? '' }}"
                        >Recepto pavadinimas*</x-cmn.floating-input>
                    </div>

                    <div>
                        <x-cmn.floating-textarea
                            name="short_description"
                            id="shortDescription"
                            value="{{ old('short_description', $recipe->short_description ?? '') }}"
                            error="{{ $errors->first('short_description') ?? '' }}"
                            countable
                            maxlength="255"
                        >Trumpas apibūdinimas</x-cmn.floating-textarea>
                    </div>

                    <div>
                        <x-cmn.floating-textarea
                            name="description"
                            id="description"
                            value="{{ old('description', $recipe->description ?? '') }}"
                            error="{{ $errors->first('description') ?? '' }}"
                            height="125px"
                        >Aprašymas, komentarai, pastebėjimai</x-cmn.floating-textarea>
                    </div>
                </x-recipes.recipe-create-section>

                <x-recipes.recipe-create-section id="categoryAndDifficulty">
                    <x-slot:title>Kategorijos, sudėtingumas</x-slot:title>

                    <div id="category">
                        <x-cmn.floating-select
                            name="category_id"
                            id="category"
                            error="{{ $errors->first('category_id') ?? '' }}"
                        >
                            Kategorija*
                            <x-slot:firstSelectName>Pasirinkite patiekalo kategoriją...</x-slot:firstSelectName>
                            <x-slot:options>
                                @foreach ($categories as $cat)
                                    <option
                                        value="{{ $cat->id }}"
                                        @if (old('category_id'))
                                            @selected(old('category_id') == $cat->id)
                                        @elseif (isset($recipe))
                                            @selected($recipe->category_id == $cat->id)
                                        @endif
                                    >{{ $cat->name }}</option>
                                @endforeach
                            </x-slot:options>
                        </x-cmn.floating-select>
                    </div>

                    <div id="difficulty">
                        <x-cmn.floating-select
                            name="difficulty_level_id"
                            id="difficultyLevelId"
                            error="{{ $errors->first('difficulty_level_id') ?? '' }}"
                        >
                            Sudėtingumas*
                            <x-slot:firstSelectName>Pasirinkite sudėtingumo lygį...</x-slot:firstSelectName>
                            <x-slot:options>
                                @foreach ($difficultyLevels as $level)
                                    <option
                                        value="{{ $level->id }}"
                                        @if (old('difficulty_level_id'))
                                            @selected(old('difficulty_level_id') == $level->id)
                                        @elseif (isset($recipe))
                                            @selected($recipe->difficulty_level_id == $level->id)
                                        @endif
                                    >{{ $level->name }}</option>
                                @endforeach
                            </x-slot:options>
                        </x-cmn.floating-select>
                    </div>

                    <div id="recipeTags">
                        <x-cmn.floating-input
                            name="tags"
                            id="tags"
                            value="{{ old('tags') }}"
                            error="{{ $errors->first('tags') ?? '' }}"
                        >Žymės (pvz., BBQ, be cukraus)</x-cmn.floating-input>
                    </div>
                </x-recipes.recipe-create-section>

                <x-recipes.recipe-create-section id="timeAndServings">
                    <x-slot:title>Gaminimo laikas, porcijų kiekis</x-slot:title>

                    <div class="row mb-3 mb-md-0">
                        <div class="col-12 col-md-3">
                            <x-cmn.floating-input
                                name="prep_time"
                                id="prepTime"
                                value="{{ old('prep_time', $recipe->prep_time ?? '') }}"
                                error="{{ $errors->first('prep_time') ?? '' }}"
                            >Paruošimo laikas*</x-cmn.floating-input>
                        </div>
                        <div class="col-12 col-md-3">
                            <x-cmn.floating-input
                                name="cook_time"
                                id="cookTime"
                                value="{{ old('cook_time', $recipe->cook_time ?? '') }}"
                                error="{{ $errors->first('cook_time') ?? '' }}"
                            >Gaminimo laikas*</x-cmn.floating-input>
                        </div>
                        <div class="col-12 col-md-3">
                            <x-cmn.floating-input
                                name="total_time"
                                id="totalTime"
                                value="{{ old('total_time', $recipe->total_time ?? '') }}"
                                error="{{ $errors->first('total_time') ?? '' }}"
                            >Viso laikas*</x-cmn.floating-input>
                        </div>
                        <div class="col-12 col-md-3">
                            <x-cmn.floating-select
                                name="recipe_time_unit_id"
                                id="recipeTimeUnitId"
                                error="{{ $errors->first('recipe_time_unit_id') ?? '' }}"
                            >
                                Laiko vienetas*
                                <x-slot:firstSelectName>Pasirinkite vnt...</x-slot:firstSelectName>
                                <x-slot:options>
                                    @foreach ($timeUnits as $unit)
                                        <option
                                            value="{{ $unit->id }}"
                                            @if (old('recipe_time_unit_id'))
                                                @selected(old('recipe_time_unit_id') == $unit->id)
                                            @elseif (isset($recipe))
                                            @selected($recipe->recipe_time_unit_id == $unit->id)
                                            @endif
                                        >{{ $unit->name }}</option>
                                    @endforeach
                                </x-slot:options>
                            </x-cmn.floating-select>
                        </div>
                    </div>

                    <div>
                        <x-cmn.floating-input
                            type="number"
                            name="servings"
                            id="servings"
                            value="{{ old('servings', $recipe->servings ?? '') }}"
                            error="{{ $errors->first('servings') ?? '' }}"
                        >Porcijų kiekis*</x-cmn.floating-input>
                    </div>
                </x-recipes.recipe-create-section>

                <x-recipes.recipe-create-section id="ingredients" section>
                    <x-slot:title>Ingredientai</x-slot:title>

                    <div class="lines">
                        @if (isset($recipe))
                            <x-recipes.ingredient :$recipe/>
                        @else
                            <x-recipes.ingredient/>
                        @endif
                    </div>

                    <div class="my-2">
                        <x-cmn.btn outlined data-btn="addLine">Pridėti ingredientą</x-cmn.btn>
                    </div>
                </x-recipes.recipe-create-section>

                <x-recipes.recipe-create-section id="instructions" section>
                    <x-slot:title>Gaminimo eiga</x-slot:title>

                    <div class="lines">
                        @if (isset($recipe))
                            <x-recipes.instruction :$recipe/>
                        @else
                            <x-recipes.instruction/>
                        @endif
                    </div>

                    <div class="my-2">
                        <x-cmn.btn outlined data-btn="addLine">Pridėti sekantį žingsnį</x-cmn.btn>
                    </div>
                </x-recipes.recipe-create-section>

                <x-recipes.recipe-create-section id="media">
                    <x-slot:title>Media</x-slot:title>
                    <div>
                        <x-cmn.input-file
                            name="recipe_photos[]"
                            error="{{ $errors->first('recipe_photos') ?? '' }}"
                        >Pasirinkite nuotrauką receptui:</x-cmn.input-file>
                    </div>
                    <div>
                        <x-cmn.floating-input
                            name="ext_url"
                            id="extUrl"
                            value="{{ old('ext_url', $recipe->ext_url ?? '') }}"
                            error="{{ $errors->first('ext_url') ?? '' }}"
                        >Išorinė nuoroda į receptą</x-cmn.floating-input>
                    </div>
                </x-recipes.recipe-create-section>

                <div class="text-end">
                    <x-cmn.link-btn class="me-3" outlined color="secondary" href="{{ url()->previous() }}">Atšaukti</x-cmn.link-btn>
                    <x-cmn.btn type="submit">Išsaugoti</x-cmn.btn>
                </div>
            </form>
        </div>
    </x-cmn.card>
</x-layouts.main>
