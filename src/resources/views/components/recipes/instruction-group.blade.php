<div class="row justify-content-between align-items-baseline group">
    <div class="lines-in-group">
        @error('instruction_groups')
            <x-cmn.input-error-msg>{{ $message }}</x-cmn.input-error-msg>
        @enderror
        <x-cmn.floating-input type="text" name="instruction_groups[]" class="{{ $errors->first('instruction_groups') ? 'is-invalid' : '' }}">Gaminimo grupės pavad. (pvz., padažui)</x-cmn.floating-input>

        <x-recipes.instruction />
        <x-recipes.instruction />
    </div>
    <div class="my-2">
        <x-cmn.btn outlined data-btn="addLine">Pridėti sekantį žingsnį</x-cmn.btn>
    </div>
    <hr class="border border-success" />
</div>
