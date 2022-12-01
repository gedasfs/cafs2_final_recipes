@props(['orderByValues'])

<div class="d-flex justify-content-end">
    <form method="GET">
        <div class="d-flex align-items-center">
            <div>
                <x-cmn.floating-select name="order_by" id="orderBy">
                    Rūšiavimas
                    <x-slot:firstSelectName>Pasirinkite rūšiavimą...</x-slot:firstSelectName>
                    <x-slot:options>
                        @foreach ($orderByValues as $value => $name)
                            <option value="{{ $value }}" @selected(request('order_by') == $value)>{{ $name }}</option>
                        @endforeach
                    </x-slot:options>
                </x-cmn.floating-select>
            </div>
            <div class="mb-3 ms-3">
                <x-cmn.btn type="submit">Rūšiuoti</x-cmn.btn>
            </div>
        </div>

    </form>
</div>
