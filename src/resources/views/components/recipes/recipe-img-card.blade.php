@props(['src', 'alt', 'id', 'index' => 1])

<div class="card mb-3">
    <img src="{{ asset($src) }}" alt="{{ $alt }}" class="rounded">
    <div class="card-body">
        <input class="form-check-input me-3" type="checkbox" id="image{{ $index }}" name="delete_imageable_id[]" value="{{ $id }}">
        <label class="form-check-label stretched-link" for="image{{ $index }}">Ištrinti?</label>
    </div>
</div>
