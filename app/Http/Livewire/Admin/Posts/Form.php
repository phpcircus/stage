<?php

namespace App\Http\Livewire\Admin\Posts;

use App\Http\Livewire\Components\Modal;
use App\Models\Post;
use Livewire\WithFileUploads;

class Form extends Modal
{
    use WithFileUploads;

    /** @var \App\Models\Post|null */
    public $model;

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

    /** @var array */
    protected $rules = [
        'title' => ['string', 'max:200'],
        'summary' => ['string', 'max:1000'],
        'body' => ['string'],
        'published_at' => ['nullable', 'date'],
        'primaryImage' => ['nullable', 'image', 'max:2000'],
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
     * When modal is hidden, reset the properties.
     */
    public function updatedShow($value): void
    {
        if (false === $value) {
            $this->reset();
        }
    }

    /**
     * Set the form fields for editing a Post.
     */
    public function setFields(Post $post): void
    {
        $this->title = $post->title;
        $this->summary = $post->summary;
        $this->body = $post->body;
        $this->published_at = $post->published_at ? $post->published_at->format('m/d/Y') : '';
        $this->primaryImageUrl = $post->primary_image;
    }

    /**
     * Save the Post.
     */
    public function save(): void
    {
        $this->validate();

        $primaryImage = $this->handlePrimaryImage();
        $published_at = $this->published_at ? $this->published_at : null;

        if (! $this->model->uuid) {
            request()->user()->posts()->create([
                'title' => $this->title,
                'summary' => $this->summary,
                'body' => $this->body,
                'published_at' => $published_at,
                'primary_image' => $primaryImage,
            ]);
        } else {
            $this->model->update([
                'title' => $this->title,
                'summary' => $this->summary,
                'body' => $this->body,
                'published_at' => $published_at,
                'primary_image' => $primaryImage,
            ]);
        }

        $this->notify(['success', 'Success', 'Post saved!', 2500]);
        $this->emit('post-updated');
        $this->show = false;
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
