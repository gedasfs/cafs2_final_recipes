@props(['id' => false, 'name', 'error' => '', 'required' => false])

<div class="mb-3">
    <label @class(['form-label'])
        @if ($id)
            for="{{ $id }}"
        @endif
    >{{ $slot }}</label>
    <input
        {{
            $attributes->merge([
                'class' => 'form-control',
                'type' => 'file',
                'id' => $id,
                'name' => $name,
                // 'placeholder' => $slot,
            ])->class([
                'is-invalid' => $error,
                'border border-secondary' => !$error && $required,
            ])
        }}
        @if ($error)
            data-bs-toggle="tooltip"
            data-bs-placement="top"
            data-bs-title="{{ $error }}"
        @endif
    >
</div>
