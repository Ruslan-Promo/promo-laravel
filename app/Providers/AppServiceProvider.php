<?php

namespace App\Providers;

use App\Contracts\PolicyCheckServiceInterface;
use App\Services\PolicyCheckService;
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
        $this->app->singleton(PolicyCheckServiceInterface::class, function ($app) {
            return new PolicyCheckService();
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
