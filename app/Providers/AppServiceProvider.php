<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        //gab recent posts
        view()->composer('frontend.sidebar',function($view){
         $view
             ->with('recentpost',\App\Post::grabRecentPosts())
             ->with('recentComments',\App\Post::grabRecentComments());
        });


    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }
}
