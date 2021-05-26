<x-app-layout>
    <div class="bg-white">
        <div class="p-4 mx-auto max-w-7xl sm:px-6 lg:px-8">
            <div class="md:flex md:items-center md:justify-between">
                <div class="flex-1 min-w-0">
                    <h2 class="text-2xl font-bold leading-7 text-gray-900 sm:text-3xl sm:truncate">
                        {{ ucfirst(Str::after(request()->route()->uri, '/')) }}
                    </h2>
                </div>
                <div class="flex mt-4 md:mt-0 md:ml-4">
                    {{ $primaryButton }}
                </div>
            </div>
            <div class="mt-12">
                {{ $slot }}
            </div>
        </div>
    </div>
</x-app-layout>
