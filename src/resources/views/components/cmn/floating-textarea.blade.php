@props(['id' => false, 'height' => '80px', 'maxlength' => '', 'countable' => false, 'value' => '', 'error' => '', 'required' => false])

<div class="form-floating mb-3">
    <textarea
        {{
            $attributes->merge([
                'class' => 'form-control position-relative',
                'id' => $id,
                'placeholder' => $slot,
                'style' => 'height:' . $height,
                'maxlength' => $maxlength,
            ])->class([
                'countable' => $countable,
                'is-invalid' => $error,
                'border border-secondary' => !$error && $required,
            ])
        }}
        @if ($error)
            data-bs-toggle="tooltip"
            data-bs-placement="top"
            data-bs-title="{{ $error }}"
        @endif
    >{{ $value }}</textarea>
    <label
        @if ($id)
            for="{{ $id }}"
        @endif
    >{{ $slot }}</label>
    @if ($countable && $maxlength)
        <span id="{{ $id }}CharCount" class="text-area-countable"><small>{{ $maxlength }}</small></span>
    @endif
</div>
