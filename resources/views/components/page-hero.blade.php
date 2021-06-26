@props(['height' => 'h-12'])

<header id="up" x-data="{ animate: false, showPlaceholder: true }" x-init="
        setTimeout( () => {
            showPlaceholder = false;
            animate = true;
        }, 250);
    "
    {{ $attributes->merge(['class' => 'mb-8 mx-auto md:mb-16 lg:mb-20 xl:mb-24'])}}
>
    <div x-show="showPlaceholder" class="{{ $height }}">&nbsp;</div>
    <div x-cloak x-show="animate"
        x-transition:enter="transition ease-out duration-750"
        x-transition:enter-start="opacity-0 transform scale-50"
        x-transition:enter-end="opacity-100 transform scale-100"
        x-transition:leave="transition ease-in duration-750"
        x-transition:leave-start="opacity-100 transform scale-100"
        x-transition:leave-end="opacity-0 transform scale-50"
        class="-rotate-6">
        {{ $slot }}
    </div>
</header>