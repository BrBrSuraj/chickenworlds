<?php

namespace App\Providers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The policy mappings for the application.
     *
     * @var array<class-string, class-string>
     */
    protected $policies = [
        // 'App\Models\Model' => 'App\Policies\ModelPolicy',
    ];

    /**
     * Register any authentication / authorization services.
     *
     * @return void
     */
    public function boot()
    {
        $this->registerPolicies();
        Gate::define('is_Admin', function () {
            $roles = Auth::check() ? Auth::user()->roles->pluck('name')->toArray() : [];
            if (in_array('Admin', $roles)) {
                return "Admin";
            }
        });

        Gate::define('is_Manager', function () {
            $roles = Auth::check() ? Auth::user()->roles->pluck('name')->toArray() : [];
            if (in_array('Manager', $roles)) {
                return "Manage";
            }
        });

        Gate::define('is_ShopKeeper', function () {
            $roles = Auth::check() ? Auth::user()->roles->pluck('name')->toArray() : [];
            if (in_array('ShopKeeper', $roles)) {
                return "Shopkeeper";
            }
        });
    }
}
