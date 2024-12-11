<?php

namespace App\Providers;

// use Illuminate\Support\Facades\Gate;

use App\Models\OrderItem;
use App\Policies\OrderItemPolicy;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Gate;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The model to policy mappings for the application.
     *
     * @var array<class-string, class-string>
     */
    protected $policies = [
        OrderItem::class => OrderItemPolicy::class,
    ];

    /**
     * Register any authentication / authorization services.
     *
     * @return void
     */

    public function boot()
    {
        $this->registerPolicies();

        Gate::define('role', function ($user, $role) {
            return $user->role === $role;
        });
    }

    
}
