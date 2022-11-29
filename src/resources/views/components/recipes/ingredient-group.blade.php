<div class="row justify-content-between align-items-baseline group">
    <div class="lines-in-group">
        @error('ingredient_groups')
            <x-cmn.input-error-msg>{{ $message }}</x-cmn.input-error-msg>
        @enderror
        <x-cmn.floating-input type="text" name="ingredient_groups[]" class="{{ $errors->first('ingredient_groups') ? 'is-invalid' : '' }}">Ingredientų grupės pavad. (pvz., padažui)</x-cmn.floating-input>

        <x-recipes.ingredient />
        <x-recipes.ingredient />
    </div>
    <div class="my-2">
        <x-cmn.btn outlined data-btn="addLine">Pridėti ingredientą</x-cmn.btn>
    </div>
    <hr class="border border-success" />
</div>

