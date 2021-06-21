<div x-data class="fixed top-0 z-50 w-full bg-white shadow-md dark:bg-gray-800">
    <header class="flex items-center mx-auto font-semibold text-gray-900 lg:max-w-7xl">
        <div class="relative hidden w-full lg:py-4 lg:px-6 xl:px-0 lg:flex lg:mb-4 lg:justify-between">
            <a href="{{ route('home') }}">
                <img x-cloak x-show="! $store.stage.darkMode" src="/img/phpstage.png" class="h-16 mb-8 mr-0 lg:mb-0 lg:mr-24" />
                <img x-cloak x-show="$store.stage.darkMode" src="/img/phpstage_white.png" class="h-16 mb-8 mr-0 lg:mb-0 lg:mr-24" />
            </a>

            <!-- Main Navigation -->
            <livewire:navigation-main />

            <!-- Settings Dropdown -->
            <div class="flex items-center ml-auto">
                <div x-cloak class="mr-4 cursor-pointer" x-on:click="$store.stage.toggleTheme()">
                    <x-heroicon-o-moon x-cloak x-show="$store.stage.darkMode" class="w-8 text-white"></x-heroicon-o-moon>
                    <x-heroicon-o-sun x-cloak x-show="! $store.stage.darkMode" class="w-8 text-gray-900"></x-heroicon-o-sun>
                </div>
                <x-nav-settings-dropdown />
            </div>
        </div>

        <div class="relative flex flex-col justify-between px-6 py-4 mx-auto lg:hidden">
            <div class="flex justify-between">
                <a href="{{ route('home') }}">
                    <img x-cloak x-show="! $store.stage.darkMode" src="/img/phpstage.png" class="mb-4 mr-0 xxs:h-8 xs:h-12" />
                    <img x-cloak x-show="$store.stage.darkMode" src="/img/phpstage_white.png" class="mb-4 mr-0 xxs:h-8 xs:h-12" />
                </a>

                <!-- Settings Dropdown -->
                <div class="flex items-center ml-auto">
                    <div x-cloak class="mr-4 cursor-pointer" x-on:click="$store.stage.toggleTheme()">
                        <x-heroicon-o-moon x-cloak x-show="$store.stage.darkMode" class="w-6 text-white"></x-heroicon-o-moon>
                        <x-heroicon-o-sun x-cloak x-show="! $store.stage.darkMode" class="w-6 text-gray-900"></x-heroicon-o-sun>
                    </div>
                    <x-nav-settings-dropdown />
                </div>
            </div>

            <!-- Main Navigation -->
            <livewire:navigation-main />

        </div>
    </header>
</div>
