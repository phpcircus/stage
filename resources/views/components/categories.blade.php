@props(['categories'])

@if ($categories)
    <div class="flex flex-wrap items-center space-y-1">
        @foreach ($categories as $category)
            <a href="@route('posts', ['category' => $category->name])" class="mr-2 border border-transparent py-1 md:py-[.35rem] px-2 md:px-4 bg-{{ $category->color }} rounded-full uppercase text-[length:.63rem] font-bold font-coda text-white
                hover:bg-transparent hover:border-{{ $category->color }} hover:text-{{ $category->color }} shadow-md shadow-{{ $category->color }}/50 dark:shadow-none">
                {{ $category->name }}
            </a>
        @endforeach
    </div>
@endif
