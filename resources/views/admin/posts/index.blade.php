<x-layouts.admin.page>
    <x-slot name="header">
        {{ ucfirst(Str::after(request()->route()->uri, '/')) }}
    </x-slot>
    <livewire:admin.posts.table key="posts-table-component" />
    <livewire:admin.posts.form key="post-form-component" />

    @push('scripts')
        <script>
            document.addEventListener("trix-initialize", function(event) {
                var elementButtons = event.target.toolbarElement.querySelectorAll("button");

                for (i=0; i<elementButtons.length; i++) {
                    elementButtons[i].tabIndex = -1 ;
                }
            })
        </script>
    @endpush
</x-layouts.admin.page>