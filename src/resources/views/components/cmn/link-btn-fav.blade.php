@props(['filled' => false])

<x-cmn.link-btn :attributes="$attributes" outlined color="danger" class="px-2 py-1 rounded-circle" title="Pridėti prie patikusių">
    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="18" class="bi bi-heart-fill btn-fav" viewBox="0 0 16 16">
        <path fill-rule="evenodd" d="M8 1.314C12.438-3.248 23.534 4.735 8 15-7.534 4.736 3.562-3.248 8 1.314z"/>
    </svg>
</x-cmn.link-btn>

{{--
    regular:    link -> color: light, outlined; svg class -> btn-fav
    favorited:  link -> color: light; svg class -> btn-fav-filled
--}}

{{--
    regular:    link -> color: danger, outlined; svg class -> btn-fav
    favorited:  link -> color: danger; svg class -> btn-fav
--}}
