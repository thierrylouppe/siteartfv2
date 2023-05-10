<?php

namespace App\Http\Livewire\Front\Actualites;

use App\Models\Article;
use Carbon\Carbon;
use Illuminate\Support\Facades\Route;
use Livewire\Component;

class Showactualites extends Component
{
    public $article; 
    public $search = "";
    
    public function mount($slug){
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

        $articleQuery = Article::query();

        if($this->search != ""){
            $articleQuery->where('titre', "LIKE", "%". $this->search ."%");
        }

        return view('fronts.actualites.actualite-detail', [
            "articlesenligne" => $articleQuery->where('status', 1)->latest()->paginate(6),
            "articlerecents" => $articleQuery->where('status', 1)->latest()->paginate(3),
        ])
        
        ->extends("fronts.layouts.master")
        ->section("body");
    }
}
