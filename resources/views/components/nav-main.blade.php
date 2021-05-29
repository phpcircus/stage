<nav class="flex flex-wrap items-center justify-around w-full md:w-auto lg:justify-center">
    <a href="/"
        class="border-b-4 {{ request()->routeIs('*home*') ? 'border-red-500' : 'border-red-500/25'  }} text-sm lg:text-lg transform hover:scale-125 inline-flex px-3 py-1 mr-0 text-gray-900 uppercase transition-colors duration-200 lg:mr-6 focus:outline-none">
        Home
    </a>
    <a href="{{ route('posts') }}"
        class="border-b-4 {{ request()->routeIs('*posts*') ? 'border-red-500' : 'border-red-500/25'  }} text-sm lg:text-lg transform hover:scale-125 inline-flex px-3 py-1 mr-0 text-gray-900 uppercase transition-colors duration-200 lg:mr-6 focus:outline-none">
        Posts
    </a>
    <a href="{{ route('about') }}"
        class="border-b-4 {{ request()->routeIs('*about*') ? 'border-red-500' : 'border-red-500/25'  }} text-sm lg:text-lg transform hover:scale-125 inline-flex px-3 py-1 mr-0 text-gray-900 uppercase transition-colors duration-200 lg:mr-6 focus:outline-none">
        About Me
    </a>
    <a href="{{ route('projects') }}"
        class="border-b-4 {{ request()->routeIs('*projects*') ? 'border-red-500' : 'border-red-500/25'  }} text-sm lg:text-lg transform hover:scale-125 inline-flex px-3 py-1 mr-0 text-gray-900 uppercase transition-colors duration-200 lg:mr-6 focus:outline-none">
        Projects
    </a>
</nav>