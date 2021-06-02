<x-layouts.admin.page>
    <x-slot name="header">
        New Category
    </x-slot>
    <livewire:admin.categories.form :category="resolve(App\Models\Category::class)" key="categories-form-component" />
</x-layouts.admin.page>