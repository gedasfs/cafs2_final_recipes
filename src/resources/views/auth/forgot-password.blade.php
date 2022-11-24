<x-layouts.main>
    <x-auth.auth-card>
        <x-slot:header class="py-3 text-center">Slaptažodžio priminimas</x-slot:header>

        <p class="card-text">Įveskite registracijos metu naudotą el. paštą. Šiuo el. paštu išsiųsime slaptažodžio atstatymo nuorodą.</p>

        <x-auth.auth-session-status :status="session('status')" />

        <div class="m-2">
            <form method="POST" action="{{ route('password.email') }}">
                @csrf

                @error('email')
                    <x-cmn.input-error-msg>{{ $message }}</x-cmn.input-error-msg>
                @enderror
                <x-cmn.floating-input size="50" name="email" type="email" id="email" :value="old('email')" class="{{ $errors->first('email') ? 'is-invalid' : '' }}">El. paštas</x-cmn.floating-input>

                <div class="text-end mt-3">
                    <x-cmn.btn type="submit" class="px-3">Siųsti nuorodą</x-cmn.btn>
                </div>

            </form>
        </div>
    </x-auth.auth-card>
</x-layouts.main>

