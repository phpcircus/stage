@props(['trix' => false])
<div class="flex rounded-md shadow-sm">
    <textarea {{ $attributes->merge([
        'rows' => 3,
        'class' => 'rounded-md block w-full transition duration-150 ease-in-out form-textarea sm:text-sm sm:leading-5',
    ]) }} tabindex="0"></textarea>
</div>
