<?php

namespace App\Providers;

use App\Services\Contract\ApiServiceInterface;
use App\Services\Contract\FetchDataServiceInterface;
use App\Services\Implement\ApiService;
use App\Services\Implement\FetchDataService;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //service
        $this->app->bind(ApiServiceInterface::class, ApiService::class);
        $this->app->bind(FetchDataServiceInterface::class, FetchDataService::class);
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        //
    }
}
