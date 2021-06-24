<nav x-data x-init="$store.stage.newest = '{{ $newest }}'" class="flex flex-wrap items-center justify-center h-full">
    <a href="/"
        class="text-skin-loud font-bold uppercase border-b-4 {{ request()->routeIs('*home*') ? 'border-red-500' : 'border-transparent hover:border-red-500/25'  }} text-xs lg:text-lg inline-flex px-2 lg:px-3 pt-6 h-full mr-1 lg:mr-6 focus:outline-none">
        Home
    </a>
    <a x-on:click="$store.stage.setSeenToNewest()" href="{{ route('posts') }}"
        class="text-skin-loud font-bold uppercase relative border-b-4 {{ request()->routeIs('*posts*') ? 'border-red-500' : 'border-transparent hover:border-red-500/25'  }} text-xs lg:text-lg inline-flex px-2 lg:px-3 pt-6 h-full mr-1 lg:mr-6 focus:outline-none">
        Posts
        <div x-cloak x-show="$store.stage.hasntSeenNewest()">
            <span class="absolute inline-flex w-3 h-3 bg-red-400 rounded-full opacity-75 right-1 animate-ping"></span>
            <span class="absolute inline-flex w-3 h-3 bg-red-500 rounded-full opacity-50 right-1"></span>
        </div>
    </a>
    <a href="{{ route('about') }}"
        class="text-skin-loud font-bold uppercase border-b-4 {{ request()->routeIs('*about*') ? 'border-red-500' : 'border-transparent hover:border-red-500/25'  }} text-xs lg:text-lg inline-flex px-2 lg:px-3 pt-6 h-full mr-1 lg:mr-6 focus:outline-none">
        About Me
    </a>
    <a href="{{ route('projects') }}"
        class="text-skin-loud font-bold uppercase border-b-4 {{ request()->routeIs('*projects*') ? 'border-red-500' : 'border-transparent hover:border-red-500/25'  }} text-xs lg:text-lg inline-flex px-2 lg:px-3 pt-6 h-full mr-1 lg:mr-6 focus:outline-none">
        Projects
    </a>
</nav>