<x-layouts.main>
    <div class="d-flex justify-content-center">
        <x-auth.auth-card>
            <x-slot:header class="py-3 text-center">Slaptažodžio priminimas</x-slot:header>

            <p class="card-text">Įveskite registracijos metu naudotą el. paštą. Šiuo el. paštu išsiųsime slapažodžio atstatymo nuorodą.</p>

            <x-auth.auth-session-status :status="session('status')" />

            <div class="m-2">
                <form method="POST" action="{{ route('password.email') }}">
                    @csrf

                    <x-cmn.floating-input size="50" name="email" type="email" id="email">El. paštas</x-cmn.floating-input>

                    <div class="text-end mt-3">
                        <x-cmn.link-btn class="px-3">Siųsti nuorodą</x-cmn.link-btn>
                    </div>

                </form>
            </div>
        </x-auth.auth-card>
    </div>
</x-layouts.main>

