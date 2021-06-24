<?php

namespace App\Http\Livewire;

use App\Models\Post;
use Livewire\Component;

class NavMenuMain extends Component
{
    /**
     * Render the component.
     *
     * @return \Illuminate\View\View
     */
    public function render(Post $posts)
    {
        return view('livewire.nav-menu-main', [
            'hasNew' => $posts->hasNewPosts(),
            'newest' => $posts->published()->latest('published_at')->first()->published_at->format('Y-m-d'),
        ]);
    }
}
