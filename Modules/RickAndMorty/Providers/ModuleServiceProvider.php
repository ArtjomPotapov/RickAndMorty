<?php

namespace ThePotapov\Modules\RickAndMorty\Providers;

use Illuminate\Support\ServiceProvider;
use ThePotapov\Modules\RickAndMorty\Services\ApiSettings;
use ThePotapov\Modules\RickAndMorty\Services\PostApiClient;
use ThePotapov\Modules\RickAndMorty\Services\PostService;

class ModuleServiceProvider extends ServiceProvider
{
    public function boot()
    {
        $this->app->singleton(PostApiClient::class, function () {
            $settings = new ApiSettings(config('services.rick_and_morty.url'));

            return new PostApiClient($settings);
        });

        $this->app->singleton('PostApi', PostService::class);
    }

    public function register()
    {
        $app = $this->app;

        $app->register(RouteServiceProvider::class);
    }
}