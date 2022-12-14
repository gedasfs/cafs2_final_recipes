@props(['id' => false, 'type' => 'text', 'error' => '', 'required' => false])

<div class="form-floating mb-3">
    <input
        {{
            $attributes->merge([
                'class' => 'form-control',
                'type' => $type,
                'id' => $id,
                'placeholder' => $slot,
            ])->class([
                'is-invalid' => $error,
                'border border-secondary' => !$error && $required
            ])
        }}
        @if ($error)
            data-bs-toggle="tooltip"
            data-bs-placement="top"
            data-bs-title="{{ $error }}"
        @endif
    >
    <label
        @if ($id)
            for="{{ $id }}"
        @endif
    >{{ $slot }}</label>
</div>
