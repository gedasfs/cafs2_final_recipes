@props(['id'])

<div class="card mb-3 shadow">
    <div class="row g-0">
        <div class="col-12 col-xl-5 col-xxl-4 position-relative">
            <img src="{{ asset('images/meal-demo-5.jpg') }}" class="card-img rounded" alt="img-card">
            <x-cmn.link-btn-fav class="position-absolute top-0 start-0 m-3 m-md-2" />
        </div>
        <div class="col-12 col-xl-7 col-xxl-8">
            <div class="card-body">
                <x-cmn.link href="{{ route('recipes.show', $id) }}">
                    <h4 class="card-title text-primary">{{ $name }}</h4>
                </x-cmn.link>
                <p class="card-text text-secondary">{{ $shortDescription }}</p>
                <div class="d-flex justify-content-around text-center fw-bold">
                    <div>
                        <p class="text-primary mb-2 mx-2">Gam. trukmė</p>
                        <p class="text-secondary">{{ $cookTime }} {{ $timeUnit }}</p>
                    </div>
                    <div class="border-vertical"></div>
                    <div>
                        <p class="text-primary mb-2 mx-2">Porcijų sk.</p>
                        <p class="text-secondary">{{ $servings }}</p>
                    </div>
                    <div class="border-vertical"></div>
                    <div>
                        <p class="text-primary mb-2 mx-2">Sunkumas</p>
                        <p class="text-secondary">{{ $difficulty }}</p>
                    </div>
                </div>
                <div class="d-flex">
                    <x-cmn.link-btn-arrow-b href="{{ route('recipes.show', $id) }}" outlined class="ms-auto"/>
                </div>
            </div>
        </div>
    </div>
</div>
