<?php

namespace App\Http\Livewire\Front\Contacts;

use Livewire\Component;

class Contacts extends Component
{
    public function render()
    {
        return view('livewire.front.contacts.contacts')
        ->extends("fronts.layouts.master")
        ->section("body");
    }
}
