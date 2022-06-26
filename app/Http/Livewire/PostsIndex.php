<?php

namespace App\Http\Livewire;

use App\Models\Category;
use App\Models\Post;
use Livewire\Component;
use Livewire\WithPagination;

class PostsIndex extends Component
{
    use WithPagination;

    /** @var string */
    public $search = '';

    /** @var \App\Models\Category|null */
    public $category;

    /** @var array */
    protected $queryString = [
        'search' => ['except' => ''],
        'category' => [
            'except' => [
                null,
                '',
            ],
        ],
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
        $posts = $this->search();

        return view('livewire.posts-index', [
            'posts' => $posts,
            'categories' => Category::get(),
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
        $this->dispatchBrowserEvent('scrollToTop');
    }

    /**
     * Move to the next page.
     */
    public function nextPage(): void
    {
        $this->setPage($this->page + 1);
        $this->dispatchBrowserEvent('scrollToTop');
    }

    /**
     * Search for Posts.
     *
     * @return mixed
     */
    public function search()
    {
        $category = $this->category ? $this->category : request()->input('category');

        match ($category) {
            'all' => $this->category = null,
            default => $this->category = $category,
        };

        $posts = Post::with('categories');

        if ($this->category) {
            $posts = $posts->whereHas('categories', function ($query) {
                return $query->where('name', '=', $this->category);
            });
        }
        if ($this->search) {
            $posts = $posts->where(function ($query) {
                return $query->where('title', 'LIKE', '%'.$this->search.'%')
                        ->orWhere('summary', 'LIKE', '%'.$this->search.'%')
                        ->orWhere('body', 'LIKE', '%'.$this->search.'%');
            });
        }

        return $posts->published()->orderBy('published_at', 'desc')->paginate(10);
    }

    /**
     * Reset the search and category properties.
     */
    public function resetSearch(): void
    {
        $this->search = '';
        $this->category = null;
    }
}
