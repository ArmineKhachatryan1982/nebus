<?php

namespace App\Providers;

use App\Interfaces\ActivityInterface;
use App\Interfaces\BaseInterface;
use App\Interfaces\OrganizationInterface;
use App\Repositories\ActivityRepository;
use App\Repositories\BaseRepository;
use App\Repositories\OrganizationRepository;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        $this->app->bind(BaseInterface::class,BaseRepository::class);
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        $this->app->bind(OrganizationInterface::class,OrganizationRepository::class);
        $this->app->bind(ActivityInterface::class,ActivityRepository::class);
    }
}
