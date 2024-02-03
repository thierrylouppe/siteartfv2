<?php

namespace App\Http\Livewire\Front\Blog;

use Livewire\Component;

class Blog extends Component
{
    public function render()
    {
        return view('livewire.front.blog.blog')
        ->extends("fronts.layouts.blogs.master")
            ->section("body");
    }
}
