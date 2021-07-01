<x-app-layout>
    <div class="bg-skin-fill-core">
        <div class="p-4 mx-auto max-w-7xl sm:px-6 lg:px-8">
            <div class="flex items-center justify-between mt-4">
                <div class="flex-1 min-w-0">
                    <h2 class="text-2xl font-bold leading-7 text-gray-700 uppercase dark:text-gray-400 sm:text-3xl sm:truncate font-lemonmilk">
                        {{ $header }}
                    </h2>
                </div>
            </div>
            <div>
                {{ $slot }}
            </div>
        </div>
    </div>
</x-app-layout>
