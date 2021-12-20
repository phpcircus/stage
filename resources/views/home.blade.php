<x-app-layout>
    <div x-data class="px-4 py-6 mx-auto sm:px-6 lg:px-8 max-w-7xl" >
        <x-page-hero class="h-36 md:h-60" height="h-32 md:h-56">
            <div class="relative z-10 md:flex md:items-center md:justify-evenly">
                <div class="h-36 md:h-56">
                    <h1 class="font-mono text-base font-black tracking-wide md:text-2xl xl:text-3xl 2xl:text-5xl text-slate-800 dark:text-slate-300">
                        I'm Clay<br>A Web Developer Who Loves<br>Laravel,Livewire,AlpineJS<br>and Tailwindcss
                    </h1>
                </div>

                <div x-data="cartoon" class="absolute md:relative bg-clip-border right-[40px] top-[110px] ws:top-[40px] md:right-[20px] md:top-[10px] lg:top-[40px] md:ml-4 ring-0 ws:ring-2 ws:ring-white ws:ring-offset-4 ws:ring-offset-slate-200 ws:dark:ring-offset-slate-600"
                     style="border-radius: 50%">
                    <img
                        x-ref="image"
                        src="/img/closed.jpg"
                        alt="Clayton Stone cartoon picture"
                        class="object-cover w-12 h-12 border-2 border-slate-100 ws:border-2 sm:w-20 sm:h-20 ws:w-24 ws:h-24 md:w-32 md:h-32 lg:w-48 lg:h-48"
                        style="border-radius: 50%"
                    >
                </div>
            </div>
        </x-page-hero>
        <div class="pb-6 mx-auto space-y-4 rounded-lg lg:pb-8">
            <livewire:posts-overview class="flex flex-col space-x-4 overflow-hidden shadow" />
        </div>
    </div>

    @push('scripts')
        <script>
            document.addEventListener('alpine:initializing', function () {
                Alpine.data('cartoon', () => ({
                    animate: false,
                    init() {
                        var elem = this.$refs.image;
                        setTimeout(function(){ elem.src = '/img/open.jpg'; }, 1000);
                        setTimeout(function(){ elem.src = '/img/closed.jpg'; }, 2000);
                    }
                }));
            });
        </script>
    @endpush
</x-app-layout>
