@php
    $ingredients = [];
    $counts = [
        'ingredient_name' => 0,
        'ingredient_quantity' => 0,
        'ingredient_unit' => 0,
    ];

    if (!is_null(old('ingredient_name'))) {
        foreach (old('ingredient_name') as $name) {
            $ingredients['ingredient_name'][] = $name;
            $counts['ingredient_name']++;
        }
    }

    if (!is_null(old('ingredient_quantity'))) {
        foreach (old('ingredient_quantity') as $quantity) {
            $ingredients['ingredient_quantity'][] = $quantity;
            $counts['ingredient_quantity']++;
        }
    }

    if (!is_null(old('ingredient_unit'))) {
        foreach (old('ingredient_unit') as $unit) {
            $ingredients['ingredient_unit'][] = $unit;
            $counts['ingredient_unit']++;
        }
    }

    $maxCount = max($counts);
@endphp

@if ($maxCount)
    @for ($i = 0; $i < $maxCount; $i++)
        <div class="row justify-content-between align-items-center mb-3 mb-md-0 ms-2 line">
            <div class="errors">
                @if (count($errors->get('ingredient_name.*')))
                    @foreach ($errors->get('ingredient_name.' . $i) as $error)
                        <div><x-cmn.input-error-msg>{{ $error }}</x-cmn.input-error-msg></div>
                    @endforeach
                @endif
                @if (count($errors->get('ingredient_quantity.*')))
                    @foreach ($errors->get('ingredient_quantity.' . $i) as $error)
                        <div><x-cmn.input-error-msg>{{ $error }}</x-cmn.input-error-msg></div>
                    @endforeach
                @endif
                @if (count($errors->get('ingredient_unit.*')))
                    @foreach ($errors->get('ingredient_unit.' . $i) as $error)
                        <div><x-cmn.input-error-msg>{{ $error }}</x-cmn.input-error-msg></div>
                    @endforeach
                @endif
            </div>
            <div class="col-12 col-md-5">
                <x-cmn.floating-input type="text" name="ingredient_name[]" value="{{ $ingredients['ingredient_name'][$i] }}" class="{{ $errors->get('ingredient_name.' . $i)?'is-invalid':'' }}">Ingredientas</x-cmn.floating-input>
            </div>
            <div class="col-12 col-md-3">
                <x-cmn.floating-input type="text" name="ingredient_quantity[]" value="{{ $ingredients['ingredient_quantity'][$i] }}" class="{{ $errors->get('ingredient_quantity.' . $i)?'is-invalid':'' }}">Kiekis</x-cmn.floating-input>
            </div>
            <div class="col-12 col-md-3">
                <x-cmn.floating-input type="text" name="ingredient_unit[]" value="{{ $ingredients['ingredient_unit'][$i] }}" class="{{ $errors->get('ingredient_unit.' . $i)?'is-invalid':'' }}">Vienetas</x-cmn.floating-input>
            </div>
            <div class="col-12 col-md-1 text-end">
                <x-cmn.btn outlined color="secondary" class="px-3 py-2 mb-3" data-btn="removeLine">x</x-cmn.btn>
            </div>
        </div>
    @endfor
@else
    <div class="row justify-content-between align-items-center mb-3 mb-md-0 ms-2 line">
        <div class="col-12 col-md-5">
            <x-cmn.floating-input type="text" name="ingredient_name[]">Ingredientas</x-cmn.floating-input>
        </div>
        <div class="col-12 col-md-3">
            <x-cmn.floating-input type="text" name="ingredient_quantity[]">Kiekis</x-cmn.floating-input>
        </div>
        <div class="col-12 col-md-3">
            <x-cmn.floating-input type="text" name="ingredient_unit[]">Vienetas</x-cmn.floating-input>
        </div>
        <div class="col-12 col-md-1 text-end">
            <x-cmn.btn outlined color="secondary" class="px-3 py-2 mb-3" data-btn="removeLine">x</x-cmn.btn>
        </div>
    </div>
@endif
