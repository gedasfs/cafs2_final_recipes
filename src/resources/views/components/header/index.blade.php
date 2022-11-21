<header class="position-relative">
    <x-nav />
    @if (request()->route()->named('index'))
        <div class="bg-light">
            <img class="landing-img rounded rounded-2" src={{ asset('images/header-img_board-on-metal.jpg') }} alt="landing-img">
        </div>
    @endif
    <x-cmn.search-bar />
</header>
