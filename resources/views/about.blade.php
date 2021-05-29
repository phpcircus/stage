<x-app-layout>
    <div class="px-6 py-12 mx-auto lg:px-0 max-w-7xl">
        <header id="up" class="relative h-24 mx-auto bg-fixed bg-center bg-no-repeat bg-cover md:h-56">
            <!-- Overlay Background + Center Control -->
            <div class="flex justify-start h-20 md:h-40">
                <div>
                    <div class="mx-2 text-left transform -rotate-3 font-badhandwriting">
                        <h1 class="text-6xl font-semibold text-red-500 xs:text-7xl md:text-8xl">
                            <span class="text-gray-800">About</span>
                            Me
                        </h1>
                    </div>
                </div>
            </div>
        </header>
        <div class="mx-auto sm:px-6 lg:px-8">
            <div class="flex flex-col px-4 lg:px-0">
                <div class="flex flex-col lg:flex-row">
                    <div class="flex flex-col w-full mb-4 space-y-2 lg:w-1/3 lg:mb-0">
                        <h1 class="mb-4 text-3xl font-bold text-gray-700 lg:text-5xl font-protogrotesk">
                            {{ config('auth.admin.name') }}
                        </h1>
                        <span class="font-sans text-2xl font-semibold text-gray-800">Years in web development:
                            <span class="text-xl text-gray-600"> 16</span>
                        </span>
                        <span class="font-sans text-2xl font-semibold text-gray-800">Started with:
                            <span class="text-xl text-gray-600"> Coldfusion</span>
                        </span>
                        <span class="font-sans text-2xl font-semibold text-gray-800">Current:
                            <span class="text-xl text-gray-600"> PHP(Laravel), Vue, Livewire, Alpinejs</span>
                        </span>
                    </div>
                    <img src="/img/clay_kim.jpg" class="object-cover w-48 border-4 rounded-md shadow-md border-red-500/75" />
                </div>
                <p class="mt-8 font-sans text-xl text-gray-600">
                    I've started this blog to track my experiences and to have a place to log what I'm learning. So this is more of a tool for me than anything else. However, maybe I'll write something that can be useful to others. Either way, I'm excited about what is to come.
                </p>
            </div>
        </div>
    </div>
</x-app-layout>
