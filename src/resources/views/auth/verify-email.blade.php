<x-layouts.main>
    <x-cmn.card>
        <x-slot:header class="py-3 text-center">El. pašto patvirtinimas</x-slot:header>

        <p class="card-text">Ačiū, kad užsiregistravote. Prieš tęsiant, patvirtinkite el. pašto adresą.</p>
        <p class="card-text">Jūsų nurodytu el. paštu išsiuntėme patvirtinimo nuorodą. Jei nuorodos negavote, pakartokite siuntimą žemiau.</p>

        @if (session('status') == 'verification-link-sent')
            <p class="card-text text-success">
                El. pašto patvirtinimo nuoroda išsiųsta.
            </p>
        @endif

        <div class="m-2">
            <form method="POST" action="{{ route('verification.send') }}">
                @csrf

                <div class="text-end mt-3">
                    <x-cmn.btn type="submit" class="px-3">Siųsti nuorodą iš naujo</x-cmn.btn>
                </div>

            </form>
        </div>
    </x-cmn.card>
</x-layouts.main>

