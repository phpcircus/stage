<?php

namespace App\Http\Livewire\Admin\Categories;

use App\Models\Category;
use Livewire\Component;
use Livewire\WithPagination;

class Table extends Component
{
    use WithPagination;

    /** @var \App\Models\Category|null */
    public $workingCategory;

    /** @var bool */
    public $showDeleteConfirmation = false;

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
     * Show the delete confirmation modal.
     */
    public function showDeleteConfirmation($id): void
    {
        if ($category = Category::where('uuid', $id)->first()) {
            $this->workingCategory = $category;
            $this->showDeleteConfirmation = true;
        }
    }

    /**
     * Delete the category.
     */
    public function deleteCategory(): void
    {
        $this->workingCategory->delete();
        $this->showDeleteConfirmation = false;
        $this->notify([
            'style' => 'success',
            'message' => 'Category successfully deleted!',
            'time' => 3000,
        ]);
        $this->emitSelf('category-updated');
    }

    /**
     * Cancel the modal.
     */
    public function cancelModal(): void
    {
        $this->workingCategory = null;
        $this->showDeleteConfirmation = false;
    }
}
