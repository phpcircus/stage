<x-app-layout>
    <div x-data class="px-6 py-8 mx-auto md:px-0 max-w-7xl md:py-12" >
        <x-page-hero class="h-40 md:h-64" height="h-32 md:h-56">
            <img x-cloak x-show="! $store.stage.darkMode" id="page-title" src="/img/home_hero_new.png" class="h-32 md:h-56" />
            <img x-cloak x-show="$store.stage.darkMode" id="page-title" src="/img/home_hero_new_dark_mode.png" class="h-32 md:h-56" />
        </x-page-header>
        <div class="mx-auto sm:px-6 lg:px-8">
            <livewire:posts-overview class="flex flex-col space-x-4 overflow-hidden shadow" />
        </div>
    </div>
</x-app-layout>
