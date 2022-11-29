<x-layouts.main>
    <x-cmn.card>
        <x-slot:header class="py-3 text-center">Naujo recepto įkėlimas</x-slot:header>

        <div id="recipeCreate">
            <form method="POST" action="{{ route('recipes.store') }}">
                @csrf

                <x-recipes.recipe-create-section id="recipeGeneral">
                    <x-slot:title>Bendra informacija</x-slot:title>
                    <div>
                        @error('name')
                            <x-cmn.input-error-msg>{{ $message }}</x-cmn.input-error-msg>
                        @enderror
                        <x-cmn.floating-input size="75" name="name" id="name" class="{{ $errors->first('name') ? 'is-invalid' : '' }}">Recepto pavadinimas</x-cmn.floating-input>
                    </div>

                    <div>
                        @error('short_description')
                            <x-cmn.input-error-msg>{{ $message }}</x-cmn.input-error-msg>
                        @enderror
                        <x-cmn.floating-textarea name="short_description" id="shortDescription" class="{{ $errors->first('short_description') ? 'is-invalid' : '' }}" countable maxlength="255">Trumpas apibūdinimas</x-cmn.floating-textarea>
                    </div>

                    <div>
                        @error('description')
                            <x-cmn.input-error-msg>{{ $message }}</x-cmn.input-error-msg>
                        @enderror
                        <x-cmn.floating-textarea name="description" id="description" class="{{ $errors->first('description') ? 'is-invalid' : '' }}" height="125px">Aprašymas, komentarai, pastebėjimai</x-cmn.floating-textarea>
                    </div>
                </x-recipes.recipe-create-section>

                <x-recipes.recipe-create-section id="categoryDifficulty">
                    <x-slot:title>Kategorijos, sudėtingumas</x-slot:title>

                    <div>
                        @error('category_id')
                            <x-cmn.input-error-msg>{{ $message }}</x-cmn.input-error-msg>
                        @enderror
                        <x-cmn.floating-select name="category_id" id="category" class="{{ $errors->first('category_id') ? 'is-invalid' : '' }}" >
                            Kategorija
                            <x-slot:firstSelectName>Pasirinkite patiekalo kategoriją...</x-slot:firstSelectName>
                            <x-slot:options>
                                @foreach ($categories as $cat)
                                    <option value="{{ $cat->id }}">{{ $cat->name }}</option>
                                @endforeach
                            </x-slot:options>
                        </x-cmn.floating-select>
                    </div>

                    <div id="categoryDifficulty">
                        @error('difficulty_level_id')
                            <x-cmn.input-error-msg>{{ $message }}</x-cmn.input-error-msg>
                        @enderror
                        <x-cmn.floating-select name="difficulty_level_id" id="difficultyLevelId" class="{{ $errors->first('difficulty_level_id') ? 'is-invalid' : '' }}">
                            Sudėtingumas
                            <x-slot:firstSelectName>Pasirinkite sudėtingumo lygį...</x-slot:firstSelectName>
                            <x-slot:options>
                                @foreach ($difficultyLevels as $level)
                                    <option value="{{ $level->id }}">{{ $level->name }}</option>
                                @endforeach
                            </x-slot:options>
                        </x-cmn.floating-select>
                    </div>

                    <div>
                        <p><span class="text-danger">TO DO:</span> tags</p>
                    </div>

                </x-recipes.recipe-create-section>

                <x-recipes.recipe-create-section id="timePortions">
                    <x-slot:title>Gaminimo laikas, porcijų kiekis</x-slot:title>

                    <div class="row mb-3 mb-md-0">
                        <div class="col-12 col-md-6">
                            @error('prep_time')
                                <x-cmn.input-error-msg>{{ $message }}</x-cmn.input-error-msg>
                            @enderror
                            <x-cmn.floating-input type="number" name="prep_time" id="prepTime" class="{{ $errors->first('prep_time') ? 'is-invalid' : '' }}">Paruošimo laikas</x-cmn.floating-input>
                        </div>
                        <div class="col-12 col-md-6">
                            @error('prep_time_unit_id')
                                <x-cmn.input-error-msg>{{ $message }}</x-cmn.input-error-msg>
                            @enderror
                            <x-cmn.floating-select name="prep_time_unit_id" id="prepTimeUnitId" class="{{ $errors->first('prep_time_unit_id') ? 'is-invalid' : '' }}">
                                Laiko vienetas
                                <x-slot:firstSelectName>Pasirinkite vnt...</x-slot:firstSelectName>
                                <x-slot:options>
                                    @foreach ($timeUnits as $unit)
                                        <option value="{{ $unit->id }}">{{ $unit->name }}</option>
                                    @endforeach
                                </x-slot:options>
                            </x-cmn.floating-select>
                        </div>
                    </div>

                    <div class="row mb-3 mb-md-0">
                        <div class="col-12 col-md-6">
                            @error('cook_time')
                                <x-cmn.input-error-msg>{{ $message }}</x-cmn.input-error-msg>
                            @enderror
                            <x-cmn.floating-input type="number" name="cook_time" id="cookTime" class="{{ $errors->first('cook_time') ? 'is-invalid' : '' }}">Gaminimo laikas</x-cmn.floating-input>
                        </div>

                        <div class="col-12 col-md-6">
                            @error('cook_time_unit_id')
                                <x-cmn.input-error-msg>{{ $message }}</x-cmn.input-error-msg>
                            @enderror
                            <x-cmn.floating-select name="cook_time_unit_id" id="cookTimeUnitId" class="{{ $errors->first('cook_time_unit_id') ? 'is-invalid' : '' }}">
                                Laiko vienetas
                                <x-slot:firstSelectName>Pasirinkite vnt...</x-slot:firstSelectName>
                                <x-slot:options>
                                    @foreach ($timeUnits as $unit)
                                        <option value="{{ $unit->id }}">{{ $unit->name }}</option>
                                    @endforeach
                                </x-slot:options>
                            </x-cmn.floating-select>
                        </div>
                    </div>

                    <div>
                        @error('servings')
                            <x-cmn.input-error-msg>{{ $message }}</x-cmn.input-error-msg>
                        @enderror
                        <x-cmn.floating-input type="number" name="servings" id="servings" class="{{ $errors->first('servings') ? 'is-invalid' : '' }}">Porcijų kiekis</x-cmn.floating-input>
                    </div>
                </x-recipes.recipe-create-section>

                <x-recipes.recipe-create-section id="ingredients">
                    <x-slot:title>Ingredientai</x-slot:title>
                    <div class="groups-wrapper">
                        <x-recipes.ingredient-group />
                    </div>

                    <div>
                        <x-cmn.btn outlined data-btn="addIngredientGroup">+ Pridėti naują ingredientų grupę</x-cmn.btn>
                    </div>
                </x-recipes.recipe-create-section>

                <x-recipes.recipe-create-section id="instructions">
                    <x-slot:title>Gaminimo eiga</x-slot:title>
                    <div class="groups-wrapper">
                        <x-recipes.instruction-group />
                    </div>
                    <div>
                        <x-cmn.btn outlined data-btn="addInstructionGroup">+ Pridėti naują gaminimo eigos grupę</x-cmn.btn>
                    </div>
                </x-recipes.recipe-create-section>

                <x-recipes.recipe-create-section id="media">
                    <x-slot:title>Media</x-slot:title>
                    <div>
                        @error('ext_url')
                            <x-cmn.input-error-msg>{{ $message }}</x-cmn.input-error-msg>
                        @enderror
                        <x-cmn.input-file name="recipe_photo">Pasirinkite nuotrauką receptui:</x-cmn.input-file>
                    </div>
                    <div>
                        @error('ext_url')
                            <x-cmn.input-error-msg>{{ $message }}</x-cmn.input-error-msg>
                        @enderror
                        <x-cmn.floating-input name="ext_url" id="extUrl" class="{{ $errors->first('ext_url') ? 'is-invalid' : '' }}">Išorinė nuoroda į receptą</x-cmn.floating-input>
                    </div>
                </x-recipes.recipe-create-section>

                <div class="text-end">
                    <x-cmn.link-btn class="me-3" outlined color="secondary" href="{{ route('index') }}">Atšaukti</x-cmn.link-btn>
                    <x-cmn.btn type="submit">Išsaugoti</x-cmn.btn>
                </div>
            </form>
        </div>
    </x-cmn.card>
</x-layouts.main>
