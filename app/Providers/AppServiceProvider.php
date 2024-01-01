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
        Gate::define('isAdmin', function ($user){
            return $user->user_level == 0;
        });

        Gate::define('isManager', function ($user){
            return $user->user_level == 1;
        });

        Gate::define('isDeveloper', function ($user){
            return $user->user_level == 2;
        });

        Gate::define('isPersonInCharge', function ($user){
            return $user->user_level == 3;
        });
    }
}
