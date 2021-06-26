<x-app-layout>
    <div x-data class="px-4 py-6 mx-auto sm:px-6 lg:px-8 max-w-7xl" >
        <x-page-hero class="h-36 md:h-60" height="h-32 md:h-56">
            <div class="relative z-10 md:flex md:items-center md:justify-evenly">
                <img x-cloak x-show="! $store.stage.darkMode" id="page-title" src="/img/home_hero_new.png" class="h-36 md:h-56" />
                <img x-cloak x-show="$store.stage.darkMode" id="page-title" src="/img/home_hero_new_dark_mode.png" class="h-36 md:h-56" />

                <div x-data="cartoon" class="absolute md:relative right-[40px] top-[110px] ws:top-[40px] md:right-[20px] md:top-[10px] lg:top-[40px] md:ml-4">
                    <img
                        x-ref="image"
                        src="/img/closed.jpg"
                        alt="Clayton Stone cartoon picture"
                        class="object-cover w-12 h-12 border-4 border-gray-300 rounded-full shadow-inner sm:w-20 sm:h-20 ws:w-24 ws:h-24 md:w-32 md:h-32 lg:w-48 lg:h-48 dark:border-gray-500"
                    >
                </div>
            </div>
        </x-page-header>
        <div class="pb-6 mx-auto space-y-4 rounded-lg lg:pb-8">
            <livewire:posts-overview class="flex flex-col space-x-4 overflow-hidden shadow" />
        </div>
    </div>

    @push('scripts')
        <script>
            document.addEventListener('alpine:initializing', function () {
                Alpine.data('cartoon', () => ({
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
