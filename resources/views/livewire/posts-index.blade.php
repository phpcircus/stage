<div class="flex flex-col space-y-4">
    <div class="flex w-full xl:w-1/2">
        <div class="flex flex-col w-full md:items-center md:flex-row">
            <div class="flex flex-col w-full mb-2 mr-4 space-y-2 md:mb-0">
                <x-input.select wire:model="category" id="category" class="w-full md:w-1/3">
                    <option wire:click="$set('category', '')" value="">All Categories</option>
                    @foreach($categories as $category)
                        <option wire:click="$set('category', {{$category->name}})">{{ $category->name }}</option>
                    @endforeach
                </x-input.select>
                <div class="flex flex-col items-center w-full md:flex-row">
                    <div class="w-full mb-2 md:w-2/3 md:mb-0">
                        <x-input.text wire:keydown.enter="search" wire:model.defer="search" id="search">
                            <x-slot name="leadingAddOn">
                                <x-heroicon-o-search class="w-5 text-gray-500" />
                            </x-slot>
                        </x-input.text>
                    </div>
                    <div class="flex w-full space-x-4 md:w-1/3 md:ml-2">
                        <x-button.secondary wire:click="search">
                            Search
                        </x-button.secondary>
                        <x-button.link wire:click="resetSearch" class="ml-auto">
                            Clear
                        </x-button.link>
                    </div>
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
                        <div class="flex flex-wrap justify-start mt-2 mb-2">
                            @foreach($post->categories as $category)
                                <a href="{{ route('posts', [ 'category' => $category->name ]) }}" class="group">
                                    <span
                                        class="group-hover:bg-blue-400 group-hover:text-white group-hover:border-transparent inline-block pb-1 pt-1.5 px-2 mr-2 mb-2 rounded bg-white text-blue-400 border border-blue-400 text-xs font-semibold tracking-widest font-protogrotesk leading-4">
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
