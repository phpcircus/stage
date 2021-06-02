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

    /** @var \App\Models\Category */
    public $category;

    /** @var array */
    protected $queryString = [
        'search' => ['except' => ''],
        'category' => ['except' => ''],
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

    /**
     * Search for Posts.
     *
     * @return mixed
     */
    public function search()
    {
        $category = $this->category ? $this->category : request()->input('category');

        if ($category && $category != 'all') {
            $this->category = $category;
        } else {
            $this->category = '';
        }

        if ($this->search) {
            $posts = Post::with('categories')->published()->orderBy('published_at', 'desc')
                ->where('title', 'like', '%' . $this->search . '%')
                ->orWhere('summary', 'like', '%' . $this->search . '%')
                ->orWhere('body', 'like', '%' . $this->search . '%');

            if ($this->category) {
                $posts = $posts->whereHas('categories', function ($query) {
                    return $query->where('name', $this->category);
                })->paginate(10);
            } else {
                $posts = $posts->paginate(10);
            }
        } else {
            $posts = Post::with('categories')->published()->orderBy('published_at', 'desc');

            if ($this->category) {
                $posts = $posts->whereHas('categories', function ($query) {
                    return $query->where('name', $this->category);
                })->paginate(10);
            } else {
                $posts = $posts->paginate(10);
            }
        }

        return $posts;
    }

    /**
     * Reset the search and category properties.
     */
    public function resetSearch(): void
    {
        $this->search = '';
        $this->category = '';
    }
}
