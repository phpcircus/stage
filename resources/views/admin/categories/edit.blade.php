<x-layouts.admin.page>
    <x-slot name="header">
        Edit Category
    </x-slot>
    <livewire:admin.categories.form :category="request()->route('category')" key="categories-form-component" />
</x-layouts.admin.page>