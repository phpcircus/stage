<div class="flex flex-col p-4 space-y-4 rounded-lg shadow-md lg:p-6 bg-skin-fill-mantle">
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
                        <x-button.secondary wire:click="search" x-cloak class="text-gray-800 bg-gray-200 border-gray-300 shadow hover:shadow-none hover:border-transparent hover:text-gray-400 dark:border-gray-300 dark:text-gray-300 dark:bg-gray-800 dark:hover:border-gray-400 dark:hover:text-gray-400">
                            Search
                        </x-button.secondary>
                        <x-button.link wire:click="resetSearch" class="ml-auto hover:text-gray-400 dark:text-gray-300 dark:hover:text-gray-400">
                            Clear
                        </x-button.link>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <ul class="pt-0 mb-2 font-sans divide-y-2 lg:pt-6 divide-gray-400/90 dark:divide-gray-400">
        @forelse($posts as $post)
            <li class="pt-4 mb-4 first:pt-0">
                <a href="{{ route('posts.show', $post->slug) }}" class="block">
                    <div class="pt-2 mb-4">
                        <div class="flex flex-col items-start justify-between mb-4 md:mb-0 md:items-center md:flex-row">
                            <p class="text-2xl font-bold text-gray-800 whitespace-normal overflow-wrap dark:text-gray-300">
                                {{ $post->title }}
                            </p>
                        </div>
                        <div class="flex flex-wrap mb-2 space-x-2">
                            @foreach($post->categories as $category)
                                <div class="flex {{ $loop->first ? '!-ml-0' : '' }}">
                                    <a href="{{ route('posts', [ 'category' => $category->name ]) }}">
                                        <span class="inline-block pb-1 pt-1.5 mb-2 text-sm font-coda leading-4 text-gray-700 border-b-2 border-transparent
                                            hover:text-red-500 dark:text-gray-500 dark:hover:text-red-400/[.75]">
                                            {{ $category->name }}
                                        </span>
                                    </a>
                                    @if(! $loop->last)
                                        <span class="text-red-400 dark:text-red-400/[.75] ml-2">/</span>
                                    @endif
                                </div>
                            @endforeach
                        </div>
                        <div class="flex flex-col items-center justify-between md:flex-row">
                            <div class="flex flex-col justify-between w-full mt-2 md:flex-row">
                                <p class="w-4/5 mb-4 text-lg text-gray-600 whitespace-normal md:mb-0 dark:text-gray-400">
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
