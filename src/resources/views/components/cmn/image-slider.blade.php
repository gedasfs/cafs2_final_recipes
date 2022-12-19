@props(['id', 'images'])

@php
    $imageCount = count($images);
@endphp

@if ($imageCount)
    <div id="{{ $id }}" class="carousel slide" data-bs-ride="carousel">
        <div class="carousel-inner">
            @foreach ($images as $image)
            <div
                @if ($loop->index == 0)
                    class="carousel-item active"
                @else
                    class="carousel-item"
                @endif
            >
                <img src="{{ asset($image->path) }}" class="d-block w-100 card-img rounded" alt="{{ $image->alt_text }}">
            </div>
            @endforeach
        </div>
        @if ($imageCount > 1)
            <button class="carousel-control-prev" type="button" data-bs-target="#{{ $id }}" data-bs-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Previous</span>
            </button>
            <button class="carousel-control-next" type="button" data-bs-target="#{{ $id }}" data-bs-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Next</span>
            </button>
        @endif
    </div>
@endif

