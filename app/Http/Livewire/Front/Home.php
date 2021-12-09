<?php

namespace App\Http\Livewire\Front;

use App\Models\Article;
use App\Models\Chiffrecle;
use Carbon\Carbon;
use Livewire\Component;

class Home extends Component
{

    public function render()
    {
        Carbon::setLocale("fr");

        $articleQuery = Article::query();

        return view('livewire.front.home', [
            "nbreactualites" => count(Article::all()),
             "nbrechiffrecles" => count(Chiffrecle::all()),
             "chiffrecles" => Chiffrecle::latest()->paginate(1),
             "articles" => $articleQuery->latest()->paginate(3)
        ])
            ->extends("fronts.layouts.master")
            ->section("body");
    }
}
