<?php

namespace App\Providers;

use Illuminate\Support\Collection;
use Illuminate\Support\ServiceProvider;

class MacroServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register()
    {
        $this->registerCollectionMacros();
    }

    /**
     * Register Collection macros.
     */
    private function registerCollectionMacros()
    {
        Collection::mixin(new \App\Macros\Collection);
    }
}
