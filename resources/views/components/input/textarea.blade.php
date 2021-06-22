@props(['trix' => false])
<div class="flex rounded-md shadow-sm">
    <textarea {{ $attributes->merge([
        'rows' => 3,
        'class' => 'rounded-md border border-gray-300 block w-full transition duration-150 ease-in-out form-textarea sm:text-sm sm:leading-5 focus:border-transparent focus:outline-none focus:ring-2 focus:ring-indigo-500 dark:ring-indigo-300',
    ]) }} tabindex="0"></textarea>
</div>
