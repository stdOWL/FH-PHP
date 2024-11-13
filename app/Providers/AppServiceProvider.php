<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        $this->app->bind(
            \App\Services\Contracts\AuthService::class,
            \App\Services\RPDPaymentAuthService::class
        );

        $this->app->bind(
            \App\Services\Contracts\TransactionService::class,
            \App\Services\RPDTransactionService::class
        );
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        //
    }
}
