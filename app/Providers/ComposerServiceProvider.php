<?php

namespace App\Providers;

use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;

class ComposerServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        //

        View::Composer(
            'frontend.index',
            function ($view) {
                $view->with('pages', \App\Models\Page::defaultOrder()->get()->toTree());
            }
        );

        View::composer(
            'admin.users.*',
            'App\Http\ViewComposers\UserComposer'
        );

        View::composer(
            'admin.pages.*',
            'App\Http\ViewComposers\PageComposer'
        );

        View::composer(
            'admin.pages.edit',
            'App\Http\ViewComposers\PageBlockLibraryComposer'
        );
    }

    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        //
    }
}
