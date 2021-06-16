<div>
    @auth
        <div class="absolute top-[12px] lg:top-[20px] right-[40px] xl:right-0 ml-auto">
            <x-jet-dropdown align="right" width="48">
                <x-slot name="trigger">
                    @if (Laravel\Jetstream\Jetstream::managesProfilePhotos())
                        <button
                            class="flex text-sm transition border-2 border-red-500 rounded-full hover:border-red-500/25 focus:outline-none focus:border-gray-300">
                            <img src="{{ auth()->user()->profile_photo_url }}" alt="Clayton Stone profile picture"
                                class="object-cover w-12 h-12 rounded-full">
                        </button>
                    @else
                        <span class="inline-flex rounded-md">
                            <button type="button"
                                class="inline-flex items-center px-3 py-2 text-sm font-medium leading-4 text-gray-500 transition bg-white border border-transparent rounded-md hover:text-gray-700 focus:outline-none">
                                {{ Auth::user()->name }}

                                <svg class="ml-2 -mr-0.5 h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"
                                    fill="currentColor">
                                    <path fill-rule="evenodd"
                                        d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z"
                                        clip-rule="evenodd" />
                                </svg>
                            </button>
                        </span>
                    @endif
                </x-slot>

                <x-slot name="content">
                    <x-jet-dropdown-link class="hover:bg-red-400 hover:text-white" href="{{ route('profile.show') }}">
                        {{ __('Profile') }}
                    </x-jet-dropdown-link>
                    <div class="mt-2 border-t border-gray-200"></div>

                    <x-jet-dropdown-link class="hover:bg-red-400 hover:text-white" href="{{ route('admin.posts') }}">
                        {{ __('Posts') }}
                    </x-jet-dropdown-link>

                    <x-jet-dropdown-link class="hover:bg-red-400 hover:text-white" href="{{ route('admin.categories') }}">
                        {{ __('Categories') }}
                    </x-jet-dropdown-link>
                    <div class="mt-2 border-t border-gray-200"></div>


                    <!-- Authentication -->
                    <form method="POST" action="{{ route('logout') }}">
                        @csrf

                        <x-jet-dropdown-link class="hover:bg-red-400 hover:text-white" href="{{ route('logout') }}" onclick="event.preventDefault();
                                        this.closest('form').submit();">
                            {{ __('Log Out') }}
                        </x-jet-dropdown-link>
                    </form>
                </x-slot>
            </x-jet-dropdown>
        </div>
    @else
        <div class="absolute top-[12px] lg:top-[8px] right-[40px] xl:right-0 ml-auto">
            <span x-data="dropdown">
                <img
                    x-ref="image"
                    src="/img/closed.jpg"
                    alt="Clayton Stone cartoon picture"
                    class="object-cover w-12 h-12 border-4 border-gray-300 rounded-full shadow-inner md:w-24 md:h-24"
                >
            </span>
        </div>
    @endauth

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
</div>
