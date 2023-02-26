<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'nom',
        'prenom',
        'sexe',
        'email',
        'password',
        'photo_user_id',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];


    public function image(){
        return $this->belongsTo(Article::class);
    }

    public function articles(){
        return $this->hasMany(Article::class);
    }

    public function publications(){
        return $this->hasMany(Publication::class);
    }

    public function permissions(){
        return $this->belongsToMany(Permission::class);
    }

    public function roles(){
        return $this->belongsToMany(Role::class);
    }

    //Verification des roles de User
    public function hasRole($role){
        return $this->roles()->where("nomRole", $role)->first() !== null;
    }

    //Verification si le user a plusieur roles
    public function hasAnyRoles($roles){
        return $this->roles()->whereIn("nomRole", $roles)->first() !== null;
    }

    //Getter pour recuperer et afficher sur la vue tous les roles attaché à un utilisateur 
    public function getAllRoleNamesAttribute(){
        return $this->roles->implode("nomRole", ' | ');
    }


    // Mon ajout
    //fonction qui vérifi si l'utilisateur est admin
    public function isAdmin()
    {
        return $this->roles()->where('nomRole', 'admin')->first(); 
    }

    //recuperation d'un tableau de roles (on l'ajoute sur nos page admin )
    public function hasAnyRole(array $roles)
    {
        return $this->roles()->whereIn('nomRole', $roles)->first(); 
    }

    //fonction qui vérifi si l'utilisateur est admin
    public function isUtilisateur()
    {
        return $this->roles()->where('nomRole', 'utilisateur')->first(); 
    }
}