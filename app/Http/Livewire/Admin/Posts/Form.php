<?php

namespace App\Http\Livewire\Admin\Posts;

use App\Http\Livewire\Components\Modal;
use App\Models\Category;
use App\Models\Post;
use Livewire\WithFileUploads;

class Form extends Modal
{
    use WithFileUploads;

    /** @var \App\Models\Post|null */
    public $post;

    /** @var string */
    public $title;

    /** @var string */
    public $summary;

    /** @var string */
    public $body;

    /** @var \Illuminate\Http\UploadedFile */
    public $primaryImage;

    /** @var string */
    public $primaryImageUrl;

    /** @var string */
    public $published_at;

    /** @var mixed */
    public $categories;

    /** @var bool */
    public $updatingPost;

    /** @var array */
    public $selectedCategories = [];

    /** @var array */
    protected $rules = [
        'title' => ['string', 'max:200'],
        'summary' => ['string', 'max:1000'],
        'body' => ['string'],
        'published_at' => ['nullable', 'date'],
        'primaryImage' => ['nullable', 'image', 'max:2000'],
        'selectedCategories' => ['nullable', 'array'],
    ];

    /**
     * Render the component.
     *
     * @return \Illuminate\View\View
     */
    public function render()
    {
        return view('livewire.admin.posts.form');
    }

    /**
     * Mount the component.
     *
     * @return void
     */
    public function mount(Post $post)
    {
        $this->post = $post;
        $this->updatingPost = $post->id ? true : false;

        if ($this->updatingPost) {
            $this->setFields();
            $this->categories = Category::get()->map(function ($category) {
                return [
                    'id' => $category->id,
                    'name' => $category->name,
                    'selected' => $this->post->categories->contains($category),
                ];
            });
        } else {
            $this->categories = Category::get()->map(function ($category) {
                return [
                    'id' => $category->id,
                    'name' => $category->name,
                    'selected' => false,
                ];
            });
        }
    }

    /**
     * Cancel creating or updating a Post.
     *
     * @return mixed
     */
    public function cancel()
    {
        return redirect()->route('admin.posts');
    }

    /**
     * Set the form fields for editing a Post.
     */
    public function setFields(): void
    {
        $this->title = $this->post->title;
        $this->summary = $this->post->summary;
        $this->body = $this->post->body;
        $this->published_at = $this->post->published_at ? $this->post->published_at->format('m/d/Y') : '';
        $this->primaryImageUrl = $this->post->primary_image;
    }

    /**
     * Save the Post.
     */
    public function save(): void
    {
        $this->validate();

        $primaryImage = $this->handlePrimaryImage();
        $published_at = $this->published_at ? $this->published_at : null;

        if (! $this->post->id) {
            $post = request()->user()->posts()->create([
                'title' => $this->title,
                'summary' => $this->summary,
                'body' => $this->body,
                'published_at' => $published_at,
                'primary_image' => $primaryImage,
            ]);

            $post->categories()->sync($this->selectedCategories);
        } else {
            $this->post->update([
                'title' => $this->title,
                'summary' => $this->summary,
                'body' => $this->body,
                'published_at' => $published_at,
                'primary_image' => $primaryImage,
            ]);

            $this->post->categories()->sync($this->selectedCategories);
        }

        request()->session()->flash('notify.message', 'Post saved successfully!');
        request()->session()->flash('notify.title', 'Success!');
        request()->session()->flash('notify.type', 'success');

        redirect()->route('admin.posts');
    }

    /**
     * Handle the primary_image property for the Post.
     */
    protected function handlePrimaryImage(): string
    {
        if ($this->primaryImage) {
            return '/' . $this->primaryImage->storePublicly('images');
        } elseif ($this->primaryImageUrl) {
            return $this->primaryImageUrl;
        } else {
            return '/img/lightbulb.png';
        }
    }
}
