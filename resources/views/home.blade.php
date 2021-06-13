<x-app-layout>
    <div class="px-6 py-8 mx-auto lg:px-0 max-w-7xl lg:py-12">
        <x-hero />
        <div class="mx-auto sm:px-6 lg:px-8">
            <livewire:posts-overview class="flex flex-col space-x-4 overflow-hidden shadow" />
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
