<?php

namespace App\Http\Livewire;

use App\Models\Permission;
use App\Models\Role;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rule;
use Livewire\Component;
use Livewire\WithPagination;

class Utilisateurs extends Component
{
    //Ajout de la trait pour la pagination
    use WithPagination;
    protected $paginationTheme = "bootstrap";
    
    //public $isBtnAddClicked = false; 

    //page current
    public $currentPage = PAGELIST; 


    public $newUser = []; 
    // public $rules = [
    //     'newUser.nom' => 'required',
    //     'newUser.prenom' => 'required',
    //     'newUser.sexe' => 'required',
    //     'newUser.email' => 'required|email|unique:users,email',
    // ];

    public $editUser = [];
    public $rolePermissions = [];

    public function render()
    {
        Carbon::setLocale("fr");
        return view('livewire.utilisateurs.index', [
            "users" => User::latest()->paginate(5) //latest() permet de recupe le dernier element ajouter
        ])
                ->extends("layouts.master")
                ->section("contenu");
    }

    //Fonction navigation des pages
    public function goToAddUser(){
        //$this->isBtnAddClicked = true;
        $this->currentPage = PAGECREATEFORM;
    }

    public function goToEditUser($id){
        //$this->isBtnAddClicked = true;
        $this->editUser = User::find($id)->toArray();
        //dump($this->editUser);
        $this->currentPage = PAGEEDITFORM;

        $this->populateRolePermissions(); 
    }

    public function populateRolePermissions(){
        $this->rolePermissions["roles"] = [];
        $this->rolePermissions["permissions"] = [];

        $mapForCB = function($value){
            return $value["id"];
        };

        $roleIds = array_map($mapForCB, User::find($this->editUser['id'])->roles->toArray());
        $permissionIds = array_map($mapForCB, User::find($this->editUser['id'])->permissions->toArray());

        //dump(User::find($this->editUser['id'])->roles->toArray());
        foreach(Role::all() as $role){
            if(in_array($role->id, $roleIds)){
                array_push($this->rolePermissions["roles"], ["role_id"=>$role->id, "role_nom"=>$role->nomRole, "active"=>true]);
            }else{
                array_push($this->rolePermissions["roles"], ["role_id"=>$role->id, "role_nom"=>$role->nomRole, "active"=>false]); 
            }
        }

        foreach(Permission::all() as $permission){
            if(in_array($permission->id, $permissionIds)){
                array_push($this->rolePermissions["permissions"], ["permission_id"=>$permission->id, "permission_nom"=>$permission->nomPermission, "active"=>true]);
            }else{
                array_push($this->rolePermissions["permissions"], ["permission_id"=>$permission->id, "permission_nom"=>$permission->nomPermission, "active"=>false]); 
            }
        }

        // dump($this->rolePermissions);
    }

    public function updateRoleAndPermissions(){
        DB::table("role_user")->where("user_id", $this->editUser["id"])->delete();
        DB::table("permission_user")->where("user_id", $this->editUser["id"])->delete();

        foreach($this->rolePermissions["roles"] as $role){
            if($role["active"]){
                User::find($this->editUser["id"])->roles()->attach($role["role_id"]);
            }
            
        }

        foreach($this->rolePermissions["permissions"] as $permission){
            if($permission["active"]){
                User::find($this->editUser["id"])->permissions()->attach($permission["permission_id"]);
            }
            
        }
        $this->dispatchBrowserEvent("showSuccessMessage", ["message"=>"Roles et permissions mis à jour avec succès !!"]);
    }

    public function goToListUser(){
        //$this->isBtnAddClicked = false;
        $this->currentPage = PAGELIST;
        $this->editUser = [];
    }

    public function rules(){
        if($this->currentPage == PAGEEDITFORM){
            return [
                'editUser.nom' => 'required',
                'editUser.prenom' => 'required',
                'editUser.sexe' => 'required',
                'editUser.email' => ['required', 'email', Rule::unique("users", "email")->ignore($this->editUser['id'])],
            ];
        }

        return [
            'newUser.nom' => 'required',
            'newUser.prenom' => 'required',
            'newUser.sexe' => 'required',
            'newUser.email' => 'required|email|unique:users,email',
        ];
    }

    //fonction pour ajout user
    public function addUser(){
        // Vérifier les information envoyées par le formulaire sont top
        $validationAttributes = $this->validate(); 

        //Ajout du password par default
        $validationAttributes["newUser"]["password"] = "password";
        $validationAttributes["newUser"]["photo_user_id"] = "1";

        // Ajouter un nouvel utilisateur 
        User::create($validationAttributes["newUser"]);

        //vider le tableau de valeurs
        $this->newUser = []; 

        //Envoi Event après insert de user
        $this->dispatchBrowserEvent("showSuccessMessage", ["message"=>"Utilisateur créé avec succès!!!"]);
    }

    public function updateUser(){
        // Vérifier les information envoyées par le formulaire sont top
        $validationAttributes = $this->validate(); 
        //dump($validationAttributes);
        User::find($this->editUser["id"])->update($validationAttributes['editUser']);

        //Envoi Event après update de user
        $this->dispatchBrowserEvent("showSuccessMessage", ["message"=>"Utilisateur mis à jour avec succès!!!"]);

    }

    //Réinitialisation du mot de passe
    public function confirmPwdReset(){
        $this->dispatchBrowserEvent("showConfirmMessage", ["message"=>[
            "text" => "Vous êtes sur le point de réinitialiser le mot de passe de cet utilisateur. Voulez-vous continuer?",
            "title" => "Êtes-vous sûr de continuer",
            "type" => "warning",
        ]]);
    }

    public function resetPassword(){
        User::find($this->editUser['id'])->update(["password" => Hash::make(DEFAULTPASSWORD)]);
        $this->dispatchBrowserEvent("showSuccessMessage", ["message"=>"Mot de passe utilisateur réinitialisé avec succès!!!"]);
    }

    public function confirmDelete($name, $id){
        $this->dispatchBrowserEvent("showConfirmMessage", ["message"=>[
            "text" => "Vous êtes sur le point de supprimer $name de la liste des utilisateurs. Voulez-vous continuer?",
            "title" => "Êtes-vous sûr de continuer",
            "type" => "warning",
            "data" => [
                "user_id" => $id,
            ]
        ]]);
    }

    public function deleteUser($id){
        User::destroy($id);
        
        //Envoi Event après delete de user
        $this->dispatchBrowserEvent("showSuccessMessage", ["message"=>"Utilisateur supprimé avec succès!!!"]);
    }
}
