<x-app-layout>
    <div x-data class="px-6 py-8 mx-auto md:px-0 max-w-7xl md:py-12" >
        <x-page-hero class="h-40 md:h-64" height="h-32 md:h-56">
            <div class="md:flex md:items-center md:justify-evenly">
                <img x-cloak x-show="! $store.stage.darkMode" id="page-title" src="/img/home_hero_new.png" class="h-32 md:h-56" />
                <img x-cloak x-show="$store.stage.darkMode" id="page-title" src="/img/home_hero_new_dark_mode.png" class="h-32 md:h-56" />

                <div x-data="dropdown" class="absolute right-[40px] top-[100px] md:right-[20px] md:top-[10px] md:relative md:ml-4">
                    <img
                        x-ref="image"
                        src="/img/closed.jpg"
                        alt="Clayton Stone cartoon picture"
                        class="object-cover w-12 h-12 border-4 border-gray-300 rounded-full shadow-inner sm:w-20 sm:h-20 md:w-32 md:h-32 lg:w-48 lg:h-48 dark:border-gray-500"
                    >
                </div>
            </div>
        </x-page-header>
        <div class="mx-auto mt-2 md:mt-8 sm:px-6 lg:px-8">
            <livewire:posts-overview class="flex flex-col space-x-4 overflow-hidden shadow" />
        </div>
    </div>

    @push('scripts')
        <script>
            document.addEventListener('alpine:initializing', function () {
                Alpine.data('dropdown', () => ({
                    animate: false,
                    init() {
                        var elem = this.$refs.image;
                        setTimeout(function(){ elem.src = '/img/open.jpg'; }, 1000);
                        setTimeout(function(){ elem.src = '/img/closed.jpg'; }, 2000);
                    }
                }));
            });
        </script>
    @endpush
</x-app-layout>
