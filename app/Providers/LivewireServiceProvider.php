<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Livewire\Component;

class LivewireServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        Component::macro('notify', function ($message) {
            /** @var \Livewire\Component */
            $component = $this;
            $component->dispatchBrowserEvent('banner-message', $message);
        });
    }
}
