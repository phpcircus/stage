<div class="group bg-yellow-500/80 dark:bg-indigo-900/80 fixed top-[90px] z-40 right-[-10rem] w-48 h-12 rounded-md rounded-r-none shadow-extreme dark:shadow-none lg:hover:right-0 transition-all duration-300"
     x-on:click="$store.stage.toggleTheme()">
    <div class="flex items-center justify-start w-full h-full cursor-pointer">
        <x-heroicon-o-moon x-cloak x-show="$store.stage.darkMode" class="w-6 ml-2 mr-4 text-gray-300 group-hover:text-white"></x-heroicon-o-moon>
        <x-heroicon-o-sun x-cloak x-show="! $store.stage.darkMode" class="w-6 ml-2 mr-4 text-gray-200 group-hover:text-white"></x-heroicon-o-sun>
        <span class="text-xs text-gray-300 group-hover:text-white"
            x-html="$store.stage.darkMode ? 'Change to light mode' : 'Change to dark mode'"></span>
    </div>
</div>