<?php

namespace App\Http\Livewire\Front;

use App\Models\Article;
use Carbon\Carbon;
use Livewire\Component;

class Showactualites extends Component
{
    public $article; 

    public function mount($slug){
        $this->article = Article::where('slug', $slug)->first();
    }

    public function render()
    {
        Carbon::setLocale("fr");

        $articleQuery = Article::query();

        return view('livewire.front.actualites.actualite-detail', [
            "articlesenligne" => $articleQuery->where('status', 1)->latest()->paginate(6)
        ])
        
        ->extends("fronts.layouts.master")
        ->section("body");
    }
}
