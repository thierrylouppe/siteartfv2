<?php

namespace App\Http\Livewire\Profilusers;

use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\Rule;
use Livewire\Component;

class Profilusers extends Component
{
    public $editUser = [];
    private $userAuth;

    public function mount()
    {
        $this->userAuth = Auth::user();
        $this->goToEditUser($this->userAuth->id);
    }

    public function render()
    {
        return view('livewire.profilusers.profilusers')
            ->extends("layouts.master")
            ->section("contenu");
            $this->hydrater();
    }

    public function goToEditUser($id){
        $this->editUser = User::find($id)->toArray();
    }

    public function updateUser(){
        $validationAttributes = $this->validate([
            'editUser.nom' => 'required',
            'editUser.prenom' => 'required',
            'editUser.sexe' => 'required',
            'editUser.email' => ['required', 'email', Rule::unique("users", "email")->ignore($this->editUser['id'])],
        ]);
        
        User::find($this->editUser["id"])->update($validationAttributes['editUser']);

        $this->dispatchBrowserEvent("showSuccessMessage", ["message"=>"Mis à jour avec succès!!!"]);
        // return redirect()->route('profils.profils');
        return redirect()->back();
        
    }

    public function goBack()
    {
        return redirect()->route('dashboard');
    }
}
