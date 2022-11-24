<div class="d-flex justify-content-center mt-4">
    <div class="card">
        <h5 {{ $header->attributes->merge(['class' => 'card-header']) }}>{{ $header }}</h5>
        <div class="card-body">
            {{ $slot }}
        </div>
    </div>
</div>
