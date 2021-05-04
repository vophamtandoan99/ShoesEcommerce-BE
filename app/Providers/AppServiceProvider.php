<?php

namespace App\Providers;

use Session;
use Illuminate\Support\ServiceProvider;
use App\Libraries\CartSession;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        // Session::extend('cart', function($app) {
        //     // Return implementation of SessionHandlerInterface...
        //     return new MongoSessionStore;
        // });
    }
}
