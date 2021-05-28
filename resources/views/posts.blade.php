<x-app-layout>
    <div class="py-12">
        <header id="up" class="relative w-3/4 mx-auto bg-fixed bg-center bg-no-repeat bg-cover h-60">
            <!-- Overlay Background + Center Control -->
            <div class="flex items-center justify-start h-48">
                <div>
                    <div class="mx-2 text-left transform -rotate-3 font-badhandwriting">
                        <h1 class="text-6xl font-semibold text-red-500 xs:text-7xl md:text-8xl">
                            <span class="text-gray-800">My</span>
                            Posts
                        </h1>
                    </div>
                </div>
            </div>
        </header>
        <div class="mx-auto max-w-7xl sm:px-6 lg:px-8">
            <livewire:posts-index />
        </div>
    </div>
</x-app-layout>
