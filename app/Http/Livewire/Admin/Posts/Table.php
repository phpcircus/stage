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
            $this->workingPost->delete();
            $this->notify([
                'style' => 'success',
                'message' => 'Post successfully deleted!',
                'time' => 2500,
            ]);
            $this->emitSelf('post-updated');
        } else {
            $this->notify([
                'style' => 'danger',
                'message' => 'Error deleting post. Please try again later.',
                'time' => 3000,
            ]);
        }

        $this->workingPost = null;
        $this->confirmableId = '';

        $this->dispatchBrowserEvent('scrollToTop');
    }
}
