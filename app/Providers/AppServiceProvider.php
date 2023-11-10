<?php

namespace App\Providers;

use App\Services\LotoService;
use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;


class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
        $this->app->bind(LotoService::class, function ($app) {
            return new LotoService();
        });
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        // Torna a variável disponível para ser utilizada em todas as views
        View::share('loto74', '(Loto74)');
    }
}
