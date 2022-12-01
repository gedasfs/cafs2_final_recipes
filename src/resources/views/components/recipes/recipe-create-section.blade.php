@props(['id', 'noRulerAfter' => false, 'section' => false])

<div id="{{ $id }}" @class(['mx-md-4', 'section' => $section])>
    <h3 class="text-primary mb-3"><i>{{ $title }}</i></h3>
    {{ $slot }}
</div>
@unless ($noRulerAfter)
    <hr class="border border-4 border-primary rounded my-4">
@endunless
