<?php

namespace App\Http\Livewire\Front;

use App\Models\Article;
use Carbon\Carbon;
use Livewire\Component;
use Livewire\WithPagination;

class Actualites extends Component
{
    use WithPagination;

    public $search = "";

    protected $paginationTheme = "bootstrap";

    public function render()
    {
        Carbon::setLocale("fr");

        $articleQuery = Article::query();

        if($this->search != ""){
            $articleQuery->where('titre', "LIKE", "%". $this->search ."%");
        }

        return view('livewire.front.actualites.actualites', [
            "nbreactualites" => count(Article::all()),
            "articlesenligne" => $articleQuery->where('status', 1)->latest()->paginate(4),
            "articlerecents" => Article::where('status', 1)->latest()->paginate(3),
        ])
            ->extends("fronts.layouts.master")
            ->section("body");
    }
}
