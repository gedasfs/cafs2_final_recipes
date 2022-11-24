@php
    $deniedRoutes = ['login', 'register', 'forgot-password', 'reset-password', 'verify-email', 'confirm-password'];
    $routeIsIndex = request()->route()->named('index');
    // dd(request()->route()->uri);
@endphp

<header @class(['position-relative' => $routeIsIndex])>
    <x-nav />
    @if ($routeIsIndex)
        <div class="bg-light">
            <img class="landing-img rounded rounded-2" src={{ asset('images/header-img_board-on-metal.jpg') }} alt="landing-img">
        </div>
    @endif
    @if (!in_array(request()->route()->uri, $deniedRoutes))
        <x-cmn.search-bar :$routeIsIndex />
    @endif
</header>
