<x-layouts.main>
    <div class="d-flex justify-content-center">
        <x-auth.auth-card>
            <x-slot:header class="py-3 text-center">Patvirtinimas</x-slot:header>

            <p>Prieš tęsiant, įveskite slaptažodį.</p>

            <div class="m-2">
                <form method="POST" action="{{ route('password.confirm') }}">
                    @csrf

                    <x-cmn.floating-input size="50" name="password" type="password" id="password">Slapažodis</x-cmn.floating-input>

                    <x-cmn.link class="order-sm-0">Patvirtinti</x-cmn.link>
                </form>
            </div>
        </x-auth.auth-card>
    </div>
</x-layouts.main>

