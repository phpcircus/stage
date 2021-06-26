<div x-data class="fixed top-0 w-full h-20 shadow-md bg-gradient-to-r from-skin-stop-crust via-skin-stop-mantle to-skin-stop-core">
    <header class="flex items-center h-full mx-auto lg:max-w-7xl">
        <div class="flex items-center justify-between w-full h-full">
            <div>
                <a href="{{ route('home') }}" class="text-2xl font-blade text-skin-loud-extreme">PHPSTAGE</a>
            </div>

            <!-- Main Navigation -->
            <livewire:nav-menu-main />

            <!-- Settings Dropdown -->
            <div class="flex items-center">
                <div x-cloak class="mr-4 cursor-pointer" x-on:click="$store.stage.toggleTheme()">
                    <x-heroicon-o-moon x-cloak x-show="$store.stage.darkMode" class="w-8 text-white"></x-heroicon-o-moon>
                    <x-heroicon-o-sun x-cloak x-show="! $store.stage.darkMode" class="w-8 text-gray-900"></x-heroicon-o-sun>
                </div>
                <x-nav-settings-dropdown />
            </div>
        </div>
    </header>
</div>
