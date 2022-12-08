<?php

namespace App\Providers;

use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Gate;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The policy mappings for the application.
     *
     * @var array
     */
    protected $policies = [
        // 'App\Model' => 'App\Policies\ModelPolicy',
    ];

    /**
     * Register any authentication / authorization services.
     *
     * @return void
     */
    public function boot()
    {
        $this->registerPolicies();

        Gate::define('Manage Partners', function ($user) {
            return $user->hasAnyPermission([
                'Partner Show',
                'Partner Create',
                'Partner Update',
                'Partner Delete'
            ]);
        });

        Gate::define('Manage Partner Regions', function ($user) {
            return $user->hasAnyPermission([
                'Partner Region Show',
                'Partner Region Create',
                'Partner Region Update',
                'Partner Region Delete'
            ]);
        });

        Gate::define('Manage Galleries', function ($user) {
            return $user->hasAnyPermission([
                'Gallery Show',
                'Gallery Create',
                'Gallery Update',
                'Gallery Delete'
            ]);
        });

        Gate::define('Manage Profiles', function ($user) {
            return $user->hasAnyPermission([
                'Profile Show',
                'Profile Create',
                'Profile Update',
                'Profile Delete'
            ]);
        });

        Gate::define('Manage Passwords', function ($user) {
            return $user->hasAnyPermission([
                'Password Show',
                'Password Create',
                'Password Update',
                'Password Delete'
            ]);
        });

        Gate::define('Manage Roles', function ($user) {
            return $user->hasAnyPermission([
                'Role Show',
                'Role Create',
                'Role Update',
                'Role Delete'
            ]);
        });

        Gate::define('Manage Users', function ($user) {
            return $user->hasAnyPermission([
                'User Show',
                'User Create',
                'User Update',
                'User Delete'
            ]);
        });
    }
}
