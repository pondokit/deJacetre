<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Views\Composers\NavigationComposer;
use App\Views\Composers\CustomComposer;
use App\Views\Composers\GlobalComposer;
use App\Views\Composers\CommentComposer;

class ComposerServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        view()->composer('layouts.sidebar', NavigationComposer::class);
        view()->composer('blog.slider', CustomComposer::class);
        view()->composer('layouts.main', GlobalComposer::class);
        view()->composer('layouts.backend.navbar', CommentComposer::class);
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
