<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Blade;

class DirectiveServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot()
    {



    }

    /**
     * Register the application services.
     *
     * @return void
     */
    public function register()
    {
        Blade::if('haslikes', function($article){

            return $article->reviews->likes();
        });

        Blade::if('hasmoreDislikesThenLikes', function($article){

            return $article->reviews->likes() < $article->reviews->dislikes();
        });
    }
}
