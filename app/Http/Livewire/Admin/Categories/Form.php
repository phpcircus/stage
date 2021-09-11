<?php

namespace App\Http\Livewire\Admin\Categories;

use App\Models\Category;
use Livewire\Component;
use Livewire\WithFileUploads;

class Form extends Component
{
    use WithFileUploads;

    /** @var \App\Models\Category|null */
    public $category;

    /** @var string */
    public $name;

    /** @var string */
    public $color = '';

    /** @var bool */
    public $updatingCategory;

    /** @var array */
    protected $rules = [
        'name' => ['string', 'max:25'],
    ];

    /**
     * Render the component.
     *
     * @return \Illuminate\View\View
     */
    public function render()
    {
        return view('livewire.admin.categories.form');
    }

    /**
     * Mount the component.
     *
     * @return void
     */
    public function mount(Category $category)
    {
        $this->category = $category;
        $this->updatingCategory = $category->id ? true : false;

        if ($this->updatingCategory) {
            $this->setFields();
        }
    }

    /**
     * Cancel creating or updating a Category.
     *
     * @return mixed
     */
    public function cancel()
    {
        return redirect()->route('admin.categories');
    }

    /**
     * Set the form fields for editing a Post.
     */
    public function setFields(): void
    {
        $this->name = $this->category->name;
        $this->color = $this->category->color;
    }

    /**
     * Save the Post.
     *
     * @return \Illuminate\Http\RedirectResponse
     */
    public function save()
    {
        $this->validate();

        if (! $this->category->id) {
            Category::create([
                'name' => $this->name,
                'color' => $this->color,
            ]);
        } else {
            $this->category->update([
                'name' => $this->name,
                'color' => $this->color,
            ]);
        }

        request()->session()->flash('banner.message', 'Category saved successfully!');
        request()->session()->flash('banner.style', 'success');
        request()->session()->flash('banner.time', 3000);

        return redirect()->route('admin.categories');
    }
}
