@props([ 'categories'])

@if($categories)
    <div class="flex flex-wrap mb-2 -mx-2">
        @foreach($categories as $category)
            <div x-data class="flex items-center mx-2 mb-2">
                <a href="{{ route('posts', [ 'category' => $category->name ]) }}">
                    <span class="border border-transparent py-[.35rem] px-4 bg-{{ $category->color }} rounded-full leading-3 uppercase inline-block text-[length:.63rem] font-bold font-coda text-white
                        hover:bg-transparent hover:border-{{$category->color }} hover:text-{{$category->color }}">
                        {{ $category->name }}
                    </span>
                </a>
            </div>
        @endforeach
    </div>
@endif