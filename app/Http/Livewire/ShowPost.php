<?php

namespace App\Http\Livewire;

use App\Models\Post;
use Livewire\Component;

class ShowPost extends Component
{
    public Post $post;

    /**
     * Render the component.
     *
     * @return \Illuminate\View\View
     */
    public function render()
    {
        return view('livewire.show-post');
    }

    /**
     * Mount the component.
     */
    public function mount(Post $post): void
    {
        $this->post = $post;
    }
}
