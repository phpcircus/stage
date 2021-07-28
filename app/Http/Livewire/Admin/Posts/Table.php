<?php

namespace App\Http\Livewire\Admin\Posts;

use App\Models\Post;
use Livewire\Component;
use Livewire\WithPagination;

class Table extends Component
{
    /** @var bool */
    public $showDeleteConfirmation = false;

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
     * Show the delete confirmation modal.
     */
    public function showDeleteConfirmation($id): void
    {
        if ($post = Post::where('uuid', $id)->first()) {
            $this->workingPost = $post;
            $this->showDeleteConfirmation = true;
        }
    }

    /**
     * Delete the post.
     */
    public function deletePost(): void
    {
        $this->workingPost->delete();
        $this->showDeleteConfirmation = false;
        $this->notify([
            'style' => 'success',
            'message' => 'Post successfully deleted!',
            'time' => 3000,
        ]);

        $this->dispatchBrowserEvent('scrollToTop');
        $this->emitSelf('post-updated');
    }

    /**
     * Cancel the modal.
     */
    public function cancelModal(): void
    {
        $this->workingPost = null;
        $this->showDeleteConfirmation = false;
    }
}
