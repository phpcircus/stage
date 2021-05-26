<div class="w-auto mx-4 lg:w-4/5 lg:mx-auto">
    <header class="font-semibold text-gray-900">
        <div class="relative flex flex-col items-center py-4 mx-auto xl:flex-row xl:mb-4">
            <img src="/img/phpstage.png" class="h-16 mb-8 mr-0 xl:mb-0 xl:mr-24" />
            <nav class="flex flex-wrap items-center justify-around w-full md:w-auto lg:justify-center">
                <a href="/"
                    class="border-b-4 {{ request()->routeIs('home') ? 'border-red-500' : 'border-red-500/25'  }} text-sm xl:text-lg transform hover:scale-125 inline-flex px-3 py-1 mr-0 text-gray-900 uppercase transition-colors duration-200 lg:mr-6 focus:outline-none">
                    Home
                </a>
                <a href="{{ route('posts') }}"
                    class="border-b-4 {{ request()->routeIs('posts') ? 'border-red-500' : 'border-red-500/25'  }} text-sm xl:text-lg transform hover:scale-125 inline-flex px-3 py-1 mr-0 text-gray-900 uppercase transition-colors duration-200 lg:mr-6 focus:outline-none">
                    Posts
                </a>
                <a href="{{ route('about') }}"
                    class="border-b-4 {{ request()->routeIs('about') ? 'border-red-500' : 'border-red-500/25'  }} text-sm xl:text-lg transform hover:scale-125 inline-flex px-3 py-1 mr-0 text-gray-900 uppercase transition-colors duration-200 lg:mr-6 focus:outline-none">
                    About Me
                </a>
                <a href="{{ route('projects') }}"
                    class="border-b-4 {{ request()->routeIs('projects') ? 'border-red-500' : 'border-red-500/25'  }} text-sm xl:text-lg transform hover:scale-125 inline-flex px-3 py-1 mr-0 text-gray-900 uppercase transition-colors duration-200 lg:mr-6 focus:outline-none">
                    Projects
                </a>
            </nav>

            <!-- Settings Dropdown -->
            <div class="absolute top-[10] right-0 ml-auto">
                <x-jet-dropdown align="right" width="48">
                    <x-slot name="trigger">
                        @auth
                            @if (Laravel\Jetstream\Jetstream::managesProfilePhotos())
                                <button class="flex text-sm transition border-2 border-red-500 rounded-full hover:border-red-500/25 focus:outline-none focus:border-gray-300">
                                    <img src="/img/devcircus.jpg" alt="Clayton Stone profile picture" class="object-cover w-12 h-12 rounded-full">
                                </button>
                            @else
                                <span class="inline-flex rounded-md">
                                    <button type="button" class="inline-flex items-center px-3 py-2 text-sm font-medium leading-4 text-gray-500 transition bg-white border border-transparent rounded-md hover:text-gray-700 focus:outline-none">
                                        {{ Auth::user()->name }}

                                        <svg class="ml-2 -mr-0.5 h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor">
                                            <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd" />
                                        </svg>
                                    </button>
                                </span>
                            @endif
                        @else
                            <span class="inline-flex rounded-md">
                                <x-heroicon-o-user-circle class="w-12 h-12 text-gray-600 transition border-2 border-transparent rounded-full cursor-pointer hover:text-gray-400 hover:border-red-500/25 focus:outline-none focus:border-gray-300" />
                            </span>
                        @endauth
                    </x-slot>

                    <x-slot name="content">
                        @auth
                            <!-- Account Management -->
                            <div class="block px-4 py-2 text-xs text-gray-400">
                                {{ __('Manage Account') }}
                            </div>

                            <x-jet-dropdown-link href="{{ route('profile.show') }}">
                                {{ __('Profile') }}
                            </x-jet-dropdown-link>

                            <div class="border-t border-gray-100"></div>
                        @endauth

                        @auth
                        <!-- Authentication -->
                        <form method="POST" action="{{ route('logout') }}">
                            @csrf

                            <x-jet-dropdown-link href="{{ route('logout') }}"
                                        onclick="event.preventDefault();
                                            this.closest('form').submit();">
                                {{ __('Log Out') }}
                            </x-jet-dropdown-link>
                        </form>
                        @else
                        <x-jet-dropdown-link href="{{ route('login') }}">
                            {{ __('Log In') }}
                        </x-jet-dropdown-link>
                        @endauth
                    </x-slot>
                </x-jet-dropdown>
            </div>


        </div>
    </header>
</div>
