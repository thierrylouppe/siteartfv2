<?php

namespace App\Http\Livewire\Articles;

use App\Models\Article;
use Carbon\Carbon;
use Illuminate\Support\Facades\Route;
use Livewire\Component;

class Show extends Component
{
    public $article;

    public function mount($slug)
    {
        $this->article = Article::where('slug', $slug)->first();

        if ($this->article != null) {
            $actualites = Article::recent();
            session(["previous_route_name"=>Route::currentRouteName(), "slugParam"=>request()->slug]);

            return view('fronts.actualites.actualite-detail', compact("actualites"))->with('article', $this->article);
        }
        if(session()->has("previous_route_name") && session()->has("slugParam")){
            return redirect()->route(session()->get("previous_route_name"), ["slug"=>session()->get("slugParam")]); 
        }
    }

    public function render()
    {
        Carbon::setLocale("fr");
        
        return view('livewire.articles.show')
            ->extends("layouts.master")
            ->section("contenu"); 
    }
}
