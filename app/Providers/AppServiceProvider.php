<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\URL;

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
    {
        if($this->app->environment('production')) {
            URL::forceScheme('https');
        }

        // Create the view compiled path if it doesn't exist (needed for Vercel /tmp)
        $compiledPath = config('view.compiled');
        if (!is_dir($compiledPath)) {
            @mkdir($compiledPath, 0755, true);
        }
    }
}
