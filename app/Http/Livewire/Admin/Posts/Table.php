<?php

namespace App\Http\Livewire\Admin\Posts;

use App\Http\Livewire\ConfirmsActionsComponent;
use App\Models\Post;
use Livewire\WithPagination;

class Table extends ConfirmsActionsComponent
{
    use WithPagination;

    /** @var \App\Models\Post|null */
    public $workingPost;

    /** @var array */
    protected $listeners = [
        'post-updated' => '$refresh',
        'cancelModal',
    ];

    use WithPagination;

    /**
     * Render the component.
     *
     * @return \Illuminate\View\View
     */
    public function render()
    {
        return view('livewire.admin.posts.table', [
            'posts' => Post::latest()->paginate(10),
        ]);
    }

    /**
     * Delete the post.
     */
    public function deletePost(): void
    {
        if ($post = Post::where('uuid', $this->confirmableId)->first()) {
            $this->workingPost = $post;
            $this->showDeleteConfirmation = true;
            $this->workingPost->delete();
            $this->workingPost = null;

            $this->notify([
                'style' => 'success',
                'message' => 'Post successfully deleted!',
                'time' => 3000,
            ]);

            $this->dispatchBrowserEvent('scrollToTop');
            $this->emitSelf('post-updated');
        }
    }
}
