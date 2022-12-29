<x-layouts.pdf>
    <section class="">
        <h1>{{ $recipe->name }}</h1>
        <article>
            <div class="">
                <p class="m-0">Įkėlė <span class="text-muted"><strong>{{ $recipe->user->firstname }} {{ $recipe->user->lastname }}</strong> <small>({{ $recipe->created_at->format('Y-m-d') }})</small></span></p>
                <p class="m-0 text-muted"></p>
                <p class="m-0">{{ $recipe->short_description }}</p>
            </div>
            <div class="mt-4">
                @foreach ($recipe->images as $image)
                    @php
                        if ($loop->index == 3) {
                            break;
                        }
                    @endphp
                    <img src="{{ $image->path ?? '' }}" alt="{{ $image->alt_text ?? 'img' }}" class="me-2">
                @endforeach
            </div>
            <div class="mt-4">
                <p class="m-0">{{ $recipe->description }}</p>
            </div>

            <div class="mt-4">
                <div class="d-inline-block">
                    <p class="m-0">Sudėtingumas: <strong class="text-primary">{{ $recipe->difficultyLevel->name}}</strong></p>
                    <p class="m-0">Porcijų sk.: <strong class="text-primary">{{ $recipe->servings }}</strong></p>
                </div>
                <div class="d-inline-block ms-5">
                    <p class="m-0">Paruošimo laikas:</p>
                    <p class="m-0"><strong class="text-primary">{{ $recipe->prep_time }} {{ $timeUnit->name }}</strong></p>
                </div>
                <div class="d-inline-block ms-5">
                    <p class="m-0">Gaminimo laikas:</p>
                    <p class="m-0"><strong class="text-primary">{{ $recipe->cook_time }} {{ $timeUnit->name }}</strong></p>
                </div>
                <div class="d-inline-block ms-5">
                    <p class="m-0">Viso:</p>
                    <p class="m-0"><strong class="text-primary">{{ $recipe->total_time }} {{ $timeUnit->name }}</strong></p>
                </div>
            </div>
            <div>
                <h3>Ingredientai</h3>
                <ul>
                    @foreach ($recipe->ingredients as $ingridient)
                        <li class="">{{ $ingridient->quantity }} {{ $ingridient->unit }} {{ $ingridient->name }}</li>
                    @endforeach
                </ul>
            </div>
            <div>
                <h3>Gaminimo eiga</h3>
                <ol>
                    @foreach ($recipe->instructions as $instruction)
                        <li class="">{{ $instruction->description }}</li>
                    @endforeach
                </ol>
            </div>
            <div>
                <h3>Media</h3>
                <p class="m-0">Recepto nuoroda:</p>
                <x-cmn.link>{{ url()->current() }}</x-cmn.link>
            </div>
        </article>
    </section>
</x-layouts.pdf>
