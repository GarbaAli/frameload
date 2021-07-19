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


        // voir le model User pour les differentes focntions appeller

        Gate::define('manager-users', function ($user) {
            return $user->hasAnyRole(['Auteur', 'Admin', 'Livre', 'Logiciel', 'Epreuve']);
        }); 
 
        // juste pour Admin
        Gate::define('edit-users', function ($user) {
            return $user->isAdmin();
        }); 

        Gate::define('delete-users', function ($user) {
            return $user->isAdmin();
        });

        //Juste pour Auteur et Admin
        Gate::define('permission-users', function($user){
            return $user->Auteur(['Auteur', 'Admin']);
        });
    }
}
