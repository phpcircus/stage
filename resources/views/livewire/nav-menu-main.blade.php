<nav x-data="{ open: false }" x-init="$store.stage.newest = '{{ $newest }}'" class="shadow bg-gradient-to-r from-skin-stop-crust via-skin-stop-crust to-skin-stop-core">
    <div class="px-4 mx-auto max-w-7xl sm:px-6 lg:px-8">
        <div class="flex justify-between h-16">
            <div class="flex">
                <div class="flex items-center flex-shrink-0 mr-2 md:mr-8">
                    <span class="text-2xl text-skin-loud font-blade">PHPSTAGE</span>
                </div>
                <div class="hidden sm:ml-6 sm:flex sm:space-x-8">
                    <!-- Current: "border-red-500 text-skin-loud", Default: "border-transparent text-gray-500 hover:border-red-400/[.25] hover:text-gray-700" -->
                    <a href="{{ route('home') }}"
                        class="inline-flex items-center px-1 pt-1 text-base font-semibold uppercase border-b-2 {{ request()->routeIs('*home*') ? 'text-skin-loud border-red-500' : 'text-skin-muted hover:text-skin-loud border-transparent hover:border-red-500/[.35]'  }}">
                        Home
                    </a>
                    <a href="{{ route('posts') }}"
                        x-on:click="$store.stage.setSeenToNewest()"
                        class="relative inline-flex items-center px-1 pt-1 text-base font-semibold uppercase border-b-2 {{ request()->routeIs('*posts*') ? 'text-skin-loud border-red-500' : 'text-skin-muted hover:text-skin-loud border-transparent hover:border-red-500/[.35]'  }}">
                        Posts
                        <div x-cloak x-show="$store.stage.hasntSeenNewest()">
                            <span class="absolute -right-[10px] top-[20px] inline-flex w-3 h-3 bg-red-400 rounded-full opacity-75 animate-ping"></span>
                            <span class="absolute -right-[10px] top-[20px] inline-flex w-3 h-3 bg-red-500 rounded-full opacity-50"></span>
                        </div>
                    </a>
                    <a href="{{ route('about') }}"
                        class="inline-flex items-center px-1 pt-1 text-base font-semibold uppercase border-b-2 {{ request()->routeIs('*about*') ? 'text-skin-loud border-red-500' : 'text-skin-muted hover:text-skin-loud border-transparent hover:border-red-500/[.35]'  }}">
                        About
                    </a>
                    <a href="{{ route('projects') }}"
                        class="inline-flex items-center px-1 pt-1 text-base font-semibold uppercase border-b-2 {{ request()->routeIs('*projects*') ? 'text-skin-loud border-red-500' : 'text-skin-muted hover:text-skin-loud border-transparent hover:border-red-500/[.35]'  }}">
                        Projects
                    </a>
                </div>
            </div>
            <div class="hidden sm:ml-6 sm:flex sm:items-center">
                <div x-data x-cloak class="mr-4 cursor-pointer" x-on:click="$store.stage.toggleTheme()">
                    <x-heroicon-o-moon x-cloak x-show="$store.stage.darkMode" class="w-8 text-white"></x-heroicon-o-moon>
                    <x-heroicon-o-sun x-cloak x-show="! $store.stage.darkMode" class="w-8 text-gray-900"></x-heroicon-o-sun>
                </div>
                <!-- Profile dropdown -->
                @auth
                    <div x-data="{ userMenuOpen: false }" x-on:keydown.escape.stop="userMenuOpen = false;" x-on:click.away="userMenuOpen = false"
                        class="relative ml-3">
                        <div>
                            <button type="button"
                                class="flex text-sm bg-white rounded-full focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-red-500"
                                id="user-menu-button" x-ref="button" x-on:click="userMenuOpen = !userMenuOpen">
                                <span class="sr-only">Open user menu</span>
                                <img class="w-8 h-8 rounded-full"
                                    src="{{ auth()->user()->profile_photo_url }}"
                                    alt="profile photo">
                            </button>
                        </div>

                        <div x-show="userMenuOpen" x-transition:enter="transition ease-out duration-200"
                            x-transition:enter-start="transform opacity-0 scale-95"
                            x-transition:enter-end="transform opacity-100 scale-100"
                            x-transition:leave="transition ease-in duration-75"
                            x-transition:leave-start="transform opacity-100 scale-100"
                            x-transition:leave-end="transform opacity-0 scale-95"
                            class="z-[111] absolute right-0 w-48 py-1 mt-2 origin-top-right bg-skin-fill-mantle rounded-md shadow-lg ring-1 ring-black ring-opacity-5 focus:outline-none"
                            x-ref="menu-items" x-description="Dropdown menu, show/hide based on menu state." role="menu" aria-orientation="vertical"
                            aria-labelledby="user-menu-button" style="display: none;">
                            <a href="{{ route('profile.show') }}" class="block px-4 py-2 text-sm text-skin-base hover:bg-skin-fill-extreme hover:text-skin-extreme" role="menuitem" id="user-menu-item-0" x-on:click="userMenuOpen = false">Your Profile</a>
                            <a href="{{ route('admin.posts') }}" class="block px-4 py-2 text-sm text-skin-base hover:bg-skin-fill-extreme hover:text-skin-extreme" role="menuitem"
                                id="user-menu-item-1" x-on:click="userMenuOpen = false;">Posts</a>
                            <a href="{{ route('admin.categories') }}" class="block px-4 py-2 text-sm text-skin-base hover:bg-skin-fill-extreme hover:text-skin-extreme" role="menuitem"
                                id="user-menu-item-2" x-on:click="userMenuOpen = false;">Categories</a>
                            <div class="block px-4 py-2 cursor-pointer hover:bg-skin-fill-extreme group" role="menuitem" id="user-menu-item-3">
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
                <button type="button"
                    class="inline-flex items-center justify-center p-2 text-gray-400 rounded-md hover:text-gray-500 hover:bg-gray-100 focus:outline-none focus:ring-2 focus:ring-inset focus:ring-red-500"
                    aria-controls="mobile-menu" @click="open = !open" aria-expanded="false"
                    x-bind:aria-expanded="open.toString()">
                    <span class="sr-only">Open main menu</span>
                    <svg x-description="Icon when menu is closed.

