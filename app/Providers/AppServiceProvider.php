<?php

namespace App\Providers;

use Illuminate\Support\Facades\Gate;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        Gate::define('manage-posts', function ($user) {
           return $user->hasPermission('manage-posts');
        });
        Gate::define('manage-categories', function ($user) {
           return $user->hasPermission('manage-categories');
        });
        Gate::define('manage-discounts', function ($user) {
           return $user->hasPermission('manage-discounts');
        });
        Gate::define('manage-admins', function ($user) {
           return $user->hasPermission('manage-admins');
        });
        Gate::define('manage-roles', function ($user) {
           return $user->hasPermission('manage-roles');
        });
        Gate::define('manage-products', function ($user) {
           return $user->hasPermission('manage-products');
        });
        
    }
}
