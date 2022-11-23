<x-layouts.main>
    <div class="d-flex justify-content-center">
        <x-auth.auth-card>
            <x-slot:header class="py-3 text-center">Registracija</x-slot:header>

            <div class="m-2">
                <form method="POST" action="">
                    @csrf

                    <x-cmn.floating-input size="50" name="firstname" type="text" id="firstname">Vardas</x-cmn.floating-input>
                    <x-cmn.floating-input size="50" name="lastname" type="text" id="lastname">Pavardė</x-cmn.floating-input>
                    <x-cmn.floating-input size="50" name="email" type="email" id="email">El. Paštas</x-cmn.floating-input>
                    <x-cmn.floating-input size="50" name="password" type="password" id="password">Slaptažodis</x-cmn.floating-input>
                    <x-cmn.floating-input size="50" name="password_confirmation" type="password" id="password_confirmation">Pakartokite slaptažodį</x-cmn.floating-input>
                    <div class="text-end mt-3">
                        <x-cmn.link-btn class="px-3">Registruotis</x-cmn.link-btn>
                    </div>

                    <div class="d-flex flex-column flex-sm-row align-items-end justify-content-between mt-4 gap-2">
                        <x-cmn.link>Prisijungti?</x-cmn.link>
                    </div>
                </form>
            </div>
        </x-auth.auth-card>
    </div>
</x-layouts.main>

