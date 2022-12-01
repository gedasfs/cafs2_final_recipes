<x-layouts.main>
    <section class="container recipe-show-section align-item-center">
        <h1>{{ $recipe->name }}</h1>
        <article>
            <div class="bg-light rounded px-2 py-4 text-center mb-2">
                <p>{{ $recipe->short_description }}</p>
                <p class="m-0">Įkėlė <strong class="text-muted">{{ $recipe->user->firstname }} {{ $recipe->user->lastname }}</strong></p>
                <p class="text-muted m-0">{{ $recipe->created_at->format('Y-m-d') }}</p>
                <x-cmn.link-btn class="mt-3" outlined >Redaguoti</x-cmn.link-btn>
            </div>
            <div class="mb-2 position-relative">
                <img src="{{ asset('images/recipes/meal-demo-2.jpg') }}" class="card-img rounded" alt="img-card">
                <x-cmn.link-btn-fav class="position-absolute top-0 start-0 m-3 m-md-2" />
            </div>
            <div class="p-4 rounded mb-2">
                <p class="m-0">{{ $recipe->description }}</p>
            </div>
            <div class="row bg-light p-4 rounded mb-2 text-center">
                <div class="col-12 col-sm-6">
                    <p class="mb-2 m-sm-0">Sudėtingumas: <strong class="text-primary">{{ $recipe->difficultyLevel->name }}</strong></p>
                </div>
                <div class="col-12 col-sm-6">
                    <p class="m-0">Porcijų sk.: <strong class="text-primary">{{ $recipe->servings }}</strong></p>
                </div>
            </div>
            <div class="row bg-light p-4 rounded text-center">
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
            <div class="p-4 my-2">
                <h3>Ingredientai</h3>

                <ul class="list-group">
                    @foreach ($recipe->ingredients as $ingridient)
                        <li class="list-group-item">
                            <input class="form-check-input me-3" type="checkbox" id="ingredient{{ $loop->index+1 }}">
                            <label class="form-check-label stretched-link" for="ingredient{{ $loop->index+1 }}">{{ $ingridient->quantity }} {{ $ingridient->unit }} {{ $ingridient->name }}</label>
                        </li>
                    @endforeach
                </ul>
            </div>
            <div class="p-4 mb-2">
                <h3>Gaminimo eiga</h3>

                <ol class="list-group list-group-numbered list-group-flush">
                    @foreach ($recipe->instructions as $instruction)
                        <li class="list-group-item">{{ $instruction->description }}</li>
                    @endforeach
                </ol>

            </div>
            <div class="p-4 my-2">
                <h3>Media</h3>
                <p class="m-0">Išorinė recepto nuoroda:</p>
                <x-cmn.link>{{ $recipe->ext_url }}</x-cmn.link>
            </div>
        </article>
    </section>

</x-layouts.main>
