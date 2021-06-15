<nav x-data="{ seen: localStorage.getItem('seen'), hasNew: {{ json_encode($hasNew) }}, newest: {{ json_encode($newest) }} }"
     x-init="localStorage.setItem('newest', newest)"
     class="flex flex-wrap items-center justify-center w-full md:w-auto">
    <a href="/"
        class="border-b-4 {{ request()->routeIs('*home*') ? 'border-red-500' : 'border-red-500/25'  }} text-xs lg:text-lg transform hover:scale-125 inline-flex px-2 lg:px-3 py-1 mr-1 text-gray-900 uppercase transition-colors duration-200 lg:mr-6 focus:outline-none">
        Home
    </a>
    <a x-on:click="localStorage.setItem('seen', localStorage.getItem('newest'))" href="{{ route('posts') }}"
        class="relative border-b-4 {{ request()->routeIs('*posts*') ? 'border-red-500' : 'border-red-500/25'  }} text-xs lg:text-lg transform hover:scale-125 inline-flex px-2 lg:px-3 py-1 mr-1 text-gray-900 uppercase transition-colors duration-200 lg:mr-6 focus:outline-none">
        Posts
        <div x-cloak x-show="seen != newest">
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
</nav>