@props(['categories'])

@if ($categories)
    <div class="flex flex-wrap items-center">
        @foreach ($categories as $category)
            <a href="{{ route('posts', ['category' => $category->name]) }}" class="mr-2 border border-transparent py-[.35rem] px-4 bg-{{ $category->color }} rounded-full uppercase text-[length:.63rem] font-bold font-coda text-white
                hover:bg-transparent hover:border-{{ $category->color }} hover:text-{{ $category->color }}">
                {{ $category->name }}
            </a>
        @endforeach
    </div>
@endif
