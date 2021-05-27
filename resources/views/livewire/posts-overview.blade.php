<div class-"flex flex-col">
    @if($posts && $posts->count())
        <div class="flex flex-col mb-2 showdow lg:grid lg:grid-cols-6 lg:gap-4">
            @foreach ($posts as $post)
                <x-post :post="$post" :loop="$loop" :page="$page"/>
            @endforeach
        </div>
        <div class="flex justify-end w-full">
            {{ $posts->links() }}
        </div>
    @endif
</div>
