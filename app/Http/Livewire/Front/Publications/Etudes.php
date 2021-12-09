<?php

namespace App\Http\Livewire\Front\Publications;

use App\Models\Publication;
use Carbon\Carbon;
use Livewire\Component;
use Livewire\WithPagination;

class Etudes extends Component
{
    use WithPagination;

    public $search = "";

    protected $paginationTheme = "bootstrap";

    public function render()
    {
        Carbon::setLocale("fr");
        $etudeQuery = Publication::query();

        if($this->search != ""){
            $etudeQuery->where('typepublication', "LIKE", "%". $this->search ."%");
        }

        return view('livewire.front.publications.etudes', [
            "nbreetude" => count(Publication::where('typepublication', 'etude')->get()),
            "etudes" => $etudeQuery->where('typepublication', 'etude')->latest()->paginate(4),
        ])
                ->extends("fronts.layouts.master")
                ->section("body");
    }
}
