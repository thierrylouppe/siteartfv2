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

    public function render()
    {
        return view('livewire.utilisateurs.index', [
            "users" => User::paginate(5)
        ])
                ->extends("layouts.master")
                ->section("contenu");
    }
}
