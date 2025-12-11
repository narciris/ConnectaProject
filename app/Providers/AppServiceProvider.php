<?php

namespace App\Providers;

use App\Repositories\Contracts\ContactInterfaceRespository;
use App\Repositories\EloquentImpl\EloquentContactRepository;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        $this->app->bind(ContactInterfaceRespository::class, EloquentContactRepository::class);
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
       

    }
}
