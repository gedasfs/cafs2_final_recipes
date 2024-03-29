@props(['categoryId'])

<div {{ $attributes->merge([
    'class' => 'card card-category mb-3 mb-3 shadow',
    ]) }}>
{{-- <div class="card card-category mb-3 shadow"> --}}
    <img src="{{ asset('images/categories/demo-cat-' . rand(1, 2) . '.png') }}" class="card-img-category card-img-top" alt="img-card">
    <div class="card-body">
        <h5 class="card-title">{{ $cardTitle }}</h5>
        <div class="d-flex">
            <x-cmn.link-btn-arrow-e href="{{ route('categories.show', $categoryId) }}" outlined class="ms-auto"/>
        </div>
    </div>
</div>

