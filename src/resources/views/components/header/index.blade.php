@php
    $routeIsIndex = request()->route()->named('index');
@endphp

<header @class(['position-relative' => $routeIsIndex])>
    <x-nav />
    @if ($routeIsIndex)
        <div class="bg-light">
            <img class="landing-img rounded rounded-2" src={{ asset('images/header-img_board-on-metal.jpg') }} alt="landing-img">
        </div>
    @endif
    <x-cmn.search-bar :$routeIsIndex />
</header>
