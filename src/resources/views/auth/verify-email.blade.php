<x-layouts.main>
    <div class="d-flex justify-content-center">
        <x-auth.auth-card>
            <x-slot:header class="py-3 text-center">El. pašto patvirtinimas</x-slot:header>

            <p class="card-text">Ačiū, kad užsiregistravote. Prieš tęsiant, patvirtinkite el. pašto adresą.</p>
            <p class="card-text">Jūsų nurodytu el. paštu išsiuntėme patvirtinimo nuorodą. Jei nuorodos negavote, pakartokite siuntimą žemiau.</p>

            @if (session('status') == 'verification-link-sent')
                <p class="card-text text-success">
                    Jūsų el. paštu jau buvo išsiųsta el. pašto patvirtinimo nuoroda.
                </p>
            @endif

            <div class="m-2">
                <form method="POST" action="{{ route('verification.send') }}">
                    @csrf

                    <div class="text-end mt-3">
                        <x-cmn.link-btn class="px-3">Siųsti nuorodą iš naujo</x-cmn.link-btn>
                    </div>

                </form>
            </div>
        </x-auth.auth-card>
    </div>
</x-layouts.main>

