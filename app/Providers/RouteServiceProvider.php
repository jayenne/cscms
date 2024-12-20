<?php

namespace App\Providers;

use Illuminate\Support\Facades\Route;

use Illuminate\Foundation\Support\Providers\RouteServiceProvider as ServiceProvider;

use Auth;
use App\Models\Page;
use App\Models\PageBlock;

class RouteServiceProvider extends ServiceProvider
{
    /**
     * This namespace is applied to your controller routes.
     *
     * In addition, it is set as the URL generator's root namespace.
     *
     * @var string
     */
    protected $namespace = 'App\Http\Controllers';

    /**
     * Define your route model bindings, pattern filters, etc.
     *
     * @return void
     */
    public function boot()
    {
        //

        parent::boot();

        Route::bind('page', function ($value) {

            $prev = \Request::segment(1);
            $auth = Auth::check();

            if ($auth && is_numeric($value)) {

                $page = Page::findOrFail($value);
            } else if ($auth && $prev == 'preview') {

                // AUTH'D ONLY PREVIEW
                $page = Page::where([['slug', '=', $value]])->firstOrFail();
                $page->preview = true;
            } else {

                $page = Page::where([['slug', '=', $value], ['status', '=', '1'], ['published', '=', '1'], ['publish_on', '<=', date("Y-m-d H:i:s")], ['approved_on', '<=', date("Y-m-d H:i:s")]])->firstOrFail();
            }

            return $page;
        });
    }

    /**
     * Define the routes for the application.
     *
     * @return void
     */
    public function map()
    {
        $this->mapApiRoutes();

        $this->mapWebRoutes();

        //
    }

    /**
     * Define the "web" routes for the application.
     *
     * These routes all receive session state, CSRF protection, etc.
     *
     * @return void
     */
    protected function mapWebRoutes()
    {
        Route::middleware('web')
            ->namespace($this->namespace)
            ->group(base_path('routes/web.php'));
    }

    /**
     * Define the "api" routes for the application.
     *
     * These routes are typically stateless.
     *
     * @return void
     */
    protected function mapApiRoutes()
    {
        Route::prefix('api')
            ->middleware('api')
            ->namespace($this->namespace)
            ->group(base_path('routes/api.php'));
    }
}
