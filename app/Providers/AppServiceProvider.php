<?php

namespace App\Providers;

use App\Contracts\PolicyCheckServiceInterface;
use App\Contracts\NewsRepositoryInterface;
use App\Services\PolicyCheckService;
use App\Services\ElasticsearchService;
use Elasticsearch\Client;
use Elasticsearch\ClientBuilder;
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

        $this->app->bind(NewsRepositoryInterface::class, function ($app) {
            return new ElasticsearchService($app->make(Client::class));
        });

        $this->bindSearchClient();
    }

    private function bindSearchClient()
    {
        $this->app->bind(Client::class, function ($app) {
            return ClientBuilder::create()
                ->setHosts($app['config']->get('services.search.hosts'))
                ->build();
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
