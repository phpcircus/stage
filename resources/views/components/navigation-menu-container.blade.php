<div class="fixed top-0 z-50 w-full bg-white shadow-md">
    <header class="font-semibold text-gray-900">
        <div class="relative hidden lg:py-4 lg:px-6 xl-px-0 lg:flex lg:mx-auto lg:max-w-7xl lg:mb-4">
            <a href="{{ route('home') }}">
                <img src="/img/phpstage.png" class="h-16 mb-8 mr-0 lg:mb-0 lg:mr-24" />
            </a>

            <!-- Main Navigation -->
            <livewire:navigation-main />

            <!-- Settings Dropdown -->
            <div>
                <x-nav-settings-dropdown />
            </div>
        </div>

        <div class="relative flex flex-col justify-between px-6 py-4 mx-auto lg:hidden">
            <div class="flex justify-between">
                <a href="{{ route('home') }}">
                    <img src="/img/phpstage.png" class="mb-8 mr-0 xxs:h-8 xs:h-12" />
                </a>

                <!-- Settings Dropdown -->
                <div>
                    <x-nav-settings-dropdown />
                </div>
            </div>

            <!-- Main Navigation -->
            <livewire:navigation-main />

        </div>
    </header>
</div>
