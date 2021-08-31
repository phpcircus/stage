<x-app-layout>
    <div class="px-4 py-4 mx-auto sm:px-6 lg:px-8 max-w-7xl">
        <x-page-hero>
            <h1 id="page-title" class="text-4xl font-bold uppercase text-skin-quiet sm:text-6xl font-lemonmilk">About Me</h1>
        </x-page-hero>
        <div class="pb-6 mx-auto lg:pb-8">
            <div class="flex flex-col p-4 lg:p-6">
                <div x-data="{ show: false }" x-init="setTimeout(function(){ show = true; }, 500)"
                    class="flex flex-col lg:flex-row">
                    <div class="flex flex-col w-full mb-4 space-y-2 lg:w-1/3 lg:mb-0">
                        <h1 class="mb-4 text-3xl font-bold lg:text-5xl font-protogrotesk text-skin-quiet">
                            {{ config('auth.admin.name') }}
                        </h1>
                        <span class="font-sans text-2xl font-semibold text-skin-loud">
                            Years in web development:
                            <span class="text-xl text-skin-quiet">
                                16
                            </span>
                        </span>
                        <span class="font-sans text-2xl font-semibold text-skin-loud">
                            Started with:
                            <span class="text-xl text-skin-quiet">
                                Coldfusion
                            </span>
                        </span>
                        <span class="font-sans text-2xl font-semibold text-skin-loud">
                            Current:
                            <span class="text-xl text-skin-quiet">
                                PHP(Laravel), Vue, Livewire, Alpinejs
                            </span>
                        </span>
                    </div>
                    <img x-show="show" x-cloak src="/img/clay_kim.jpg"
                        class="object-cover object-bottom w-64 h-64 border-4 border-red-600 rounded-full shadow-md lg:ml-8"
                        x-transition:enter="transition ease-out duration-1000"
                        x-transition:enter-start="filter grayscale transform scale-0"
                        x-transition:enter-end="filter grayscale-0 transform scale-100" />
                </div>
                <p
                    class="mt-8 font-sans text-xl font-semibold leading-relaxed text-skin-base first-letter:font-solo first-letter:text-2xl first-letter:italic first-letter:text-skin-muted">
                    I've started this blog to track my experiences and to have a place to log what I'm learning. So
                    this is more of a tool for me than anything else. However, maybe I'll write something that can
                    be useful to others. Either way, I'm excited about what is to come.
                </p>
            </div>
        </div>
    </div>
</x-app-layout>
