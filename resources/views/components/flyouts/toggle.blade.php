<div class="group bg-yellow-500 dark:bg-indigo-900 fixed top-[90px] z-40 right-[-30px] w-16 h-12 rounded-md rounded-r-none shadow-extreme dark:shadow-none" x-on:click="$store.stage.toggleTheme()">
    <div class="flex content-center justify-start w-full h-full cursor-pointer">
        <x-heroicon-o-moon x-cloak x-show="$store.stage.darkMode" class="w-6 ml-2 text-gray-300 group-hover:text-white"></x-heroicon-o-moon>
        <x-heroicon-o-sun x-cloak x-show="! $store.stage.darkMode" class="w-6 ml-2 text-gray-200 group-hover:text-white"></x-heroicon-o-sun>
    </div>
</div>