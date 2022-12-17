@php
    $ingredients = [];
    $counts = [
        'ingredient_name' => 0,
        'ingredient_quantity' => 0,
        'ingredient_unit' => 0,
        'ingredient_id' => 0,
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

    if (!is_null(old('ingredient_id'))) {
        foreach (old('ingredient_id') as $unit) {
            $ingredients['ingredient_id'][] = $unit;
            $counts['ingredient_id']++;
        }
    }

    $maxCount = max($counts);
@endphp

@if ($maxCount)
    @for ($i = 0; $i < $maxCount; $i++)
        <div class="row justify-content-between align-items-center mb-3 mb-md-0 ms-2 line">
            <x-cmn.input-hidden name="ingredient_id[]" value="{{ $ingredients['ingredient_id'][$i] ?? null }}" />
            <div class="col-12 col-md-5">
                <x-cmn.floating-input
                    type="text"
                    name="ingredient_name[]"
                    value="{{ $ingredients['ingredient_name'][$i] }}"
                    error="{{ $errors->get('ingredient_name.' . $i)[0] ?? '' }}"
                >Ingredientas*</x-cmn.floating-input>
            </div>
            <div class="col-12 col-md-3">
                <x-cmn.floating-input
                    type="text" name="ingredient_quantity[]"
                    value="{{ $ingredients['ingredient_quantity'][$i] }}"
                    error="{{ $errors->get('ingredient_quantity.' . $i)[0] ?? '' }}"
                >Kiekis*</x-cmn.floating-input>
            </div>
            <div class="col-12 col-md-3">
                <x-cmn.floating-input
                    type="text" name="ingredient_unit[]"
                    value="{{ $ingredients['ingredient_unit'][$i] }}"
                    error="{{ $errors->get('ingredient_unit.' . $i)[0] ?? '' }}"
                >Vienetas*</x-cmn.floating-input>
            </div>
            <div class="col-12 col-md-1 text-end">
                <x-cmn.btn outlined color="secondary" class="px-3 py-2 mb-3" data-btn="removeLine">x</x-cmn.btn>
            </div>
        </div>
    @endfor
@elseif (isset($recipe))
        @foreach ($recipe->ingredients as $ingredient)
            <div class="row justify-content-between align-items-center mb-3 mb-md-0 ms-2 line">
                <x-cmn.input-hidden name="ingredient_id[]" value="{{ $ingredient->id }}" />
                <div class="col-12 col-md-5">
                    <x-cmn.floating-input type="text" name="ingredient_name[]" value="{{ $ingredient->name }}">Ingredientas*</x-cmn.floating-input>
                </div>
                <div class="col-12 col-md-3">
                    <x-cmn.floating-input type="text" name="ingredient_quantity[]" value="{{ $ingredient->quantity }}">Kiekis*</x-cmn.floating-input>
                </div>
                <div class="col-12 col-md-3">
                    <x-cmn.floating-input type="text" name="ingredient_unit[]" value="{{ $ingredient->unit }}">Vienetas*</x-cmn.floating-input>
                </div>
                <div class="col-12 col-md-1 text-end">
                    <x-cmn.btn outlined color="secondary" class="px-3 py-2 mb-3" data-btn="removeLine">x</x-cmn.btn>
                </div>
            </div>
        @endforeach
@else
    <div class="row justify-content-between align-items-center mb-3 mb-md-0 ms-2 line">
        <x-cmn.input-hidden name="ingredient_id[]" value="{{ $ingredient->id ?? null }}" />
        <div class="col-12 col-md-5">
            <x-cmn.floating-input type="text" name="ingredient_name[]">Ingredientas*</x-cmn.floating-input>
        </div>
        <div class="col-12 col-md-3">
            <x-cmn.floating-input type="text" name="ingredient_quantity[]">Kiekis*</x-cmn.floating-input>
        </div>
        <div class="col-12 col-md-3">
            <x-cmn.floating-input type="text" name="ingredient_unit[]">Vienetas*</x-cmn.floating-input>
        </div>
        <div class="col-12 col-md-1 text-end">
            <x-cmn.btn outlined color="secondary" class="px-3 py-2 mb-3" data-btn="removeLine">x</x-cmn.btn>
        </div>
    </div>
@endif
