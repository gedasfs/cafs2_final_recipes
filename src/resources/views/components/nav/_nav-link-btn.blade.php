<li @class(['nav-item', 'align-self-center', 'ms-0', 'my-2', 'ms-lg-4', 'my-lg-0'])>
    <x-cmn.link-btn @class(['px-5']) :attributes="$attributes">
        {{ $slot }}
    </x-cmn.link-btn>
</li>