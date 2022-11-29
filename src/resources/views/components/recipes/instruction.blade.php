<div class="row justify-content-between align-items-top mb-3 mb-md-0 ms-2 line">
    <div class="col-12 col-md-11">
        @error('instruction_groups')
            <x-cmn.input-error-msg>{{ $message }}</x-cmn.input-error-msg>
        @enderror
        <x-cmn.floating-textarea name="instruction_groups[][description]" class="{{ $errors->first('instruction_groups') ? 'is-invalid' : '' }}" countable maxlength="1000">Aprašymas</x-cmn.floating-textarea>
    </div>
    <div class="col-12 col-md-1 text-end">
        <x-cmn.btn outlined color="secondary" class="px-3 py-2 mb-3" data-btn="removeLine">x</x-cmn.btn>
    </div>
</div>
