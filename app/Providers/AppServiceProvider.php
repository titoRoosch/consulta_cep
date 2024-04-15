<?php

namespace App\Providers;

use App\Services\ExternalApiServiceClass;
use App\Services\ExternalApiServiceInterface;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        $this->app->bind(ExternalApiServiceInterface::class, ExternalApiServiceClass::class);
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        //
    }
}
