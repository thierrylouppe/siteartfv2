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
            return $user->hasAnyRole(['admin','supadmin']);
        });

        Gate::define("agent", function(User $user){
            return $user->hasRole("agent");
        });


        //donc les droits aux auteurs et admin de naviger sur les differentes pages 
        Gate::define('manage-users', function (User $user) {
            return $user->hasAnyRole(['admin','supadmin']);
        });
        /*Gate::define('manage-users', function(User $user){
            return $user->hasAnyRole(['auteur', 'admin']);
        });*/

        //verifi si l'user est admin et le donne le droit de modifier 
        Gate::define('edit-users', function (User $user) {
            return $user->hasAnyRole(['auteur', 'admin']);
        });

        //verifi si l'user est admin ou auteur et le donne le droit sur la gestion de l'actualité 
        Gate::define('gestion-actualite', function (User $user) {
            return $user->hasAnyRole(['auteur', 'admin']);
        });

        //verifi si l'user est admin et le donne le droit de supprimer  
        Gate::define('delete-users', function (User $user) {
            return $user->isSupAdmin();
        });

        //verifi si l'user est admin et le donne le droit de supprimer l'article 
        Gate::define('delete-article', function (User $user) {
            return $user->isAdmin();
        });

        //verifi si l'user est admin et le donne le droit de publier l'article  
        Gate::define('publier-article', function (User $user) {
            return $user->isAdmin();
        });

        //verifi si l'user est admin et le donne le droit de dépublier l'article  
        Gate::define('depublier-article', function (User $user) {
            return $user->isAdmin();
        });

        //verifi si l'user est admin et le donne le droit de gérer publication et réglementation  
        Gate::define('gestion-publication', function (User $user) {
            return $user->isAdmin();
        });

        Gate::define('isUtilisateur', function (User $user) {
            return $user->isUtilisateur();
        });

        //verifi si l'user est admin ou auteur et le donne le droit 
        Gate::define('admin-auteur', function (User $user) {
            return $user->hasAnyRole(['auteur', 'admin']);
        });

        
        // Permission user
        //verifi si l'user a le droit de publier et le donne le droit de dépublier l'article  
        Gate::define('publier', function (User $user) {
            return $user->canPublish();
        });
        Gate::define('depublier', function (User $user) {
            return $user->canUnpublish();
        });
        Gate::define('consulter', function (User $user) {
            return $user->canConsult();
        });
        Gate::define('editer', function (User $user) {
            return $user->canEdit();
        });

    }
}
