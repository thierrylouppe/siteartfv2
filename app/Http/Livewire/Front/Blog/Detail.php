<?php

namespace App\Http\Livewire\Front\Blog;

use Livewire\Component;

class Detail extends Component
{
    public function render()
    {
        return view('livewire.front.blog.detail')
        ->extends("fronts.layouts.blogs.master")
            ->section("body");
    }
}
