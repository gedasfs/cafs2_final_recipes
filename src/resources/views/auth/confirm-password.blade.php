<x-layouts.main>

        <x-cmn.card>
            <x-slot:header class="py-3 text-center">Patvirtinimas</x-slot:header>

            <p>Prieš tęsiant, įveskite slaptažodį.</p>

            <div class="m-2">
                <form method="POST" action="{{ route('password.confirm') }}">
                    @csrf

                    @error('password')
                        <x-cmn.input-error-msg>{{ $message }}</x-cmn.input-error-msg>
                    @enderror
                    <x-cmn.floating-input size="50" name="password" type="password" id="password" class="{{ $errors->first('password') ? 'is-invalid' : '' }}">Slapažodis</x-cmn.floating-input>

                    <x-cmn.btn type="submit">Patvirtinti</x-cmn.btn>
                </form>
            </div>
        </x-cmn.card>

</x-layouts.main>

