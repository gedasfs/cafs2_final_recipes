<form method="POST" action="{{ route('logout') }}">
    @csrf
    <x-cmn.btn type="submit">Atsijungti</x-cmn.btn>
</form>
