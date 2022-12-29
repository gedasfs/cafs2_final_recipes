<x-layouts.main>
    <section class="container recipe-show-section align-item-center">
        <h1>{{ $recipe->name }}</h1>
        <article>
            <div class="my-2 pt-3 pb-2 px-2 px-md-3 bg-light rounded text-center">
                <div class="">
                    <p class="m-0 mb-3">{{ $recipe->short_description }}</p>
                    <p class="m-0">Įkėlė <strong class="text-muted">{{ $recipe->user->firstname }} {{ $recipe->user->lastname }}</strong></p>
                    <p class="text-muted m-0">{{ $recipe->created_at->format('Y-m-d') }}</p>
                </div>
                <div class="user-actions mt-3 d-flex gap-2 justify-content-center align-items-center">
                    @auth
                        <x-cmn.link-btn-fav />
                    @endauth
                    @can('update', $recipe)
                        <x-cmn.link-btn-edit href="{{ route('recipes.edit', $recipe->id) }}" />
                    @endcan
                    @can('delete', $recipe)
                        <x-cmn.form-delete action="{{ route('recipes.destroy', $recipe->id) }}" />
                    @endcan
                    <x-cmn.link-btn-pdf href="{{ route('pdf.recipe', $recipe->id) }}" target="_blank" />
                </div>
            </div>
            <div class="my-2">
                <x-cmn.image-slider :images="$recipe->images" :id="'recipeSlider'.$recipe->id"></x-cmn.image-slider>
            </div>
            <div class="my-4 px-1">
                <p class="m-0 text-justify">{{ $recipe->description }}</p>
            </div>
            <div class="row mt-2 bg-light p-2 p-sm-3 rounded mb-2 text-center">
                <div class="col-12 col-sm-4">
                    <p class="m-0">Kategorija:</p>
                    <p class="mb-2 m-sm-0"><strong class="text-primary">{{ $recipe->category->name }}</strong></p>
                </div>
                <div class="col-12 col-sm-4">
                    <p class="m-0">Sudėtingumas:</p>
                    <p class="mb-2 m-sm-0"><strong class="text-primary">{{ $recipe->difficultyLevel->name}}</strong></p>
                </div>
                <div class="col-12 col-sm-4">
                    <p class="m-0">Porcijų kiekis:</p>
                        <p class="mb-2 m-sm-0"><strong class="text-primary">{{ $recipe->servings }}</strong></p>
                </div>
            </div>
            <div class="row mb-2 bg-light p-2 p-sm-3 rounded text-center">
                <div class="col-12 col-sm-4">
                    <p class="m-0">Paruošimo laikas:</p>
                    <p class="mb-2 m-sm-0"><strong class="text-primary">{{ $recipe->prep_time }} {{ $timeUnit->name }}</strong></p>
                </div>
                <div class="col-12 col-sm-4">
                    <p class="m-0">Gaminimo laikas:</p>
                    <p class="mb-2 m-sm-0"><strong class="text-primary">{{ $recipe->cook_time }} {{ $timeUnit->name }}</strong></p>
                </div>
                <div class="col-12 col-sm-4">
                    <p class="m-0">Viso:</p>
                    <p class="mb-2 m-sm-0"><strong class="text-primary">{{ $recipe->total_time }} {{ $timeUnit->name }}</strong></p>
                </div>
            </div>
            <div class="mt-4">
                <h3>Ingredientai</h3>
                <ul class="list-group">
                    @foreach ($recipe->ingredients as $ingridient)
                        <li class="list-group-item ms-md-2 d-flex">
                            <div>
                                <input class="form-check-input me-3" type="checkbox" id="ingredient{{ $loop->index+1 }}">
                            </div>
                            <label class="form-check-label stretched-link" for="ingredient{{ $loop->index+1 }}">{{ $ingridient->name }}, {{ $ingridient->quantity }} {{ $ingridient->unit }}</label>
                        </li>
                    @endforeach
                </ul>
            </div>
            <div class="mt-4">
                <h3>Gaminimo eiga</h3>
                <ol class="list-group list-group-numbered list-group-flush">
                    @foreach ($recipe->instructions as $instruction)
                        <li class="list-group-item d-flex justify-content-between align-items-start px-0 ms-md-2">
                            <div class="ms-2 me-auto text-justify">
                                {{ $instruction->description }}
                            </div>
                        </li>
                    @endforeach
                </ol>

            </div>
            <div class="mt-4">
                <h3>Media</h3>
                <p class="m-0">Išorinė recepto nuoroda:</p>
                <x-cmn.link>{{ $recipe->ext_url }}</x-cmn.link>
            </div>
        </article>
    </section>

</x-layouts.main>
