@props(['id' => false, 'name', 'error' => ''])

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
                'is-invalid' => $error
            ])
        }}
        @if ($error)
            data-bs-toggle="tooltip"
            data-bs-placement="top"
            data-bs-title="{{ $error }}"
        @endif
    >
</div>
