<nav x-data="seen" class="flex flex-wrap items-center justify-center w-full space-y-2 md:w-auto">
    <a href="/"
        class="-mb-2 border-b-4 {{ request()->routeIs('*home*') ? 'border-red-500' : 'border-red-500/25'  }} text-xs lg:text-lg transform hover:scale-125 inline-flex px-2 lg:px-3 py-1 mr-1 text-gray-900 uppercase transition-colors duration-200 lg:mr-6 focus:outline-none">
        Home
    </a>
    <a x-on:click="setSeenToNewest()" href="{{ route('posts') }}"
        class="relative border-b-4 {{ request()->routeIs('*posts*') ? 'border-red-500' : 'border-red-500/25'  }} text-xs lg:text-lg transform hover:scale-125 inline-flex px-2 lg:px-3 py-1 mr-1 text-gray-900 uppercase transition-colors duration-200 lg:mr-6 focus:outline-none">
        Posts
        <div x-cloak x-show="hasntSeenNewest()">
            <span class="absolute inline-flex w-3 h-3 bg-red-400 rounded-full opacity-75 right-1 animate-ping"></span>
            <span class="absolute inline-flex w-3 h-3 bg-red-500 rounded-full opacity-50 right-1"></span>
        </div>
    </a>
    <a href="{{ route('about') }}"
        class="border-b-4 {{ request()->routeIs('*about*') ? 'border-red-500' : 'border-red-500/25'  }} text-xs lg:text-lg transform hover:scale-125 inline-flex px-2 lg:px-3 py-1 mr-1 text-gray-900 uppercase transition-colors duration-200 lg:mr-6 focus:outline-none">
        About Me
    </a>
    <a href="{{ route('projects') }}"
        class="border-b-4 {{ request()->routeIs('*projects*') ? 'border-red-500' : 'border-red-500/25'  }} text-xs lg:text-lg transform hover:scale-125 inline-flex px-2 lg:px-3 py-1 mr-1 text-gray-900 uppercase transition-colors duration-200 lg:mr-6 focus:outline-none">
        Projects
    </a>

    @push('scripts')
        <script>
            document.addEventListener('alpine:initializing', function () {
                Alpine.data('seen', () => ({
                    seen: localStorage.getItem('seen'),
                    newest: null,
                    init () {
                        this.newest = @json($newest);
                        localStorage.setItem('newest', this.newest);
                    },
                    hasntSeenNewest () {
                        return this.seen != this.newest;
                    },
                    setSeenToNewest () {
                        localStorage.setItem('seen', localStorage.getItem('newest'));
                    },
                }));
            });
        </script>
    @endpush
</nav>