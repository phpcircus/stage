<?php

namespace App\Providers;

use Illuminate\Support\Facades\Blade;
use Illuminate\Support\ServiceProvider;

class BladeServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        Blade::if('local', function () {
            return config('app.env') === 'local';
        });

        Blade::directive('route', function ($expression) {
            return "<?php echo route($expression); ?>";
        });
    }
}
