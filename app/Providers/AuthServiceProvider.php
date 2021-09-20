<?php

namespace App\Providers;

use App\Models\User;
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
        Gate::after(function (User $user){
            return $user->hasRole("superadmin");
        });

        //Ajout des Gates
        Gate::define("admin", function(User $user){
            return $user->hasRole("admin");
        });

        Gate::define("agent", function(User $user){
            return $user->hasRole("agent");
        });

        

    }
}
