<?php

declare(strict_types=1);

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

final class AppServiceProvider extends ServiceProvider
{
    public function register(): void
    {
        //
    }

    public function boot()
    {
        $this->configureTelescope();
    }

    public function configureTelescope() : void
    {
        if ($this->app->environment('local') && class_exists(\Laravel\Telescope\TelescopeServiceProvider::class)) {
              $this->app->register(\Laravel\Telescope\TelescopeServiceProvider::class);
              $this->app->register(TelescopeServiceProvider::class);
        }
    }
}
