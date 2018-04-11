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
            $post=new \App\Post();
            $view
                ->with('recentpost',$post::grabRecentPosts())
                ->with('recentComments',$post::grabRecentComments())
                ->with('topCategories',\App\Category::topCategories())
                ->with('archieve',$post->postArchieve());
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
