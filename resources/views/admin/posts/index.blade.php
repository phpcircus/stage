<x-layouts.admin.page>
    <x-slot name="primaryButton">
        <button type="button"
            class="inline-flex items-center px-4 py-2 ml-3 text-sm font-medium text-white bg-indigo-600 border border-transparent rounded-md shadow-sm hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
            New Post
        </button>
    </x-slot>
    <livewire:admin.posts.table />
</x-layouts.admin.page>