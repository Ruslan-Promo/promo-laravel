<?php

namespace App\Providers;

use App\Contracts\PromoPdfServiceInterface;
use App\Services\PromoPdfService;
use Illuminate\Support\ServiceProvider;

class PromoPdfServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind(PromoPdfServiceInterface::class, function ($app) {
            return new PromoPdfService();
          });
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }
}
