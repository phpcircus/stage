<nav x-data="nav" class="fixed top-0 z-50 w-full h-24 font-sans shadow dark:shadow-md bg-skin-fill-mantle">
    <div class="h-full px-4 mx-auto max-w-7xl sm:px-6 lg:px-8">
        <div class="flex justify-between h-full">
            <div class="flex items-center w-full h-full">
                <a href="@route('home')" class="flex items-center">
                    <x-jet-application-mark />
                </a>
                <div x-cloak class="relative hidden h-full isolate sm:ml-6 sm:flex lg:ml-24">
                    <div x-ref="home" x-on:mouseover="setPosition('home')" x-on:mouseout="setPosition(currentPath)"
                          class="inline-flex items-center justify-center w-24">
                        <a href="@route('home')" class="z-20 font-bold inline-block w-full py-8 text-center uppercase tracking-tight transition-all duration-[500ms]"
                        x-bind:class="position === 'home' ? 'text-white' : 'text-skin-muted'"
                        x-bind:class="this.currentPath.split('/')[0] !== 'admin' ? 'hover:text-white' : ''">
                            Home
                        </a>
                    </div>
                    <div x-ref="posts" x-on:mouseover="setPosition('posts')" x-on:mouseout="setPosition(currentPath)"
                          class="inline-flex items-center justify-center w-24">
                        <a href="@route('posts')" x-on:click="$store.stage.setSeenToNewest()"
                           class="relative z-20 font-bold inline-block w-full py-8 text-center uppercase tracking-tight transition-all duration-[500ms]"
                           x-bind:class="position === 'posts' ? 'text-white' : 'text-skin-muted'"
                           x-bind:class="this.currentPath.split('/')[0] !== 'admin' ? 'hover:text-white' : ''">
                            Posts
                            <div x-cloak x-show="$store.stage.hasntSeenNewest()">
                                <span
                                    class="absolute right-[12px] top-7 inline-flex w-3 h-3 bg-red-400 rounded-full opacity-75 animate-ping"></span>
                                <span
                                    class="absolute right-[12px] top-7 inline-flex w-3 h-3 bg-red-500 rounded-full opacity-50"></span>
                            </div>
                        </a>
                    </div>
                    <div x-ref="about" x-on:mouseover="setPosition('about')" x-on:mouseout="setPosition(currentPath)"
                          class="inline-flex items-center justify-center w-24">
                        <a href="@route('about')" class="z-20 font-bold inline-block w-full py-8 text-center uppercase tracking-tight transition-all duration-[500ms]"
                        x-bind:class="position === 'about' ? 'text-white' : 'text-skin-muted'"
                        x-bind:class="this.currentPath.split('/')[0] !== 'admin' ? 'hover:text-white' : ''">
                            About
                        </a>
                    </div>
                    <div x-ref="projects" x-on:mouseover="setPosition('projects')" x-on:mouseout="setPosition(currentPath)"
                          class="inline-flex items-center justify-center w-24">
                        <a href="@route('projects')" class="z-20 font-bold inline-block w-full py-8 text-center uppercase tracking-tight transition-all duration-[500ms]"
                        x-bind:class="position === 'projects' ? 'text-white' : 'text-skin-muted'"
                        x-bind:class="this.currentPath.split('/')[0] !== 'admin' ? 'hover:text-white' : ''">
                            Projects
                        </a>
                    </div>
                    <div x-ref="slider" style="transition: all .25s linear;" x-bind:class="pathIs('admin') ? 'hidden' : ''"
                        class="absolute bottom-0 z-10 w-24 h-full">
                    </div>
                </div>
                <span class="ml-auto cursor-pointer group">
                    <span class="sr-only">Dark Mode / Light Mode</span>
                    <span x-on:click="$store.stage.toggleTheme()">
                        <x-heroicon-s-moon x-cloak x-show="$store.stage.darkMode" class="w-6 mr-4 text-gray-100 group-hover:text-gray-300"></x-heroicon-o-moon>
                        <x-heroicon-s-sun x-cloak x-show="! $store.stage.darkMode" class="w-6 mr-4 text-yellow-500 group-hover:text-yellow-300"></x-heroicon-o-sun>
                    </span>
                </span>
            </div>
            <div class="hidden sm:ml-6 sm:flex sm:items-center">
                <!-- User Menu dropdown -->
                @auth
                    <div x-on:keydown.escape.stop="closeUserMenu(true)" x-on:click.away="closeUserMenu()" class="relative ml-3">
                        <div>
                            <button x-ref="userMenuButton" type="button" x-on:click="toggleUserMenu()"
                                class="flex w-8 h-8 text-sm bg-white rounded-full ring-2 ring-offset-2 ring-gray-300 dark:ring-gray-200 hover:ring-red-500 dark:hover:ring-red-500 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-red-500"
                                id="user-menu-button" aria-expanded="false" aria-haspopup="true">
                                <span class="sr-only">Open user menu</span>
                                <img class="w-8 h-8 rounded-full" src="{{ auth()->user()->profile_photo_url }}" alt="{{ auth()->user()->name }}">
                            </button>
                        </div>
                        <div x-show="userMenuOpen" x-cloak
                            class="absolute right-0 w-48 py-1 mt-2 origin-top-right rounded-md shadow-lg bg-skin-fill-mantle ring-1 ring-black ring-opacity-5 focus:outline-none"
                            role="menu" aria-orientation="vertical" aria-labelledby="user-menu-button" tabindex="-1">
                            <a href="@route('profile.show')" class="block px-4 py-2 uppercase text-skin-base hover:bg-skin-fill-highlight hover:text-skin-extreme" role="menuitem"
                                tabindex="-1" id="user-menu-item-0">
                                Your Profile
                            </a>
                            <a href="@route('admin.categories')" class="block px-4 py-2 uppercase text-skin-base hover:bg-skin-fill-highlight hover:text-skin-extreme" role="menuitem"
                                tabindex="-1" id="user-menu-item-1">
                                Categories
                            </a>
                            <a href="@route('admin.posts')" class="block px-4 py-2 uppercase text-skin-base hover:bg-skin-fill-highlight hover:text-skin-extreme" role="menuitem"
                                tabindex="-1" id="user-menu-item-2">
                                Posts
                            </a>
                            <span class="block px-4 py-2 hover:bg-skin-fill-highlight group" role="menuitem"
                                tabindex="-1" id="user-menu-item-3">
                                <form method="POST" action="@route('logout')">
                                    @csrf
                                    <button type="submit"
                                        class="inline-block w-full text-left uppercase active:outline-none text-skin-base group-hover:bg-skin-fill-highlight group-hover:text-skin-extreme"
                                        onclick="event.preventDefault(); this.closest('form').submit();">
                                        Sign out
                                    </button>
                                </form>
                            </span>
                        </div>
                    </div>
                @endauth
            </div>
            <div class="flex items-center -mr-2 sm:hidden">
                <!-- Mobile menu button -->
                <button type="button" x-on:click="toggleMobileMenu()" x-ref="mobileMenuTrigger"
                    class="inline-flex items-center justify-center p-2 rounded-md hover:bg-gray-100 focus:outline-none group"
                    aria-controls="mobile-menu" aria-expanded="false">
                    <span class="sr-only">Open main menu</span>
                    <x-heroicon-o-menu class="block w-6 h-6 text-skin-loud group-hover:text-gray-800"
                        x-bind:class="{ 'hidden': mobileMenuOpen, 'block': !(mobileMenuOpen) }" />
                    <x-heroicon-o-x class="block w-6 h-6 text-white group-hover:text-gray-800"
                            x-bind:class="{ 'block': mobileMenuOpen, 'hidden': !(mobileMenuOpen) }" />
                </button>
            </div>
        </div>
    </div>

    <!-- Mobile menu, show/hide based on menu state. -->
    <div id="mobile-menu" x-show="mobileMenuOpen" x-cloak
        x-description="Mobile menu, show/hide based on menu state."
        class="absolute top-0 left-0 w-full h-screen overflow-y-hidden bg-gray-800 sm:hidden">
        <div x-data class="flex flex-col items-center justify-center w-full h-full pt-8">
            <a href="/" class="block mb-8 text-3xl font-bold text-white uppercase border-b-2"
                x-bind:class="pathIs('home') ? 'border-white' : 'border-transparent'">
                Home
            </a>
            <a x-on:click="$store.stage.setSeenToNewest()" href="{{ route('posts') }}"
                class="relative block mb-8 text-3xl font-bold text-white uppercase border-b-2"
                x-bind:class="pathIs('posts') ? 'border-white' : 'border-transparent'">
                Posts
                <div x-cloak x-show="$store.stage.hasntSeenNewest()">
                    <span
                        class="absolute top-0 left-[100px] inline-flex w-3 h-3 bg-red-400 rounded-full opacity-75 animate-ping"></span>
                    <span
                        class="absolute top-0 left-[100px] inline-flex w-3 h-3 bg-red-500 rounded-full opacity-50"></span>
                </div>
            </a>
            <a href="{{ route('about') }}"
                class="block mb-8 text-3xl font-bold text-white uppercase border-b-2"
                x-bind:class="pathIs('about') ? 'border-white' : 'border-transparent'">
                About
            </a>
            <a href="{{ route('projects') }}"
                class="block mb-8 text-3xl font-bold text-white uppercase border-b-2"
                x-bind:class="pathIs('projects') ? 'border-white' : 'border-transparent'">
                Projects
            </a>
            @auth
                <a href="{{ route('profile.show') }}"
                    class="block mb-8 text-3xl font-bold text-white uppercase border-b-2"
                    x-bind:class="pathIs('profile') ? 'border-white' : 'border-transparent'">
                    Profile
                </a>
                <a href="{{ route('admin.posts') }}"
                    class="block mb-8 text-3xl font-bold text-white uppercase border-b-2"
                    x-bind:class="pathIs('admin/posts') ? 'border-white' : 'border-transparent'">
                    Posts
                </a>
                <a href="{{ route('admin.categories') }}"
                    class="block mb-8 text-3xl font-bold text-white uppercase border-b-2"
                    x-bind:class="pathIs('categories') ? 'border-white' : 'border-transparent'">
                    Categories
                </a>
                <div class="block cursor-pointer group" role="menuitem" id="user-menu-item-3">
                    <form method="POST" action="{{ route('logout') }}">
                        @csrf
                        <button type="submit" class="text-3xl font-bold text-white uppercase"
                            onclick="event.preventDefault(); this.closest('form').submit();">
                            Sign out
                        </button>
                    </form>
                </div>
            @endauth
        </div>
    </div>
    @push('scripts')
        <script>
            document.addEventListener('alpine:initializing', function() {
                Alpine.data('nav', () => ({
                    mobileMenuOpen: false,
                    userMenuOpen: false,
                    currentPath: '{{ request()->path() }}',
                    position: '',
                    pathIs(path) {
                        return this.currentPath.includes(path);
                    },
                    toggleMobileMenu() {
                        this.mobileMenuOpen = !this.mobileMenuOpen
                        if (this.mobileMenuOpen) {
                            this.$nextTick(() => {
                                this.$refs.mobileMenuTrigger.focus();
                            });
                        }
                    },
                    toggleUserMenu() {
                        this.userMenuOpen = !this.userMenuOpen;
                        this.$refs.userMenuButton.focus();
                    },
                    closeUserMenu(focusMenuButton = false) {
                        this.userMenuOpen = false;

                        if (focusMenuButton) {
                            this.$refs.userMenuButton.focus();
                        }
                    },
                    positions: {
                        home: {
                            right: '18rem',
                        },
                        posts: {
                            right: '12rem',
                        },
                        about: {
                            right: '6rem',
                        },
                        projects: {
                            right: '0',
                        },
                    },
                    setPosition(position) {
                        var position = position.split('/')[0];
                        var path = this.currentPath.split('/')[0];
                        if (this.positions.hasOwnProperty(position) && this.positions.hasOwnProperty(path)) {
                            this.position = position;
                            this.$refs.slider.style.right = this.positions[position]['right'];
                            if (position === path) {
                                this.$refs.slider.style.backgroundColor = '#ff3d40';
                            } else {
                                this.$refs.slider.style.backgroundColor = '#ff9496';
                            }
                        }
                    },
                    init() {
                        this.$store.stage.newest = '{{ $newest }}';
                        this.setPosition(this.currentPath);
                    }
                }));
            });
        </script>
    @endpush
</nav>
