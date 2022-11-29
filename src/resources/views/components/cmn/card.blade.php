<div class="d-flex justify-content-center mt-4 recipe-show-card">
    <div class="card">
        <h3 {{ $header->attributes->merge(['class' => 'card-header']) }}>{{ $header }}</h3>
        <div class="card-body">
            {{ $slot }}
        </div>
    </div>
</div>
