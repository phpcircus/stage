<div class="flex flex-col">
    <div class="flex flex-col mb-2 showdow lg:grid lg:grid-cols-6 lg:gap-4">
        @if($featured && ($page ==1 || $page == null))
            <x-featured-post :post="$featured" />
        @endif
        @if($posts->count() > 0)
            @foreach ($posts as $post)
                <x-post :post="$post" :loop="$loop" :page="$page"/>
            @endforeach
        @endif
    </div>
    <div class="flex justify-end w-full">
        {{ $posts->links() }}
    </div>
</div>
