<?php

namespace App\Http\Livewire;

use App\Models\Post;
use Livewire\Component;
use Livewire\WithPagination;

class PostsOverview extends Component
{
    use WithPagination;

    /** @var string */
    protected $paginationTheme = 'simple-tailwind';

    /**
     * Render the component.
     *
     * @return \Illuminate\View\View
     */
    public function render()
    {
        $featured = Post::published()->orderBy('published_at', 'desc')->first();
        if ($featured) {
            $posts = Post::published()->where('id', '!=', $featured->id)->orderBy('published_at', 'desc')->paginate(8);
        } else {
            $posts = null;
        }

        return view('livewire.posts-overview', [
            'featured' => $featured,
            'posts' => $posts,
            'page' => request()->input('page'),
        ]);
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
