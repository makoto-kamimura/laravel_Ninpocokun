<?php

namespace App\Providers;

use Illuminate\Foundation\Application;
use Illuminate\Cookie\Middleware\EncryptCookies;
use Illuminate\Contracts\Encryption\Encrypter;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->singleton(EncryptCookies::class, function (Application $app) {
            $middleware = new EncryptCookies($app->make(Encrypter::class));
            $middleware->disableFor('departments', 'divisions', 'name');
            return $middleware;
        });
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }
}