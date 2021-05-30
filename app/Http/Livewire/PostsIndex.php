<?php

namespace App\Http\Livewire;

use App\Models\Post;
use Livewire\Component;
use Livewire\WithPagination;

class PostsIndex extends Component
{
    use WithPagination;

    /** @var string */
    public $search = '';

    /** @var array */
    protected $queryString = [
        'search' => ['except' => ''],
    ];

    /** @var string */
    protected $paginationTheme = 'simple-tailwind';

    /**
     * Render the component.
     *
     * @return \Illuminate\View\View
     */
    public function render()
    {
        if ($this->search) {
            $posts = Post::search($this->search)->paginate(10);
        } else {
            $posts = Post::published()->orderBy('published_at', 'desc')->paginate(10);
        }

        return view('livewire.posts-index', [
            'posts' => $posts,
        ]);
    }

    /**
     * Reset to first page when search if performed.
     */
    public function updatingSearch(): void
    {
        $this->resetPage();
    }

    /**
     * Move to the previous page.
     */
    public function previousPage(): void
    {
        $this->setPage(max($this->page - 1, 1));
        $this->dispatchBrowserEvent('paginationChanged');
    }

    /**
     * Move to the next page.
     */
    public function nextPage(): void
    {
        $this->setPage($this->page + 1);
        $this->dispatchBrowserEvent('paginationChanged');
    }
}
