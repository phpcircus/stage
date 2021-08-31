@props(['for'])

@error($for)
    <p {{ $attributes->merge(['class' => 'text-sm text-red-500 p-2 rounded-sm']) }}>{{ $message }}</p>
@enderror
