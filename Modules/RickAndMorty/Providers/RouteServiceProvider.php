<?php

namespace ThePotapov\Modules\RickAndMorty\Providers;

use Illuminate\Foundation\Support\Providers\RouteServiceProvider as ServiceProvider;
use Illuminate\Routing\Router;
use Illuminate\Support\Facades\Route;
use ThePotapov\Modules\RickAndMorty\Http\Controllers\PublicApiController;

class RouteServiceProvider extends ServiceProvider
{
    public function map()
    {
        Route::prefix('api')->group(function (Router $route) {
            $route->get('/characters', [PublicApiController::class, 'characters'])
                ->name('characters');
            $route->get('/characters/{id}', [PublicApiController::class, 'details'])
                ->name('details');
        });
    }
}