<div class="row justify-content-between align-items-center mb-3 mb-md-0 ms-2 line">
    <div class="col-12 col-md-5">
        @error('ingredient_name')
            <x-cmn.input-error-msg>{{ $message }}</x-cmn.input-error-msg>
        @enderror
        <x-cmn.floating-input type="text" name="ingredient_groups[][name]" class="{{ $errors->first('ingredient_name') ? 'is-invalid' : '' }}">Ingredientas</x-cmn.floating-input>
    </div>
    <div class="col-12 col-md-3">
        @error('ingredient_quantity')
            <x-cmn.input-error-msg>{{ $message }}</x-cmn.input-error-msg>
        @enderror
        <x-cmn.floating-input type="text" name="ingredient_groups[][quantity]" class="{{ $errors->first('ingredient_quantity') ? 'is-invalid' : '' }}">Kiekis</x-cmn.floating-input>
    </div>
    <div class="col-12 col-md-3">
        @error('ingredient_unit')
            <x-cmn.input-error-msg>{{ $message }}</x-cmn.input-error-msg>
        @enderror
        <x-cmn.floating-input type="text" name="ingredient_groups[][unit]" class="{{ $errors->first('ingredient_unit') ? 'is-invalid' : '' }}">Vienetas</x-cmn.floating-input>
    </div>
    <div class="col-12 col-md-1 text-end">
        <x-cmn.btn outlined color="secondary" class="px-3 py-2 mb-3" data-btn="removeLine">x</x-cmn.btn>
    </div>
</div>

