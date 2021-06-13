<x-app-layout>
    <div class="px-6 py-12 mx-auto lg:px-0 max-w-7xl">
        <header id="up" class="relative h-24 mx-auto bg-fixed bg-center bg-no-repeat bg-cover md:px-12 xl:px-0 md:h-48">
            <!-- Overlay Background + Center Control -->
            <div class="flex justify-start h-20 md:h-40">
                <div>
                    <img id="page-title" src="/img/my_projects.png" class="transition-transform duration-500 ease-out transform scale-100 h-18" />
                </div>
            </div>
        </header>
        <div class="mx-auto sm:px-6 lg:px-8">

        </div>
    </div>
    @push('scripts')
        <script>
            var elem = document.getElementById('page-title');
            elem.classList.remove('scale-100');
            elem.classList.add('scale-105');
            setTimeout(function(){
                elem.classList.remove('scale-105');
                elem.classList.add('scale-100');
             }, 500);
        </script>
    @endpush
</x-app-layout>
