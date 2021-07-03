<div>
    <nav x-data="nav(false)" x-effect="mobileMenuOpen ? document.body.classList.add('overflow-y-hidden') : document.body.classList.remove('overflow-y-hidden')"
        class="fixed top-0 left-0 z-30 w-full h-20 shadow dark:shadow-md bg-skin-fill-mantle">
        <div class="h-full px-4 mx-auto max-w-7xl sm:px-6 lg:px-8">
            <div class="flex items-center justify-between w-full h-full">
                <div class="flex items-center h-full">
                    <a href="/">
                        <div class="flex items-center flex-shrink-0 mr-2 md:mr-8">
                            <img x-bind:src="$store.stage.darkMode ? '/img/light_elephant.png' : '/img/dark_elephant.png'" class="h-6 mr-1 dark:opacity-75" />
                            <span class="text-xl text-transparent uppercase bg-gradient-to-r dark:bg-gradient-to-l xs:text-2xl sm:text-3xl bg-clip-text from-gray-600 to-gray-400 font-soloist">
                                PhpStage
                            </span>
                        </div>
                    </a>
                    <div class="hidden sm:h-full sm:ml-6 sm:flex sm:space-x-8">
                        <a href="{{ route('home') }}"
                            class="inline-flex items-center px-1 pt-1 text-base font-semibold uppercase border-b-4"
                            x-bind:class="pathIs('home') ? 'text-skin-loud border-red-500/75' : 'text-skin-muted hover:text-skin-loud border-transparent hover:border-red-500/[.35]'">
                            Home
                        </a>
                        <a href="{{ route('posts') }}"
                            x-on:click="$store.stage.setSeenToNewest()"
                            class="relative inline-flex items-center px-1 pt-1 text-base font-semibold uppercase border-b-4"
                            x-bind:class="pathIs('posts') ? 'text-skin-loud border-red-500/75' : 'text-skin-muted hover:text-skin-loud border-transparent hover:border-red-500/[.35]'">
                            Posts
                            <div x-cloak x-show="$store.stage.hasntSeenNewest()">
                                <span class="absolute -right-[10px] top-[25px] inline-flex w-3 h-3 bg-red-400 rounded-full opacity-75 animate-ping"></span>
                                <span class="absolute -right-[10px] top-[25px] inline-flex w-3 h-3 bg-red-500 rounded-full opacity-50"></span>
                            </div>
                        </a>
                        <a href="{{ route('about') }}"
                            class="inline-flex items-center px-1 pt-1 text-base font-semibold uppercase border-b-4"
                            x-bind:class="pathIs('about') ? 'text-skin-loud border-red-500/75' : 'text-skin-muted hover:text-skin-loud border-transparent hover:border-red-500/[.35]'">
                            About
                        </a>
                        <a href="{{ route('projects') }}"
                            class="inline-flex items-center px-1 pt-1 text-base font-semibold uppercase border-b-4"
                            x-bind:class="pathIs('projects') ? 'text-skin-loud border-red-500/75' : 'text-skin-muted hover:text-skin-loud border-transparent hover:border-red-500/[.35]'">
                            Projects
                        </a>
                    </div>
                </div>
                <div class="hidden sm:ml-4 sm:flex sm:items-center">
                    <!-- Profile dropdown -->
                    @auth
                        <div x-data="userMenu(false)" x-on:keydown.escape.stop="closeUserMenu()" x-on:click.away="closeUserMenu()" class="relative ml-3">
                            <button id="user-menu-button" x-ref="button" x-on:click="toggleUserMenu()" type="button"
                                class="flex text-sm bg-white rounded-full hover:ring-2 hover:ring-red-500 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-red-500">
                                <span class="sr-only">Open user menu</span>
                                <img class="w-8 h-8 rounded-full"
                                    src="{{ auth()->user()->profile_photo_url }}"
                                    alt="profile photo">
                            </button>

                            <div x-ref="menu-items" x-show="userMenuOpen" x-transition:enter="transition ease-out duration-200"
                                x-transition:enter-start="transform opacity-0 scale-95"
                                x-transition:enter-end="transform opacity-100 scale-100"
                                x-transition:leave="transition ease-in duration-75"
                                x-transition:leave-start="transform opacity-100 scale-100"
                                x-transition:leave-end="transform opacity-0 scale-95"
                                class="absolute right-0 w-48 py-1 mt-2 origin-top-right rounded-md shadow-lg bg-skin-fill-mantle ring-1 ring-black ring-opacity-5 focus:outline-none"
                                x-description="Dropdown menu, show/hide based on menu state." role="menu" aria-orientation="vertical"
                                aria-labelledby="user-menu-button" x-cloak>
                                <a id="user-menu-item-0" x-on:click="closeUserMenu()" href="{{ route('profile.show') }}"
                                   class="block px-4 py-2 text-sm text-skin-base hover:bg-skin-fill-extreme hover:text-skin-extreme" role="menuitem">
                                   Your Profile
                                </a>
                                <a id="user-menu-item-1" x-on:click="closeUserMenu();" href="{{ route('admin.posts') }}"
                                   class="block px-4 py-2 text-sm text-skin-base hover:bg-skin-fill-extreme hover:text-skin-extreme" role="menuitem">
                                    Posts
                                </a>
                                <a id="user-menu-item-2" x-on:click="closeUserMenu();" href="{{ route('admin.categories') }}"
                                   class="block px-4 py-2 text-sm text-skin-base hover:bg-skin-fill-extreme hover:text-skin-extreme" role="menuitem">
                                    Categories
                                </a>
                                <div id="user-menu-item-3" class="block px-4 py-2 cursor-pointer hover:bg-skin-fill-extreme group" role="menuitem">
                                    <form method="POST" action="{{ route('logout') }}">
                                        @csrf
                                        <button type="submit" class="text-sm text-skin-base active:outline-none group-hover:text-skin-extreme" onclick="event.preventDefault(); this.closest('form').submit();">
                                            Sign out
                                        </button>
                                    </form>
                                </div>
                            </div>

                        </div>
                    @endauth
                </div>
                <div class="flex items-center -mr-2 sm:hidden">
                    <!-- Mobile menu button -->
                    <button x-on:click="toggleMobileMenu()" x-on:keydown.escape="toggleMobileMenu()" x-ref="mobileMenuTrigger" type="button" aria-controls="mobile-menu" aria-expanded="false"
                        class="z-30 inline-flex items-center justify-center p-2 rounded-md group hover:bg-gray-100 focus:outline-none">
                        <span class="sr-only">Open main menu</span>
                        <x-heroicon-o-menu class="block w-6 h-6 text-skin-loud group-hover:text-gray-800" x-bind:class="{ 'hidden': mobileMenuOpen, 'block': !(mobileMenuOpen) }" />
                        <x-heroicon-o-x class="block w-6 h-6 text-white group-hover:text-gray-800" x-bind:class="{ 'block': mobileMenuOpen, 'hidden': !(mobileMenuOpen) }" />
                    </button>
                </div>
                <div id="mobile-menu" x-show="mobileMenuOpen" x-cloak x-description="Mobile menu, show/hide based on menu state."
                     class="absolute top-0 left-0 w-full h-screen overflow-y-hidden bg-gray-800 sm:hidden">
                    <div x-data class="flex flex-col items-center justify-center w-full h-full pt-8">
                        <a href="/" class="block mb-8 text-3xl font-bold text-white uppercase border-b-2"
                            x-bind:class="pathIs('home') ? 'border-white' : 'border-transparent'">
                            Home
                        </a>
                        <a x-on:click="$store.stage.setSeenToNewest()" href="{{ route('posts') }}" class="relative block mb-8 text-3xl font-bold text-white uppercase border-b-2"
                            x-bind:class="pathIs('posts') ? 'border-white' : 'border-transparent'">
                            Posts
                            <div x-cloak x-show="$store.stage.hasntSeenNewest()">
                                <span class="absolute top-0 left-[100px] inline-flex w-3 h-3 bg-red-400 rounded-full opacity-75 animate-ping"></span>
                                <span class="absolute top-0 left-[100px] inline-flex w-3 h-3 bg-red-500 rounded-full opacity-50"></span>
                            </div>
                        </a>
                        <a href="{{ route('about') }}" class="block mb-8 text-3xl font-bold text-white uppercase border-b-2"
                            x-bind:class="pathIs('about') ? 'border-white' : 'border-transparent'">
                            About
                        </a>
                        <a href="{{ route('projects') }}" class="block mb-8 text-3xl font-bold text-white uppercase border-b-2"
                            x-bind:class="pathIs('projects') ? 'border-white' : 'border-transparent'">
                            Projects
                        </a>
                        @auth
                        <a href="{{ route('profile.show') }}" class="block mb-8 text-3xl font-bold text-white uppercase border-b-2"
                            x-bind:class="pathIs('profile') ? 'border-white' : 'border-transparent'">
                            Profile
                        </a>
                        <a href="{{ route('admin.posts') }}" class="block mb-8 text-3xl font-bold text-white uppercase border-b-2"
                            x-bind:class="pathIs('admin/posts') ? 'border-white' : 'border-transparent'">
                            Posts
                        </a>
                        <a href="{{ route('admin.categories') }}" class="block mb-8 text-3xl font-bold text-white uppercase border-b-2"
                            x-bind:class="pathIs('categories') ? 'border-white' : 'border-transparent'">
                            Categories
                        </a>
                        <div class="block cursor-pointer group" role="menuitem" id="user-menu-item-3">
                            <form method="POST" action="{{ route('logout') }}">
                                @csrf
                                <button type="submit" class="text-3xl font-bold text-white uppercase" onclick="event.preventDefault(); this.closest('form').submit();">
                                    Sign out
                                </button>
                            </form>
                        </div>
                        @endauth
                    </div>
                </div>
            </div>
        </div>
    </nav>
    <div class="fixed z-20 w-full h-10 ws:h-12 bg-gradient-to-r from-gray-400 to-gray-500 dark:from-gray-600 dark:to-gray-400"
         x-bind:class="true ? 'rotate-[2deg] ws:rotate-[1.5deg] lg:rotate-[1.7deg] xl:rotate-[0.9deg] top-[3rem] ws:top-[2.75rem] lg:top-[3rem] left-0' : ''">
        &nbsp;
    </div>


    @push('scripts')
        <script>
            document.addEventListener('alpine:initializing', function () {
                Alpine.data('nav', (mobileMenuState = false) => ({
                    mobileMenuOpen: mobileMenuState,
                    currentPath: '{{request()->path()}}',
                    pathIs(path) { return this.currentPath.includes(path); },
                    toggleMobileMenu() {
                        this.mobileMenuOpen = ! this.mobileMenuOpen
                        if (this.mobileMenuOpen) {
                            this.$nextTick(() => {this.$refs.mobileMenuTrigger.focus();});
                        }
                    },
                    init() {
                        this.$store.stage.newest = '{{ $newest }}';
                    }
                }));
                Alpine.data('userMenu', (userMenuState = false) => ({
                    userMenuOpen: userMenuState,
                    closeUserMenu() {
                        this.userMenuOpen = false;
                    },
                    toggleUserMenu() {
                        this.userMenuOpen = ! this.userMenuOpen;
                    },
                }));
            });
        </script>
    @endpush
</div>
