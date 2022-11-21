<div {{ $attributes->merge(['class' => 'searchBar']) }}>
    <div class="input-group mt-3 mb-5">
        <input size="10" type="text" class="form-control text-primary border-primary rounded-5 p-2 ps-3 p-lg-3 position-absolute end-0 w-100" placeholder="Atrask kažką skanaus..." aria-label="search" aria-describedby="basic-addon1">
        <x-cmn.link-btn class="p-2 p-lg-3 px-3 px-lg-4 position-absolute end-0">Ieškoti</x-cmn.link-btn>
    </div>
</div>
