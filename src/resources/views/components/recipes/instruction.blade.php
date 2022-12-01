@php
    $instructions = [];
    $count = 0;

    if (!is_null(old('instruction_description'))) {
        foreach (old('instruction_description') as $name) {
            $ingredients['instruction_description'][] = $name;
            $count++;
        }
    }


@endphp

@if ($count)
    @for ($i = 0; $i < $count; $i++)
        <div class="row justify-content-between align-items-top mb-3 mb-md-0 ms-2 line">
            <div class="errors">
                @if (count($errors->get('instruction_description.*')))
                    @foreach ($errors->get('instruction_description.' . $i) as $error)
                        <div><x-cmn.input-error-msg>{{ $error }}</x-cmn.input-error-msg></div>
                    @endforeach
                @endif
            </div>
            <div class="col-12 col-md-11">
                <x-cmn.floating-textarea name="instruction_description[]" class="{{ $errors->get('instruction_description' . $i) ? 'is-invalid' : '' }}" countable maxlength="1000">Aprašymas</x-cmn.floating-textarea>
            </div>
            <div class="col-12 col-md-1 text-end">
                <x-cmn.btn outlined color="secondary" class="px-3 py-2 mb-3" data-btn="removeLine">x</x-cmn.btn>
            </div>
        </div>
    @endfor
@else
    <div class="row justify-content-between align-items-top mb-3 mb-md-0 ms-2 line">
        <div class="col-12 col-md-11">
            <x-cmn.floating-textarea name="instruction_description[]" countable maxlength="1000">Aprašymas</x-cmn.floating-textarea>
        </div>
        <div class="col-12 col-md-1 text-end">
            <x-cmn.btn outlined color="secondary" class="px-3 py-2 mb-3" data-btn="removeLine">x</x-cmn.btn>
        </div>
    </div>
@endif


