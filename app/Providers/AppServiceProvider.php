<?php

namespace App\Providers;

use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\View;
use Illuminate\Support\Facades\Auth;
use App\Models\Role;
use App\Models\User;

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
        $this->registerPolicies();

        Gate::define('isAdmin', function (User $user) {
            return $user->role && $user->role->name === 'admin';
        });

        View::share('roles', collect());
        View::share('users', collect());

        View::composer('admin.*', function ($view) {
            $roles = Role::withCount('users')->get();
            $users = User::with('role')->get();

            $view->with('roles', $roles);
            $view->with('users', $users);
        });
    }
}
