<?php

namespace App\Providers;

use Illuminate\Support\Facades\Blade;
use Illuminate\Support\ServiceProvider;
use App\Providers\TelescopeServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        if ($this->app->isLocal()) {
            $this->app->register(TelescopeServiceProvider::class);
        }
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        Blade::directive('ditto', function($expression) {
            $opening_tag = '<span class="ditto-mark">';
            $closing_tag = '</span>';

            // Replace the given word with ditto marks
            return "{$opening_tag}<?php echo $expression; ?>{$closing_tag}";
        });

        Blade::directive('spacer', function($expression) {
            $opening_tag = '<span class="spacer">';
            $closing_tag = '</span>';

            // Replace the given word with a space of the same size
            return "{$opening_tag}<?php echo $expression; ?>{$closing_tag}";
        });

        Blade::directive('right', function($expression) {
            $opening_tag = '<span class="right-align">';
            $closing_tag = '</span>';

            // Apply a class to the expression to align it to the right
            return "{$opening_tag}<?php echo $expression; ?>{$closing_tag}";
        });
    }
}
