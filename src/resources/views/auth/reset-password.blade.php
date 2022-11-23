<x-layouts.main>
    <div class="d-flex justify-content-center">
        <x-auth.auth-card>
            <x-slot:header class="py-3 text-center">Naujo slaptažodžio nustatymas</x-slot:header>

            <div class="m-2">
                <form method="POST" action=" {{ route('password.update') }}">
                    @csrf

                    {{-- Password Reset Token --}}
                    <input type="hidden" name="token" value="{{ $request->route('token') }}">

                    <x-cmn.floating-input size="50" name="email" type="email" id="email" :value="old('email', $request->email)">El. paštas</x-cmn.floating-input>
                    <x-cmn.floating-input size="50" name="password" type="password" id="password">Slaptažodis</x-cmn.floating-input>
                    <x-cmn.floating-input size="50" name="password_confirmation" type="password" id="passwordConfirmation">Pakartokie slaptažodį</x-cmn.floating-input>
                    <div class="text-end mt-3">
                        <x-cmn.btn type="submit" class="px-3">Keisti slaptažodį</x-cmn.btn>
                    </div>
                </form>
            </div>
        </x-auth.auth-card>
    </div>
</x-layouts.main>

