<div class="row justify-content-between align-items-baseline group">
    <div class="lines-in-group">
        @error('ingredient_groups_name')
            <x-cmn.input-error-msg>{{ $message }}</x-cmn.input-error-msg>
        @enderror
        <x-cmn.floating-input type="text" name="ingredient_groups_name[]" class="{{ $errors->first('ingredient_groups_name') ? 'is-invalid' : '' }}">Ingredientų grupės pavad. (pvz., padažui)</x-cmn.floating-input>
        <x-recipes.ingredient />
    </div>
    {{-- <input type="hidden" name="ingredients_count_in_line[]" value="1"> --}}
    <div class="my-2">
        <x-cmn.btn outlined data-btn="addLine">Pridėti ingredientą</x-cmn.btn>
    </div>
    <hr class="border border-success" />
</div>

