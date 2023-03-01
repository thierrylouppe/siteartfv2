<?php

namespace App\Http\Livewire\Profilusers;

use App\Models\User;
use Livewire\Component;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class Changepassword extends Component
{
    public $email;
    public $password;
    
    public function render()
    {
        return view('livewire.profilusers.changepassword')
        ->extends("layouts.master")
        ->section("contenu");
    }

    public function confirmChangePassword(){
        $this->dispatchBrowserEvent("showConfirmChangePassword", ["message"=>[
            "text" => "Vous êtes sur le point de modifier votre mot de passe. Voulez-vous continuer?",
            "title" => "Êtes-vous sûr de continuer",
            "type" => "warning",
            "data" => [ ]
        ]]);
    }

    public function changePassword()
    {
        $userAuth = Auth::user();
        // dd($userAuth);
        $this->validate([
            'email' => ['required', 'email'],
            'password' => ['required', 'string'],
        ]);

        if ($this->email == $userAuth->email) {
            $currentUser = User::where('email', $this->email)->first();
            $currentUser->password = Hash::make($this->password);
            $currentUser->save();
            $this->password = "";
            $this->dispatchBrowserEvent("showSuccessMessage", ["message"=>"Mot de passe modifier !!!"]);
        }else {
            $this->dispatchBrowserEvent("showEmailMessage", ["message"=>"Email non identique !!!"]);
        }

    }

    
}
