<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\WooCommerce\Client;
use App\WooCommerce\HttpClient\HttpClient;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        $this->app->singleton(Client::class, function ($app) {
            return new Client(new HttpClient);
        });
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        //
    }
}
