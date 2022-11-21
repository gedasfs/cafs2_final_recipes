<nav class="navbar navbar-expand-lg bg-light">
    <div class="container-fluid justify-content-end">
        <div class="navbar-brand ms-2 ms-lg-5">
            <img src={{ asset('images/navbar/navbar-brand.png') }} alt="navbar-brand">
        </div>

    {{-- Should not be displayed when user is logged OUT --}}
        <x-nav.user class="d-lg-none">User</x-nav.user>
    {{-- ./ --}}

        <button class="navbar-toggler ms-auto border-0" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse justify-content-between text-center fs-5" id="navbarNav">
            <ul class="navbar-nav">
                <x-nav.nav-link href="{{ route('index') }}">Pradžia</x-nav.nav-link>
                <x-nav.nav-link href="{{ route('recipes.index') }}">Receptai</x-nav.nav-link>
                <x-nav.nav-link href="{{ route('categories.index') }}">Kategorijos</x-nav.nav-link>
                <x-nav.nav-link href="{{ route('recipes.create') }}" class="ms-lg-3">Kurti receptą</x-nav.nav-link>
            </ul>

            <ul class="navbar-nav profile-section me-lg-5">
                <li><hr class="divider m-0"></li>
        {{-- Should not be displayed when user is logged OUT --}}
                <li class="nav-item align-self-center d-none d-lg-inline-block fs-6"><x-nav.user>User</x-nav.user></li>
                    <x-nav.nav-link isDropdown class="d-flex justify-content-center align-items-center" href="#profile" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                        <span class="d-inline-block d-lg-none">Mano profilis</span>
                        <svg xmlns="http://www.w3.org/2000/svg" width="35" height="35" fill="currentColor" class="bi bi-person-circle ms-4" viewBox="0 0 16 16">
                            <path d="M11 6a3 3 0 1 1-6 0 3 3 0 0 1 6 0z"/>
                            <path fill-rule="evenodd" d="M0 8a8 8 0 1 1 16 0A8 8 0 0 1 0 8zm8-7a7 7 0 0 0-5.468 11.37C3.242 11.226 4.805 10 8 10s4.757 1.225 5.468 2.37A7 7 0 0 0 8 1z"/>
                        </svg>
                        <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-chevron-down ms-1" viewBox="0 0 16 16">
                            <path fill-rule="evenodd" d="M1.646 4.646a.5.5 0 0 1 .708 0L8 10.293l5.646-5.647a.5.5 0 0 1 .708.708l-6 6a.5.5 0 0 1-.708 0l-6-6a.5.5 0 0 1 0-.708z"/>
                        </svg>
                        <x-slot:dropdownMenu>
                            <ul class="dropdown-menu text-center">
                                <li><x-cmn.link class="dropdown-item">Mano Receptai</x-cmn.link></li>
                                <li><hr class="dropdown-divider"></li>
                                <li><x-cmn.link class="dropdown-item">Nustatymai</x-cmn.link></li>
                                <li><hr class="dropdown-divider"></li>
                                <li><x-cmn.link-btn>Atsijungti</x-cmn.link-btn></li>
                            </ul>
                        </x-slot:dropdownMenu>
                    </x-nav.nav-link>
                </li>
        {{-- ./ --}}

        {{-- Should not be displayed when user is logged IN --}}
                {{-- <li class="nav-item align-self-center ms-0 my-2 ms-lg-4 my-lg-0">
                    <a class="btn btn-primary rounded-5 px-5 px-lg-4 py-2 btn-inverted" href="#">Log in/Sign up</a>
                </li> --}}
                {{-- <x-nav.nav-link-btn class="fs-5">
                    Prisijungti
                </x-nav.nav-link-btn> --}}
        {{-- ./ --}}

            </ul>
        </div>
    </div>
</nav>
