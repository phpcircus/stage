<div class-"flex flex-col">
    @if($posts && $posts->count())
        <div class="flex flex-col showdow lg:grid lg:grid-cols-6 lg:gap-4">
            @foreach ($posts as $post)
                <x-post :post="$post" :loop="$loop"/>
            @endforeach
        </div>
        <div class="flex justify-between w-1/2">
            {{ $posts->links() }}
        </div>
    @endif
</div>
