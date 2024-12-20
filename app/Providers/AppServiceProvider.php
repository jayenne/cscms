<?php

namespace App\Providers;

use Blade;
use Illuminate\Support\ServiceProvider;
use Carbon\Carbon;
use Schema;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
		Schema::defaultStringLength(191);

    }

    /**
     * Register any application services.
     *
     * @return void
     */
     
    public function register()
    {
        //
        $this->app->bind('path.public', function() {
            return base_path('../'.config('app.public_url'));
        });
    }
}
