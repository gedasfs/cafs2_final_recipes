<header class="position-relative">
    <x-nav />
    @if (request()->route()->named('index'))
        <div>
            <img class="landing-img" src={{ asset('images/header-img_board-on-metal.jpg') }} alt="landing-img">
        </div>
    @endif
    <x-cmn.search-bar />
</header>
