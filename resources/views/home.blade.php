<x-app-layout>
    <div class="px-6 py-8 mx-auto lg:px-0 max-w-7xl lg:py-12" >
        <x-page-hero class="h-40 lg:h-64" height="h-32 lg:h-56">
            <img id="page-title" src="/img/home_hero.png" class="h-32 lg:h-56" />
        </x-page-header>
        <div class="mx-auto sm:px-6 lg:px-8">
            <livewire:posts-overview class="flex flex-col space-x-4 overflow-hidden shadow" />
        </div>
    </div>
</x-app-layout>
