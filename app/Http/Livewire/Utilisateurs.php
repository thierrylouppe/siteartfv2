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
        'newUser.email' => 'required|email',
    ];

    public function render()
    {
        return view('livewire.utilisateurs.index', [
            "users" => User::paginate(5)
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
        $this->validate(); 
    }
}
