<header id="up" x-data="{ animate: false }" x-init="setTimeout(function(){ animate = true; }, 250)"
        {{ $attributes->merge(['class' => 'mb-8 lg:mb-0 relative mx-auto bg-fixed bg-center bg-no-repeat bg-cover md:px-12 xl:px-0'])}}
>
    <div class="flex justify-start">
        <div x-cloak x-show="animate" x-transition:enter="transition ease-out duration-750" x-transition:enter-start="opacity-0 transform scale-50" x-transition:enter-end="opacity-100 transform scale-100" x-transition:leave="transition ease-in duration-750" x-transition:leave-start="opacity-100 transform scale-100" x-transition:leave-end="opacity-0 transform scale-50">
            {{ $slot }}
        </div>
    </div>
</header>