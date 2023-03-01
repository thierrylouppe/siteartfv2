<?php

namespace App\Http\Livewire\Profilusers;

use Livewire\Component;

class Profilmanagers extends Component
{
    public function render()
    {
        return view('livewire.profilusers.profilmanagers')
            ->extends("layouts.master")
            ->section("contenu");
    }
}
