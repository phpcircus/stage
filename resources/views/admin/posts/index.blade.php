<x-layouts.admin.page>
    <x-slot name="header">
        {{ ucfirst(Str::after(request()->route()->uri, '/')) }}
    </x-slot>
    <livewire:admin.posts.table key="posts-table-component" />
    <livewire:admin.posts.form key="post-form-component" />
</x-layouts.admin.page>