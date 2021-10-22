<?php

namespace App\Http\Livewire;

use Livewire\Component;

class Articles extends Component
{
    public function render()
    {
        return view('livewire.articles.index')
        ->extends("layouts.master")
        ->section("contenu");
    }

    // public function render()
    // {
    //     Carbon::setLocale("fr");
    //     return view('livewire.utilisateurs.index', [
    //         "users" => User::latest()->paginate(5) //latest() permet de recupe le dernier element ajouter
    //     ])
    //             ->extends("layouts.master")
    //             ->section("contenu");
    // }
}
