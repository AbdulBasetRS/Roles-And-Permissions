<?php

namespace Abdulbaset\RolesAndPermissions\Providers;

use Illuminate\Support\ServiceProvider;

class RolesAndPermissionsServiceProvider extends ServiceProvider
{
    public function register(): void
    {
        $this->mergeConfigFrom(__DIR__.'/../Config/RolesAndPermissionsConfig.php', 'RolesAndPermissionsConfig');
    }

    public function boot(): void
    {
        $this->loadMigrationsFrom(__DIR__.'/../Migrations');
        $this->publishes([__DIR__.'/../Config/RolesAndPermissionsConfig.php' => config_path('RolesAndPermissionsConfig.php'),], 'RolesAndPermissionsConfig');
    }
}
