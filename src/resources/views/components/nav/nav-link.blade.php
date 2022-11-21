@props(['isDropdown' => false])

@if (!$isDropdown)
<li><hr class="divider m-0"></li>
@endif
<li @class(['nav-item', 'dropdown' => $isDropdown])>
    <x-cmn.link class="nav-link" :attributes="$attributes">{{ $slot }}</x-cmn.link>
    @if ($isDropdown)
        {{ $dropdownMenu }}
    @endif
</li>
