<li @class(['nav-item', 'align-self-center', 'ms-0', 'my-2', 'my-lg-0'])>
    <x-cmn.link-btn @class(['px-3', 'py-2']) :attributes="$attributes">
        {{ $slot }}
    </x-cmn.link-btn>
</li>
