<div class="flex flex-col space-y-4">
    <div class="flex w-full xl:w-1/2">
        <div class="flex flex-col w-full md:items-center md:flex-row">
            <div class="w-full mb-2 mr-4 md:w-2/3 md:mb-0">
                <x-input.text wire:keydown.enter="search" wire:model.defer="search" id="search">
                    <x-slot name="leadingAddOn">
                        <x-input.select wire:model.defer="category" id="category" class="border-none focus:ring-0">
                            <option wire:click="$set('category', '')" value="">All Categories</option>
                            @foreach($categories as $category)
                                <option wire:click="$set('category', {{$category->name}})">{{ $category->name }}</option>
                            @endforeach
                        </x-input.select>
                    </x-slot>
                </x-input.text>
            </div>
            <div class="flex items-center w-full space-x-2 md:w-1/3">
                <div class="w-1/2">
                    <x-button.secondary wire:click="search">
                        Search
                    </x-button.secondary>
                </div>
                <div class="w-1/2">
                    <x-button.link wire:click="resetSearch">
                        Clear
                    </x-button.link>
                </div>
            </div>
        </div>
    </div>
    <ul class="mb-2 font-sans divide-y divide-gray-200">
        @forelse($posts as $post)
            <li>
                <a href="{{ route('posts.show', $post->slug) }}" class="block">
                    <div class="pt-2 mb-4">
                        <div class="flex flex-col items-start justify-between mb-4 md:mb-0 md:items-center md:flex-row">
                            <p class="text-2xl font-medium text-gray-800 whitespace-normal overflow-wrap">
                                {{ $post->title }}
                            </p>
                        </div>
                        <div class="flex justify-start mb-2">
                            @foreach($post->categories as $category)
                                <a href="{{ route('posts', [ 'category' => $category->name ]) }}">
                                    <span
                                        class="inline-block py-0.5 px-2 mr-2 rounded bg-white text-gray-600 border border-gray-600 text-xs font-medium tracking-widest tag-wordpress">
                                        {{ $category->name }}
                                    </span>
                                </a>
                            @endforeach
                        </div>
                        <div class="flex flex-col items-center justify-between md:flex-row">
                            <div class="flex flex-col justify-between w-full mt-2 md:flex-row">
                                <p class="w-4/5 mb-4 text-lg text-gray-500 whitespace-normal md:mb-0">
                                    {{ $post->summary }}
                                </p>
                                <p class="text-sm text-gray-500">Published <time>{{ $post->published_at->diffForHumans() }}</time></p>
                            </div>
                        </div>
                    </div>
                </a>
            </li>
        @empty
            <li>
                <h1 class="w-full mt-4 text-3xl text-gray-700 lg:col-span-6 font-protogrotesk">No Posts Found. 🙁</h1>
            </li>
        @endforelse
    </ul>
    {{ $posts->links() }}
</div>
