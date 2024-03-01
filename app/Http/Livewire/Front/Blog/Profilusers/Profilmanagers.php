<?php

namespace App\Http\Livewire\Front\Blog\Profilusers;

use Livewire\Component;

class Profilmanagers extends Component
{
    public function render()
    {
        return view('livewire.front.blog.profilusers.profilmanagers')
            ->extends("fronts.layouts.blogs.master")
            ->section("body");;
    }
}
