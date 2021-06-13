<x-app-layout>
    <div class="px-6 py-12 mx-auto lg:px-0 max-w-7xl">
        <header id="up" class="relative h-24 mx-auto bg-fixed bg-center bg-no-repeat bg-cover md:px-12 xl:px-0 md:h-48">
            <!-- Overlay Background + Center Control -->
            <div class="flex justify-start h-20 md:h-40">
                <div>
                    <img src="/img/about_me.png" class="w-auto h-16 ml-8 transition duration-1000 ease-in-out transform scale-125 lg:ml-0" />
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
    {{-- @push('scripts')
        <script>
            var elem = document.getElementById('page-header');
            elem.classList.add('transform');
            elem.classList.add('scale-0');
            setTimeout(scaleUp, 1000);
            function scaleUp () {
                elem.classList.remove('scale-0');
                elem.classList.add('scale-100');
            }
        </script>
    @endpush --}}
</x-app-layout>