Heroicon name: outline/menu" x-state:on="Menu open" x-state:off="Menu closed" class="block w-6 h-6"
                        :class="{ 'hidden': open, 'block': !(open) }" xmlns="http://www.w3.org/2000/svg" fill="none"
                        viewBox="0 0 24 24" stroke="currentColor" aria-hidden="true">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M4 6h16M4 12h16M4 18h16"></path>
                    </svg>
                    <svg x-description="Icon when menu is open.

Heroicon name: outline/x" x-state:on="Menu open" x-state:off="Menu closed" class="hidden w-6 h-6"
                        :class="{ 'block': open, 'hidden': !(open) }" xmlns="http://www.w3.org/2000/svg" fill="none"
                        viewBox="0 0 24 24" stroke="currentColor" aria-hidden="true">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12">
                        </path>
                    </svg>
                </button>
            </div>
        </div>
    </div>

    <div x-description="Mobile menu, show/hide based on menu state." class="sm:hidden" id="mobile-menu" x-show="open"
        style="display: none;">
        <div class="pt-2 pb-3 space-y-1">
            <!-- Current: "bg-red-50 border-red-500 text-red-700", Default: "border-transparent text-gray-500 hover:bg-gray-50 hover:border-red-400/[.25] hover:text-gray-700" -->
            <a href="#"
                class="block py-2 pl-3 pr-4 text-base font-medium text-red-700 border-l-4 border-red-500 bg-red-50">Home</a>
            <a href="#"
                class="block py-2 pl-3 pr-4 text-base font-medium text-gray-500 border-l-4 border-transparent hover:bg-gray-50 hover:border-red-400/[.25] hover:text-gray-700">Posts</a>
            <a href="#"
                class="block py-2 pl-3 pr-4 text-base font-medium text-gray-500 border-l-4 border-transparent hover:bg-gray-50 hover:border-red-400/[.25] hover:text-gray-700">About</a>
            <a href="#"
                class="block py-2 pl-3 pr-4 text-base font-medium text-gray-500 border-l-4 border-transparent hover:bg-gray-50 hover:border-red-400/[.25] hover:text-gray-700">Projects</a>
        </div>
        <div class="pt-4 pb-3 border-t border-gray-200">
            <div class="flex items-center px-4">
                <div class="flex-shrink-0">
                    <img class="w-10 h-10 rounded-full"
                        src="https://images.unsplash.com/photo-1472099645785-5658abf4ff4e?ixlib=rb-1.2.1&amp;ixid=eyJhcHBfaWQiOjEyMDd9&amp;auto=format&amp;fit=facearea&amp;facepad=2&amp;w=256&amp;h=256&amp;q=80"
                        alt="">
                </div>
                <div class="ml-3">
                    <div class="text-base font-medium text-gray-800">Tom Cook</div>
                    <div class="text-sm font-medium text-gray-500">tom@example.com</div>
                </div>
            </div>
            <div class="mt-3 space-y-1">
                <a href="#"
                    class="block px-4 py-2 text-base font-medium text-gray-500 hover:text-gray-800 hover:bg-gray-100">Your
                    Profile</a>
                <a href="#"
                    class="block px-4 py-2 text-base font-medium text-gray-500 hover:text-gray-800 hover:bg-gray-100">Settings</a>
                <a href="#"
                    class="block px-4 py-2 text-base font-medium text-gray-500 hover:text-gray-800 hover:bg-gray-100">Sign
                    out</a>
            </div>
        </div>
    </div>
</nav>
