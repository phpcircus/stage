@props([
    'title' => __('Confirm Action'),
    'content' => __('For your security, please confirm this action to continue.'),
    'button' => __('Confirm'),
    'action' => '',
    'id' => '',
])

@php
    $uid = md5($action.$id);
@endphp

<span
    {{ $attributes->wire('then') }}
    x-data
    x-ref="span"
    x-on:click="$wire.startConfirmingAction('{{ $id }}', '{{ $action }}', '{{ $uid }}')"
    x-on:action-confirmed.window="setTimeout(() => $event.detail.uid === '{{ $uid }}' && $refs.span.dispatchEvent(new CustomEvent('then', { bubbles: false })), 250);"
>
    {{ $slot }}
</span>

@once
<x-jet-dialog-modal wire:model="confirmingAction">
    <x-slot name="title">
        {{ $title }}
    </x-slot>

    <x-slot name="content">
        {{ $content }}
    </x-slot>

    <x-slot name="footer">
        <x-jet-secondary-button wire:click="stopConfirmingAction" wire:loading.attr="disabled">
            {{ __('Cancel') }}
        </x-jet-secondary-button>

        <x-jet-button class="ml-2" wire:click="confirmAction" wire:loading.attr="disabled">
            {{ $button }}
        </x-jet-button>
    </x-slot>
</x-jet-dialog-modal>
@endonce
