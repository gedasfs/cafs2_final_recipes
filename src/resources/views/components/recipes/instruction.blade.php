@php
    $instructions = [];
    $counts = [
        'instruction_description' => 0,
        'instruction_id' => 0,
    ];

    if (!is_null(old('instruction_description'))) {
        foreach (old('instruction_description') as $name) {
            $instructions['instruction_description'][] = $name;
            $counts['instruction_description']++;
        }
    }

    if (!is_null(old('instruction_id'))) {
        foreach (old('instruction_id') as $name) {
            $instructions['instruction_id'][] = $name;
            $count['instruction_id']++;
        }
    }

    $maxCount = max($counts);
@endphp

@if ($maxCount)
    @for ($i = 0; $i < $maxCount; $i++)
        <div class="row justify-content-between align-items-top mb-3 mb-md-0 ms-2 line">
            <div class="errors">
                @if (count($errors->get('instruction_description.*')))
                    @foreach ($errors->get('instruction_description.' . $i) as $error)
                        <div><x-cmn.input-error-msg>{{ $error }}</x-cmn.input-error-msg></div>
                    @endforeach
                @endif
            </div>
            <x-cmn.input-hidden name="instruction_id[]" value="{{ $instructions['instruction_id'][$i] ?? null }}" />
            <div class="col-12 col-md-11">
                <x-cmn.floating-textarea name="instruction_description[]" value="{{ $instructions['instruction_description'][$i] }}" class="{{ $errors->get('instruction_description' . $i) ? 'is-invalid' : '' }}" countable maxlength="1000">Aprašymas*</x-cmn.floating-textarea>
            </div>
            <div class="col-12 col-md-1 text-end">
                <x-cmn.btn outlined color="secondary" class="px-3 py-2 mb-3" data-btn="removeLine">x</x-cmn.btn>
            </div>
        </div>
    @endfor
@elseif (isset($recipe))
    @foreach ($recipe->instructions as $instruction)
        <div class="row justify-content-between align-items-top mb-3 mb-md-0 ms-2 line">
            <x-cmn.input-hidden name="instruction_id[]" value="{{ $instruction->id }}" />
            <div class="col-12 col-md-11">
                <x-cmn.floating-textarea name="instruction_description[]" value="{{ $instruction->description }}" countable maxlength="1000">Aprašymas*</x-cmn.floating-textarea>
            </div>
            <div class="col-12 col-md-1 text-end">
                <x-cmn.btn outlined color="secondary" class="px-3 py-2 mb-3" data-btn="removeLine">x</x-cmn.btn>
            </div>
        </div>
    @endforeach
@else
    <div class="row justify-content-between align-items-top mb-3 mb-md-0 ms-2 line">
        <div class="col-12 col-md-11">
            <x-cmn.floating-textarea name="instruction_description[]" countable maxlength="1000">Aprašymas*</x-cmn.floating-textarea>
        </div>
        <div class="col-12 col-md-1 text-end">
            <x-cmn.btn outlined color="secondary" class="px-3 py-2 mb-3" data-btn="removeLine">x</x-cmn.btn>
        </div>
    </div>
@endif


