<x-layouts.main>
    <x-cmn.card>
        <x-slot:header class="py-3 text-center">Naujo slaptažodžio nustatymas</x-slot:header>

        <div class="m-2">
            <form method="POST" action=" {{ route('password.update') }}" autocomplete="off">
                @csrf

                {{-- Password Reset Token --}}
                <input type="hidden" name="token" value="{{ $request->route('token') }}">

                @error('email')
                    <x-cmn.input-error-msg>{{ $message }}</x-cmn.input-error-msg>
                @enderror
                <x-cmn.floating-input size="50" name="email" type="email" id="email" :value="old('email', $request->email)" class="{{ $errors->first('email') ? 'is-invalid' : '' }}">El. paštas</x-cmn.floating-input>

                @error('password')
                    <x-cmn.input-error-msg>{{ $message }}</x-cmn.input-error-msg>
                @enderror
                <x-cmn.floating-input size="50" name="password" type="password" id="password" class="{{ $errors->first('password') ? 'is-invalid' : '' }}">Slaptažodis</x-cmn.floating-input>

                @error('password_confirmation')
                    <x-cmn.input-error-msg>{{ $message }}</x-cmn.input-error-msg>
                @enderror
                <x-cmn.floating-input size="50" name="password_confirmation" type="password" id="passwordConfirmation" class="{{ $errors->first('password_confirmation') ? 'is-invalid' : '' }}">Pakartokie slaptažodį</x-cmn.floating-input>

                <div class="text-end mt-3">
                    <x-cmn.btn type="submit" class="px-3">Keisti slaptažodį</x-cmn.btn>
                </div>
            </form>
        </div>
    </x-cmn.card>
</x-layouts.main>

