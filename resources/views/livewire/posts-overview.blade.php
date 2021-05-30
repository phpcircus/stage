<div class="flex flex-col mt-2">
    <div class="flex flex-col mb-2 showdow lg:grid lg:grid-cols-6 lg:gap-4">
        @if($featured && ($page ==1 || $page == null))
            <x-featured-post :post="$featured" />
        @endif
        @if($posts && $posts->count() > 0)
            @foreach ($posts as $post)
                <x-post :post="$post" :loop="$loop" :page="$page"/>
            @endforeach
        @else
            <h1 class="w-full text-4xl text-gray-700 lg:col-span-6 font-protogrotesk">No Posts Found. 🙁 Check back later.</h1>
        @endif
    </div>
    <div class="flex justify-end w-full">
        {{ $posts ? $posts->links() : '' }}
    </div>
</div>
