<x-layouts.main>
    <div class="d-flex justify-content-center">
        <x-auth.auth-card>
            <x-slot:header class="py-3 text-center">Prisijungimas</x-slot:header>

            <x-auth.auth-session-status :status="session('status')" />

            <div class="m-2">
                <form method="POST" action="{{ route('login') }}">
                    @csrf

                    <x-cmn.floating-input size="50" name="email" type="email" id="email">El. paštas</x-cmn.floating-input>
                    <x-cmn.floating-input size="50" name="password" type="password" id="password">Slaptažodis</x-cmn.floating-input>
                    <x-cmn.checkbox id="rememberMe" name="remember">Prisiminti mane</x-cmn.checkbox>
                    <div class="text-end mt-3">
                        <x-cmn.link-btn class="px-3">Prisijungti</x-cmn.link-btn>
                    </div>

                    <div class="d-flex flex-column flex-sm-row align-items-end justify-content-between mt-4 gap-2">
                        @if (Route::has('password.request'))
                            <x-cmn.link class="order-sm-1" href="{{ route('auth.password.request') }}">Priminti slaptažodį?</x-cmn.link>
                        @endif
                        <x-cmn.link class="order-sm-1">Registruotis?</x-cmn.link>
                    </div>
                </form>
            </div>
        </x-auth.auth-card>
    </div>
</x-layouts.main>

