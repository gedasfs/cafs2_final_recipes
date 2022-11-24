<x-layouts.main>
    <x-auth.auth-card>
        <x-slot:header class="py-3 text-center">Registracija</x-slot:header>

        <div class="m-2">
            <form method="POST" action="{{ route('register') }}">
                @csrf

                @error('firstname')
                    <x-cmn.input-error-msg>{{ $message }}</x-cmn.input-error-msg>
                @enderror
                <x-cmn.floating-input size="50" name="firstname" type="text" id="firstname" :value="old('firstname')" class="{{ $errors->first('firstname') ? 'is-invalid' : '' }}">Vardas</x-cmn.floating-input>
                @error('lastname')
                    <x-cmn.input-error-msg>{{ $message }}</x-cmn.input-error-msg>
                @enderror
                <x-cmn.floating-input size="50" name="lastname" type="text" id="lastname" :value="old('lastname')" class="{{ $errors->first('lastname') ? 'is-invalid' : '' }}">Pavardė</x-cmn.floating-input>

                @error('email')
                    <x-cmn.input-error-msg>{{ $message }}</x-cmn.input-error-msg>
                @enderror
                <x-cmn.floating-input size="50" name="email" type="email" id="email" :value="old('email')" class="{{ $errors->first('email') ? 'is-invalid' : '' }}">El. Paštas</x-cmn.floating-input>

                @error('password')
                    <x-cmn.input-error-msg>{{ $message }}</x-cmn.input-error-msg>
                @enderror
                <x-cmn.floating-input size="50" name="password" type="password" id="password" class="{{ $errors->first('password') ? 'is-invalid' : '' }}">Slaptažodis</x-cmn.floating-input>

                @error('password_confirmation')
                    <x-cmn.input-error-msg>{{ $message }}</x-cmn.input-error-msg>
                @enderror
                <x-cmn.floating-input size="50" name="password_confirmation" type="password" id="password_confirmation" class="{{ $errors->first('password_confirmation') ? 'is-invalid' : '' }}">Pakartokite slaptažodį</x-cmn.floating-input>

                <div class="text-end mt-3">
                    <x-cmn.btn type="submit" class="px-3">Registruotis</x-cmn.btn>
                </div>

                <div class="d-flex flex-column flex-sm-row align-items-end justify-content-between mt-4 gap-2">
                    <x-cmn.link href="{{ route('login') }}">Prisijungti?</x-cmn.link>
                </div>
            </form>
        </div>
    </x-auth.auth-card>
</x-layouts.main>

