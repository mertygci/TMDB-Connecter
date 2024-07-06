<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Blade;


class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    /*Created some blade directives for using images*/
    {
        Blade::directive('thumb_path', function ($expression) {
            return "<?php echo 'https://image.tmdb.org/t/p/w500/' . $expression; ?>";
        });

        Blade::directive('background_path', function ($expression) {
            return "<?php echo 'https://image.tmdb.org/t/p/original/' . $expression; ?>";
        });

        Blade::directive('still_path', function ($expression) {
            return "<?php echo 'https://image.tmdb.org/t/p/original/' . $expression; ?>";
        });
    }
}
