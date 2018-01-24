<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Repositories\CheckAuthToken;
use App\Contracts\UserInterface;

class CheckAuthTokenServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }

    /**
     * Register the application services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->singleton(UserInterface::class,CheckAuthToken::class);
    }
}
