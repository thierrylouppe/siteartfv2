<?php

namespace App\Http\Livewire;

use App\Models\User;
use Livewire\Component;
use Livewire\WithPagination;

class Utilisateurs extends Component
{
    //Ajout de la trait pour la pagination
    use WithPagination;
    protected $paginationTheme = "bootstrap";
    
    public $isBtnAddClicked = false; 

    public $newUser = []; 
    public $rules = [
        'newUser.nom' => 'required',
        'newUser.prenom' => 'required',
        'newUser.sexe' => 'required',
        'newUser.email' => 'required|email|unique:users,email',
    ];

    public function render()
    {
        return view('livewire.utilisateurs.index', [
            "users" => User::latest()->paginate(5) //latest() permet de recupe le dernier element ajouter
        ])
                ->extends("layouts.master")
                ->section("contenu");
    }


    public function goToAddUser(){
        $this->isBtnAddClicked = true;
    }

    public function goToListUser(){
        $this->isBtnAddClicked = false;
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
}
