<?php

namespace App\Http\Livewire\Admin\Posts;

use App\Models\Post;
use Livewire\Component;
use Livewire\WithFileUploads;

class Form extends Component
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

    public $primaryImage;

    /** @var bool */
    public $active;

    /** @var string */
    public $published_at;

    /** @var array */
    protected $rules = [
        'title' => 'string,max:200',
        'summary' => 'string,max:1000',
        'body' => 'string',
        'active' => 'boolean',
        'published_at' => 'nullable,date',
        'primaryImage' => 'nullable|image|max:2000',
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
    public function mount(?Post $post = null)
    {
        $this->post = $post ?? resolve(Post::class);
    }

    /**
     * Save the Post.
     */
    public function save(): void
    {
        $this->validate();

        $this->primaryImage->store('images');

        $this->emitSelf('notify-saved');

        dd('wtf');
    }
}
