<?php

namespace App\Http\Livewire\Articles;

use App\Models\Article;
use Carbon\Carbon;
use Livewire\Component;

class Show extends Component
{
    public $article;

    public function mount($slug)
    {
        $this->article = Article::where('slug', $slug)->first();
    }

    public function render()
    {
        Carbon::setLocale("fr");
        
        return view('livewire.articles.show')
            ->extends("layouts.master")
            ->section("contenu"); 
    }
}
