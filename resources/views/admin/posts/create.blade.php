<x-layouts.admin.page>
    <x-slot name="header">
        New Post
    </x-slot>
    <livewire:admin.posts.form :post="resolve(App\Models\Post::class)" key="posts-form-component" />

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