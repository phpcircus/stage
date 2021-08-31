<?php

namespace App\Http\Livewire\Admin\Categories;

use App\Http\Livewire\ConfirmsActionsComponent;
use App\Models\Category;
use Livewire\WithPagination;

class Table extends ConfirmsActionsComponent
{
    use WithPagination;

    /** @var \App\Models\Category|null */
    public $workingCategory;

    /** @var array */
    public $listeners = [
        'category-updated' => '$refresh',
        'cancelModal',
    ];

    /**
     * Render the component.
     *
     * @return \Illuminate\View\View
     */
    public function render()
    {
        return view('livewire.admin.categories.table', [
            'categories' => Category::get(),
        ]);
    }

    /**
     * Delete the category.
     */
    public function deleteCategory(): void
    {
        if ($category = Category::where('uuid', $this->confirmableId)->first()) {
            $this->workingCategory = $category;
            $this->workingCategory->delete();
            $this->notify([
                'style' => 'success',
                'message' => 'Category successfully deleted!',
                'time' => 2500,
            ]);
            $this->emitSelf('category-updated');
        } else {
            $this->notify([
                'style' => 'danger',
                'message' => 'Error deleting category. Please try again later.',
                'time' => 3000,
            ]);
        }

        $this->workingCategory = null;

        $this->dispatchBrowserEvent('scrollToTop');
    }
}
