<?php

namespace App\Providers;

use App\Services\Contract\ApiServiceInterface;
use App\Services\Implement\ApiService;
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
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        //
    }
}
