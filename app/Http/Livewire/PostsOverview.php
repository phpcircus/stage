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
        return view('livewire.posts-overview', [
            'posts' => Post::active()->orderBy('published_at', 'desc')->paginate(9),
            'page' => request()->input('page'),
        ]);
    }
}
