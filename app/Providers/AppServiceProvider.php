<?php

namespace App\Providers;

use App\Models\Contacts;
use App\Observers\CreatedContactObserver;
use App\Observers\DeleteContactObserver;
use App\Observers\UpdateContactObserver;
use App\Repositories\Contracts\ContactInterfaceRespository;
use App\Repositories\Contracts\NotificationInterfaceRepository;
use App\Repositories\EloquentImpl\EloquentContactRepository;
use App\Repositories\EloquentImpl\EloquentNotificationRepository;
use App\Repositories\Contracts\UserInterfaceRepository;
use App\Repositories\EloquentImpl\EloquentUserRepositoryImpl;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        $this->app->bind(ContactInterfaceRespository::class, EloquentContactRepository::class);
        $this->app->bind(NotificationInterfaceRepository::class,EloquentNotificationRepository::class);
        $this->app->bind(UserInterfaceRepository::class,EloquentUserRepositoryImpl::class);
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
      Contacts::observe(CreatedContactObserver::class);
      Contacts::observe(DeleteContactObserver::class);
      Contacts::observe(UpdateContactObserver::class);

    }
}
